<?php
/**
 * Additional setup After theme setup.
 *
 * @package zakra
 *
 * TODO: @since.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_After_Setup_Theme' ) ) {

	/**
	 * After setup theme.
	 */
	class Zakra_After_Setup_Theme {

		/**
		 * Instance.
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor.
		 */
		private function __construct() {

			$this->setup_hooks();
		}

		/**
		 * Define hooks.
		 *
		 * @return void
		 */
		public function setup_hooks() {

			add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
			add_action( 'init', array( $this, 'version_check' ) );
			add_action( 'after_setup_theme', array( $this, 'support_editor_color_palette' ) );
			add_action( 'rest_request_after_callbacks', array( $this, 'elementor_add_theme_colors' ), 999, 3 );
			add_action( 'rest_request_after_callbacks', array( $this, 'display_global_colors_front_end' ), 999, 3 );
			add_filter( 'zakra_theme_builder_dynamic_css', array( $this, 'generate_global_elementor_style' ) );
		}

		public function support_editor_color_palette() {
			$global_palette = get_theme_mod(
				'zakra_color_palette',
				array(
					'id'     => 'preset-5',
					'name'   => 'Preset 5',
					'colors' => array(
						'zakra-color-1' => '#027ABB',
						'zakra-color-2' => '#015EA0',
						'zakra-color-3' => '#FFFFFF',
						'zakra-color-4' => '#F6FEFC',
						'zakra-color-5' => '#181818',
						'zakra-color-6' => '#1F1F32',
						'zakra-color-7' => '#3F3F46',
						'zakra-color-8' => '#FFFFFF',
						'zakra-color-9' => '#E4E4E7',
					),
				)
			);
			$editor_palette = $this->format_global_palette( $global_palette );
			add_theme_support( 'editor-color-palette', $editor_palette );
		}

		public function format_global_palette( $global_palette ) {
			$editor_palette = array();

			if ( isset( $global_palette['colors'] ) && is_array( $global_palette['colors'] ) ) {
				$color_names = array(
					'1' => 'Main Accent',
					'2' => 'Secondary Accent',
					'3' => 'Main Background',
					'4' => 'Surface Background',
					'5' => 'Contrast Background',
					'6' => 'Title Text',
					'7' => 'Regular Text',
					'8' => 'Text on Contrast',
					'9' => 'Muted Color / Border',
				);

				foreach ( $global_palette['colors'] as $color_key => $color_value ) {
					preg_match( '/(\d+)$/', $color_key, $matches );
					$num   = $matches[1] ?? '';
					$label = 'Zakra - ' . ( $color_names[ $num ] ?? $color_key );

					$editor_palette[] = array(
						'name'  => $label,
						'slug'  => $color_key,
						'color' => $color_value,
					);
				}
			}
			return $editor_palette;
		}

		/**
		 * Add theme colors to Elementor global colors via REST API.
		 *
		 * @param \WP_REST_Response $response The response object.
		 * @param array             $handler  The handler that was used.
		 * @param \WP_REST_Request  $request  The request object.
		 * @return \WP_REST_Response
		 */
		public function elementor_add_theme_colors( $response, $handler, $request ) {

			$route = $request->get_route();

			if ( '/elementor/v1/globals' !== $route ) {
				return $response;
			}

			$global_palette = get_theme_mod(
				'zakra_color_palette',
				array(
					'id'     => 'preset-5',
					'name'   => 'Preset 5',
					'colors' => array(
						'zakra-color-1' => '#027ABB',
						'zakra-color-2' => '#015EA0',
						'zakra-color-3' => '#FFFFFF',
						'zakra-color-4' => '#F6FEFC',
						'zakra-color-5' => '#181818',
						'zakra-color-6' => '#1F1F32',
						'zakra-color-7' => '#3F3F46',
						'zakra-color-8' => '#FFFFFF',
						'zakra-color-9' => '#E4E4E7',
					),
				)
			);
			$data           = $response->get_data();

			if ( isset( $global_palette['colors'] ) && is_array( $global_palette['colors'] ) ) {
				foreach ( $global_palette['colors'] as $color_key => $color_value ) {
					// Remove hyphens from slug for Elementor compatibility
					$no_hyphens = str_replace( '-', '', $color_key );
					$label      = ucwords( str_replace( '-', ' ', $color_key ) );

					$data['colors'][ $no_hyphens ] = array(
						'id'    => esc_attr( $no_hyphens ),
						'title' => 'Theme ' . $label,
						'value' => $color_value,
					);
				}
			}

			$response->set_data( $data );
			return $response;
		}

		/**
		 * Display individual global colors for Elementor front-end requests.
		 *
		 * @param \WP_REST_Response $response The response object.
		 * @param array             $handler  The handler that was used.
		 * @param \WP_REST_Request  $request  The request object.
		 * @return \WP_REST_Response
		 */
		public function display_global_colors_front_end( $response, $handler, $request ) {
			$route = $request->get_route();

			if ( 0 !== strpos( $route, '/elementor/v1/globals' ) ) {
				return $response;
			}

			$slug_map       = array();
			$global_palette = get_theme_mod(
				'zakra_color_palette',
				array(
					'id'     => 'preset-5',
					'name'   => 'Preset 5',
					'colors' => array(
						'zakra-color-1' => '#027ABB',
						'zakra-color-2' => '#015EA0',
						'zakra-color-3' => '#FFFFFF',
						'zakra-color-4' => '#F6FEFC',
						'zakra-color-5' => '#181818',
						'zakra-color-6' => '#1F1F32',
						'zakra-color-7' => '#3F3F46',
						'zakra-color-8' => '#FFFFFF',
						'zakra-color-9' => '#E4E4E7',
					),
				)
			);

			if ( isset( $global_palette['colors'] ) && is_array( $global_palette['colors'] ) ) {
				foreach ( $global_palette['colors'] as $color_key => $color_value ) {
					// Remove hyphens as hyphens do not work with Elementor global styles.
					$no_hyphens              = str_replace( '-', '', $color_key );
					$slug_map[ $no_hyphens ] = $color_key;
				}
			}

			$rest_id = substr( $route, strrpos( $route, '/' ) + 1 );

			if ( ! in_array( $rest_id, array_keys( $slug_map ), true ) ) {
				return $response;
			}

			$original_color_key = $slug_map[ $rest_id ];
			$label              = ucwords( str_replace( '-', ' ', $original_color_key ) );

			return rest_ensure_response(
				array(
					'id'    => esc_attr( $rest_id ),
					'title' => 'Theme ' . $label,
					'value' => $global_palette['colors'][ $original_color_key ],
				)
			);
		}

		/**
		 * Generate global Elementor style CSS variables.
		 *
		 * @param string $dynamic_css The existing dynamic CSS.
		 * @return string
		 */
		public function generate_global_elementor_style( $dynamic_css ) {
			$global_palette = get_theme_mod(
				'zakra_color_palette',
				array(
					'id'     => 'preset-5',
					'name'   => 'Preset 5',
					'colors' => array(
						'zakra-color-1' => '#027ABB',
						'zakra-color-2' => '#015EA0',
						'zakra-color-3' => '#FFFFFF',
						'zakra-color-4' => '#F6FEFC',
						'zakra-color-5' => '#181818',
						'zakra-color-6' => '#1F1F32',
						'zakra-color-7' => '#3F3F46',
						'zakra-color-8' => '#FFFFFF',
						'zakra-color-9' => '#E4E4E7',
					),
				)
			);
			$palette_style  = array();
			$style          = array();

			if ( isset( $global_palette['colors'] ) ) {
				foreach ( $global_palette['colors'] as $color_key => $color_value ) {
					// Remove hyphens from color key for CSS variable
					$variable_key           = '--e-global-color-' . str_replace( '-', '', $color_key );
					$style[ $variable_key ] = $color_value;
				}

				$palette_style[':root'] = $style;
				$dynamic_css           .= $this->parse_css( $palette_style );
			}

			return $dynamic_css;
		}

		/**
		 * Parse CSS array into CSS string.
		 *
		 * @param array $css_array The CSS array to parse.
		 * @return string
		 */
		private function parse_css( $css_array ) {
			$css = '';

			foreach ( $css_array as $selector => $properties ) {
				$css .= $selector . ' {';
				foreach ( $properties as $property => $value ) {
					$css .= $property . ': ' . $value . ';';
				}
				$css .= '}';
			}

			return $css;
		}

		/**
		 * Checks the current theme version against the stored version.
		 * If the current version is greater, it updates the stored version and triggers an action.
		 *
		 * @return void
		 */
		public function version_check() {
			$old_version = get_option( 'zakra_version' );

			if ( empty( $old_version ) || version_compare( $old_version, ZAKRA_THEME_VERSION, '<' ) ) {
				// Update the version number.
				update_option( 'zakra_version', ZAKRA_THEME_VERSION );

				do_action( 'zakra_version_update', ZAKRA_THEME_VERSION, $old_version );
			}
		}

		/**
		 * Set up theme defaults and registers support for various WordPress features.
		 *
		 * @return void
		 */
		public function setup_theme() {

			// Make theme available for translation.
			load_theme_textdomain( 'zakra', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Let WordPress manage the document title.
			add_theme_support( 'title-tag' );

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Register menu.
			$menus = array(
				'menu-primary' => esc_html__( 'Primary Menu', 'zakra' ),
			);

			$enable_builder = get_theme_mod( 'zakra_enable_builder', false );
			if ( $enable_builder || zakra_maybe_enable_builder() ) {
				$menus['menu-secondary'] = esc_html__( 'Secondary Menu', 'zakra' );
				$menus['menu-mobile']    = esc_html__( 'Mobile Menu', 'zakra' );
			}

			register_nav_menus( $menus );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5',
				array(
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
				)
			);

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support(
				'custom-logo',
				array(
					'width'       => 170,
					'height'      => 60,
					'flex-width'  => true,
					'flex-height' => true,
				)
			);

			// Custom background support.
			add_theme_support( 'custom-background' );

			// Gutenberg Wide/fullwidth support.
			add_theme_support( 'align-wide' );

			// Add support for Block Styles.
			add_theme_support( 'wp-block-styles' );

			// Starter content for a designed front page on fresh sites / WordPress.org theme preview.
			if ( class_exists( 'Zakra_Starter_Content' ) ) {
				add_theme_support( 'starter-content', Zakra_Starter_Content::get() );
			}

			// AMP support.
			if ( defined( 'AMP__VERSION' ) && ( ! version_compare( AMP__VERSION, '1.0.0', '<' ) ) ) {

				add_theme_support(
					'amp',
					apply_filters(
						'zakra_amp_support_filter',
						array(
							'paired' => true,
						)
					)
				);
			}
		}
	}
}

Zakra_After_Setup_Theme::get_instance();
