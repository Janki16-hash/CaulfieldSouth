<?php
/**
 * Zakra Contribution — ThemeGrill SDK integration for opt-in analytics and tracking.
 *
 * @package Zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Zakra_Contribution {

	const FORMBRICKS_ENV_ID = 'cmpoz59ty0d2qz001ug5bffs2'; // Replace with real env ID before deploying.

	private static $instance;

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		$this->setup_hooks();
	}

	private function setup_hooks() {
		// AJAX handler and debug hooks work without SDK — register unconditionally.
		add_action( 'wp_ajax_zakra_save_tracking', array( $this, 'ajax_save_tracking' ) );
		add_action( 'zakra_log_activity', array( $this, 'debug_log_cron_fired' ), 1 );
		add_filter( 'pre_http_request', array( $this, 'debug_log_payload' ), 10, 3 );
		add_action( 'zakra_log_activity_weekly', array( $this, 'fire_sdk_log' ) );
		add_action( 'after_switch_theme', array( $this, 'handle_theme_activation' ) );
		add_action( 'admin_init', array( $this, 'maybe_redirect_on_activation' ), 1 );

		if ( ! file_exists( get_template_directory() . '/vendor/themegrill/themegrill-sdk/load.php' ) ) {
			// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
			error_log( 'Zakra SDK vendor not found at: ' . get_template_directory() . '/vendor/themegrill/themegrill-sdk/load.php' );
			return;
		}

		add_filter( 'themegrill_sdk_products', array( $this, 'register_product' ) );
		add_action( 'init', array( $this, 'customize_deactivation_labels' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'declare_internal_page' ) );
		add_filter( 'themegrill-sdk/survey/zakra', array( $this, 'configure_formbricks' ), 10, 2 );
		add_filter( 'zakra_logger_data', array( $this, 'logger_data' ) );
		add_action( 'admin_init', array( $this, 'bridge_notification_hooks' ), 20 );

		// Suppress the SDK notification banner — we use our own dashboard toggle instead.
		add_filter( 'zakra_logger_flag_should_show', '__return_false' );
	}

	/**
	 * Register Zakra as a ThemeGrill SDK product.
	 *
	 * @param array $products Existing registered product base files.
	 * @return array
	 */
	public function register_product( $products ) {
		$products[] = get_template_directory() . '/style.css';
		return $products;
	}

	/**
	 * Override the uninstall survey heading and option labels for this theme.
	 * Runs on 'init' after the SDK has loaded its defaults into Loader::$labels.
	 */
	public function customize_deactivation_labels() {
		if ( ! class_exists( 'ThemeGrillSDK\Loader' ) ) {
			return;
		}

		\ThemeGrillSDK\Loader::$labels['uninstall']['heading_theme'] = __(
			'Why are you switching away from Zakra?',
			'zakra'
		);

		\ThemeGrillSDK\Loader::$labels['uninstall']['options'] = array_merge(
			\ThemeGrillSDK\Loader::$labels['uninstall']['options'],
			array(
				'id3' => array(
					'title'       => __( 'I found a better theme', 'zakra' ),
					'placeholder' => __( "What's the theme's name?", 'zakra' ),
				),
				'id4' => array(
					'title'       => __( "I couldn't get the theme to look like the demo", 'zakra' ),
					'placeholder' => __( 'What problem did you experience?', 'zakra' ),
				),
				'id5' => array(
					'title'       => __( 'I no longer need it', 'zakra' ),
					'placeholder' => __( 'If you could improve one thing, what would it be?', 'zakra' ),
				),
				'id6' => array(
					'title'       => __( 'It has a compatibility issue with a plugin', 'zakra' ),
					'placeholder' => __( 'What plugin caused the issue?', 'zakra' ),
				),
			)
		);
	}

	/**
	 * On first admin load after theme activation, redirect to the Zakra dashboard.
	 */
	public function handle_theme_activation() {
		set_transient( 'zakra_theme_just_activated', '1', 5 * MINUTE_IN_SECONDS );
	}

	/**
	 * Redirect to Zakra dashboard on the first admin page load after theme activation.
	 */
	public function maybe_redirect_on_activation() {
		if ( ! get_transient( 'zakra_theme_just_activated' ) ) {
			return;
		}
		if ( ! current_user_can( 'switch_themes' ) ) {
			return;
		}
		delete_transient( 'zakra_theme_just_activated' );
		set_transient( 'zakra_survey_on_first_visit', '1', 5 * MINUTE_IN_SECONDS );
		wp_safe_redirect( admin_url( 'admin.php?page=zakra' ) );
		exit;
	}

	/**
	 * Fire the SDK internal-page action on the theme's own admin screen.
	 * SDK ScriptLoader listens to this action to decide whether to enqueue the survey.
	 */
	public function declare_internal_page() {
		if ( ! is_admin() ) {
			return;
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';

		if ( 'zakra' !== $page ) {
			return;
		}

		$is_first_visit = (bool) get_transient( 'zakra_survey_on_first_visit' );
		if ( $is_first_visit ) {
			delete_transient( 'zakra_survey_on_first_visit' );
		}

		do_action( 'themegrill_internal_page', 'zakra', $page );

		if ( $is_first_visit ) {
			wp_add_inline_script(
				'themegrill_sdk_survey_script',
				'window.addEventListener("themegrill:survey:loaded",function(){window.dispatchEvent(new Event("themegrill:survey:trigger:cancel"));setTimeout(function(){window.tgsdk_formbricks&&window.tgsdk_formbricks.init();},30000);},{once:true});',
				'after'
			);
		}

		// Replace init() entirely: load the Formbricks CDN directly and call setup() with
		// userId + attributes included from the start, so audience filters evaluate correctly
		// on the very first setup() call — no timing race with setAttributes().
		wp_add_inline_script(
			'themegrill_sdk_survey_script',
			'window.addEventListener("themegrill:survey:loaded",function(){var d=window.tgsdk_survey_data;if(!d||!d.environmentId)return;window.tgsdk_formbricks.init=async function(){if(!window._tgFbLoaded){var b=(d.appUrl||"https://app.formbricks.com").replace(/\/$/,"")+"/";await new Promise(function(r,e){var s=document.createElement("script");s.src=b+"js/formbricks.umd.cjs";s.async=true;s.onload=function(){window._tgFbLoaded=true;r();};s.onerror=e;document.head.appendChild(s);});}if(window.formbricks&&window.formbricks.setup){await window.formbricks.setup({environmentId:d.environmentId,appUrl:d.appUrl,userId:d.userId,attributes:d.attributes});}};},{once:true});',
			'after'
		);
	}

	/**
	 * Return Formbricks survey configuration for this product.
	 * Called by SDK ScriptLoader via 'themegrill-sdk/survey/zakra' filter.
	 *
	 * @param array  $data      Existing survey data (empty on first call).
	 * @param string $page_slug Current admin page slug.
	 * @return array
	 */
	public function configure_formbricks( $data, $page_slug ) {
		if ( empty( $page_slug ) ) {
			return $data;
		}

		return array(
			'environmentId' => self::FORMBRICKS_ENV_ID,
			'attributes'    => array(
				'install_days_number' => (int) $this->get_install_days(),
				'is_premium'          => defined( 'ZAKRA_PRO_VERSION' ),
				'plan'                => defined( 'ZAKRA_PRO_VERSION' ) ? 'pro' : 'free',
				'theme_version'       => defined( 'ZAKRA_THEME_VERSION' ) ? ZAKRA_THEME_VERSION : '',
				'product'             => 'zakra',
			),
		);
	}

	/**
	 * Append Zakra-specific data to the SDK Logger payload.
	 * Called by SDK Logger via 'zakra_logger_data' filter (opt-in only).
	 *
	 * @param array $data Existing custom data array.
	 * @return array
	 */
	public function logger_data( $data ) {
		global $wpdb;

		$data['plan']            = 'free';
		$data['theme_version']   = defined( 'ZAKRA_THEME_VERSION' ) ? ZAKRA_THEME_VERSION : '';
		$data['child_theme']     = is_child_theme() ? get_stylesheet() : '';
		$data['php_version']     = PHP_VERSION;
		$data['mysql_version']   = $wpdb->db_version();
		$data['server_software'] = isset( $_SERVER['SERVER_SOFTWARE'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_SOFTWARE'] ) ) : '';
		$data['theme_mods']      = wp_json_encode( get_theme_mods() );

		return $data;
	}

	/**
	 * Bridge SDK notification hook case mismatch.
	 * Logger registers on 'themegrill_sdk_registered_notifications' (lowercase),
	 * but Notification module reads 'themeGrill_sdk_registered_notifications' (capital G).
	 * Runs at admin_init priority 20 — after Logger adds its filter at priority 10.
	 */
	public function bridge_notification_hooks() {
		add_filter(
			'themeGrill_sdk_registered_notifications',
			function ( $notifications ) {
				return apply_filters( 'themegrill_sdk_registered_notifications', $notifications );
			},
			20
		);
	}

	/**
	 * Handle AJAX save from the Contributing dashboard toggle.
	 */
	public function ajax_save_tracking() {
		check_ajax_referer( 'zakra_tracking_nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'Insufficient permissions.' ) );
		}

		$enabled = isset( $_POST['enabled'] ) && rest_sanitize_boolean( wp_unslash( $_POST['enabled'] ) );
		$flag    = $enabled ? 'yes' : 'no';

		update_option( 'zakra_logger_flag', $flag );

		if ( $enabled ) {
			if ( ! wp_next_scheduled( 'zakra_log_activity_weekly' ) ) {
				wp_schedule_event( time() + WEEK_IN_SECONDS, 'weekly', 'zakra_log_activity_weekly' );
			}
			$this->fire_tracking_immediately();
		} else {
			wp_clear_scheduled_hook( 'zakra_log_activity_weekly' );
			wp_clear_scheduled_hook( 'zakra_log_activity' );
		}

		wp_send_json_success( array( 'enabled' => $enabled ) );
	}

	/**
	 * Re-run Logger::setup_actions() with flag now 'yes', then fire immediately.
	 * Needed because setup_actions() ran at wp_loaded before consent was given.
	 */
	private function fire_tracking_immediately() {
		global $wp_filter;
		if ( ! isset( $wp_filter['wp_loaded'] ) || ! class_exists( 'ThemeGrillSDK\Modules\Logger' ) ) {
			return;
		}
		foreach ( $wp_filter['wp_loaded']->callbacks as $callbacks ) {
			foreach ( $callbacks as $cb ) {
				if ( is_array( $cb['function'] )
					&& $cb['function'][0] instanceof \ThemeGrillSDK\Modules\Logger
					&& 'setup_actions' === $cb['function'][1] ) {
					$cb['function'][0]->setup_actions();
				}
			}
		}
		do_action( 'zakra_log_activity' );
	}

	/**
	 * Cron callback: bridge weekly cron to SDK log action so send_log() fires.
	 */
	public function fire_sdk_log() {
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		error_log( 'Zakra cron fired: zakra_log_activity_weekly → firing zakra_log_activity' );
		do_action( 'zakra_log_activity' );
	}

	/**
	 * Log when zakra_log_activity fires (immediate single event or bridged from weekly).
	 */
	public function debug_log_cron_fired() {
		global $wp_filter;

		$source = wp_doing_cron() ? 'wp-cron' : 'manual/ajax';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		error_log( 'Zakra cron fired: zakra_log_activity (source: ' . $source . ', logger_flag: ' . get_option( 'zakra_logger_flag', 'not set' ) . ', sdk_loaded: ' . ( class_exists( 'ThemeGrillSDK\Loader' ) ? 'yes' : 'no' ) . ')' );

		if ( isset( $wp_filter['zakra_log_activity'] ) ) {
			foreach ( $wp_filter['zakra_log_activity']->callbacks as $priority => $callbacks ) {
				foreach ( $callbacks as $cb ) {
					if ( is_array( $cb['function'] ) ) {
						$name = get_class( $cb['function'][0] ) . '->' . $cb['function'][1];
					} elseif ( $cb['function'] instanceof Closure ) {
						$name = 'Closure';
					} else {
						$name = (string) $cb['function'];
					}
					// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
					error_log( '  zakra_log_activity priority ' . $priority . ': ' . $name );
				}
			}
		}
	}

	/**
	 * Log SDK tracking payload to debug.log when WP_DEBUG is on.
	 *
	 * Zakra_Pro_Contribution::augment_logger_data() injects the site's real
	 * Freemius license secret key into this same payload's `data.license_key`
	 * (see that class) - logging the decoded body as-is would write that key
	 * to disk in plaintext every time this fires (ZAK-333). Masking it here,
	 * right before it's ever handed to `error_log()`, means the raw secret
	 * never reaches the log line in the first place - not just redacted
	 * after the fact, which would still leave a window where the full value
	 * existed on disk.
	 *
	 * @param bool|array $pre  Whether to preempt the request.
	 * @param array      $args Request arguments.
	 * @param string     $url  Request URL.
	 * @return bool|array
	 */
	public function debug_log_payload( $pre, $args, $url ) {
		if ( false !== strpos( $url, 'api.themegrill.com/tracking/log' ) ) {
			$body = json_decode( $args['body'], true );

			if ( is_array( $body ) && isset( $body['data']['license_key'] ) && is_string( $body['data']['license_key'] ) ) {
				$body['data']['license_key'] = $this->mask_secret( $body['data']['license_key'] );
			}

			// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
			error_log( 'Zakra SDK payload sent to: ' . $url );
			// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
			error_log( 'Zakra SDK body: ' . print_r( $body, true ) );
		}
		return $pre;
	}

	/**
	 * Mask a secret value for logging, keeping just enough of each end to be
	 * recognizable in support/debugging contexts without exposing the full
	 * value - e.g. `sk_w;***...agu9`.
	 *
	 * @param string $secret Full secret value.
	 * @return string Masked value.
	 */
	private function mask_secret( $secret ) {
		$length = strlen( $secret );

		if ( $length <= 8 ) {
			return str_repeat( '*', $length );
		}

		return substr( $secret, 0, 4 ) . '***...' . substr( $secret, -4 );
	}

	/**
	 * Calculate days since the SDK first registered Zakra.
	 *
	 * @return int
	 */
	private function get_install_days() {
		$install_time = get_option( 'zakra_theme_installed_time', time() );
		return (int) floor( ( time() - (int) $install_time ) / DAY_IN_SECONDS );
	}
}
