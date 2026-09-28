<?php
/**
 * Zakra starter content.
 *
 * Provides Customizer "starter content" so a fresh site — including the
 * WordPress.org theme preview — can show a designed static front page instead of
 * the default blog. Only a single Home page is offered.
 *
 * On a fresh site the Home page, and the Agency 03 header/footer chrome
 * around it ( Header Builder / Footer Builder theme-mods, Primary Menu,
 * footer widgets — see get_chrome() ), are both staged in the Customizer as
 * soon as it loads — the former by WordPress core itself via this class's
 * add_theme_support( 'starter-content', ... ) registration, the latter by
 * customize-notice.js firing an AJAX call the moment it runs — so the very
 * first preview the user sees already looks like the finished design. A
 * notice then lets the user choose to keep the starter homepage, or start
 * with a clean slate ( mirrors the Neve approach ), undoing the chrome and
 * publishing a normal blog instead — see ZAK-259.
 *
 * @package zakra
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_Starter_Content' ) ) {

	/**
	 * Class Zakra_Starter_Content.
	 */
	class Zakra_Starter_Content {

		const HOME_SLUG = 'home';
		const LOGO_SLUG = 'logo';

		/**
		 * Return the starter content staged immediately when the Customizer loads.
		 *
		 * A Home page is added, using the theme's normal page template — so
		 * the site's header.php / footer.php run as usual and Header Builder,
		 * Footer Builder, and Customizer theme-mods all apply to it like any
		 * other page. The in-between content sections (hero, features,
		 * portfolio, pricing, team, etc.) come from the block markup ( see
		 * compatibility/starter-content/home.php ).
		 *
		 * The bundled logo is staged as an attachment here too ( sideloading it
		 * has no visible effect on its own — nothing references it yet — but
		 * doing it now means it's ready and reusable by get_chrome() the moment
		 * "Keep the starter homepage" is clicked ).
		 *
		 * @return array
		 */
		public static function get() {

			$content = array(
				// Use a static front page so the preview shows the designed Home page.
				'options'     => array(
					'show_on_front' => 'page',
					'page_on_front' => '{{' . self::HOME_SLUG . '}}',
				),

				// Single starter page: Home.
				'posts'       => array(
					self::HOME_SLUG => require __DIR__ . '/compatibility/starter-content/home.php',
				),

				// Bundled logo, ready to be referenced by get_chrome().
				'attachments' => self::logo_attachment(),
			);

			return apply_filters( 'zakra_starter_content', $content );
		}

		/**
		 * Return the Agency 03 header/footer chrome definition.
		 *
		 * Not part of get() — applied via ajax_apply_chrome() instead, fired by
		 * customize-notice.js the moment it runs ( so the preview shows the
		 * finished design immediately, not just after "Keep" is clicked — that
		 * button only publishes what's already staged by then ). Repeats the
		 * same 'posts' / 'attachments' entries from get() so WordPress core's
		 * {{home}} / {{logo}} placeholder resolution keeps working on this
		 * second, separate import_theme_starter_content() call; the matching
		 * post_type + post_name means the already-staged Home page and logo are
		 * re-used rather than duplicated.
		 *
		 * @return array
		 */
		public static function get_chrome() {

			global $wp_customize;

			// WordPress.org's theme preview ( and Appearance > Themes'
			// "Live Preview" for a theme that isn't the active one ) run the
			// Customizer against a theme that was never actually activated
			// on a real site — nothing gets published there, it is only
			// ever looked at, so the full demo nav ( About/Shop/Blog/Contact )
			// matches the original design. On a real, already-active site
			// that "Keep the starter homepage" runs on, those would be dead
			// '#' links to pages that don't exist, so they're left out there.
			$is_theme_preview = ( $wp_customize instanceof WP_Customize_Manager ) && ! $wp_customize->is_theme_active();

			$nav_menu_items = array(
				array(
					'type'      => 'post_type',
					'object'    => 'page',
					'object_id' => '{{' . self::HOME_SLUG . '}}',
				),
			);

			if ( $is_theme_preview ) {
				foreach ( array( __( 'About', 'zakra' ), __( 'Shop', 'zakra' ), __( 'Blog', 'zakra' ), __( 'Contact', 'zakra' ) ) as $label ) {
					$nav_menu_items[] = array(
						'type'  => 'custom',
						'title' => $label,
						'url'   => '#',
					);
				}
			}

			$chrome = array(
				'posts'       => array(
					self::HOME_SLUG => require __DIR__ . '/compatibility/starter-content/home.php',
				),
				'attachments' => self::logo_attachment(),

				// Header Builder / Footer Builder layout & styling. Shares
				// $is_theme_preview above — theme-mods.php reads it too, for
				// the footer's Quick Links block.
				'theme_mods'  => require __DIR__ . '/compatibility/starter-content/theme-mods.php',

				// Primary Menu: the real Home page, plus the demo's other
				// nav items only in the WordPress.org preview context —
				// see $is_theme_preview above.
				'nav_menus'   => array(
					'menu-primary' => array(
						'name'  => _x( 'Primary Menu', 'Theme starter content', 'zakra' ),
						'items' => $nav_menu_items,
					),
				),

				// Footer's "Latest Posts" and "Contact Info" columns. These are
				// the sidebar IDs registered in class-zakra-widgets.php — NOT
				// the Customizer "section2" IDs used in footer-builder.php.
				'widgets'     => array(
					'footer-sidebar-3' => array(
						array(
							'recent-posts',
							array(
								'title'  => __( 'Latest Posts', 'zakra' ),
								'number' => 3,
							),
						),
					),
					'footer-sidebar-4' => array(
						array(
							'text',
							array(
								'title'  => __( 'Contact Us', 'zakra' ),
								'text'   => __( "Ph. : +(123) 456-7890\nEmail : first.last@demos.com\nLoc : Moon Street , 446 Jupiter\nOpen : 9AM – 6PM (Mon – Fri)", 'zakra' ),
								'filter' => true,
							),
						),
					),
				),
			);

			return apply_filters( 'zakra_starter_content_chrome', $chrome );
		}

		/**
		 * Starter-content 'attachments' entry for the bundled logo.
		 *
		 * @return array
		 */
		private static function logo_attachment() {

			return array(
				self::LOGO_SLUG => array(
					'file'       => 'assets/img/starter/logo.png',
					'post_title' => _x( 'Logo', 'Theme starter content', 'zakra' ),
				),
			);
		}

		/**
		 * Find the ID of the logo attachment already sideloaded by get(),
		 * tagged the same way WordPress core's own starter-content importer
		 * tags every attachment it sideloads ( see
		 * WP_Customize_Manager::import_theme_starter_content() ).
		 *
		 * @return int
		 */
		private static function logo_attachment_id() {

			$attachments = get_posts(
				array(
					'post_type'      => 'attachment',
					'post_status'    => 'auto-draft',
					'posts_per_page' => 1,
					'fields'         => 'ids',
					'meta_key'       => '_customize_draft_post_name',
					'meta_value'     => self::LOGO_SLUG,
				)
			);

			return $attachments ? (int) $attachments[0] : 0;
		}

		/**
		 * Find the ID of the Home page already staged by get(), tagged the
		 * same way WordPress core's own starter-content importer tags every
		 * post it stages ( see WP_Customize_Manager::insert_auto_draft_post() ).
		 *
		 * @return int
		 */
		private static function home_page_id() {

			$pages = get_posts(
				array(
					'post_type'      => 'page',
					'post_status'    => 'auto-draft',
					'posts_per_page' => 1,
					'fields'         => 'ids',
					'meta_key'       => '_customize_draft_post_name',
					'meta_value'     => self::HOME_SLUG,
				)
			);

			return $pages ? (int) $pages[0] : 0;
		}

		/**
		 * Set the per-page meta that only makes sense once the Agency 03
		 * chrome is actually applied — hiding the Page Header/breadcrumb bar
		 * the demo doesn't have, and marking the page for
		 * print_home_page_styles() to scope its CSS fix to.
		 *
		 * This can't be done via home.php's returned array's 'meta_input' key
		 * the way it would be for a normal wp_insert_post() call: starter
		 * content 'posts' entries are expanded through WordPress core's
		 * get_theme_starter_content(), which keeps only a fixed allowlist of
		 * fields ( post_type, post_title, post_excerpt, post_name,
		 * post_content, menu_order, comment_status, thumbnail, template ) —
		 * meta_input isn't one of them, so it's silently dropped before
		 * import_theme_starter_content() ever runs. Passing 'posts' again
		 * here via get_chrome() doesn't help either, since the Home page
		 * already exists by then and import_theme_starter_content() just
		 * reuses its ID without looking at meta_input a second time. Setting
		 * the meta directly, once the page's real ID is known, is the only
		 * mechanism that actually reaches the post.
		 *
		 * @return void
		 */
		private static function set_home_page_meta() {

			$home_id = self::home_page_id();

			if ( ! $home_id ) {
				return;
			}

			update_post_meta( $home_id, 'zakra_page_header', false );
			update_post_meta( $home_id, '_zakra_starter_content_page', true );
		}

		/**
		 * Enqueue the "fresh site" Customizer notice.
		 *
		 * Shown only on a fresh site ( the same condition WordPress uses to import
		 * starter content ). Lets the user keep the starter homepage — chrome and
		 * all, already staged by the time this notice appears — or start with a
		 * clean slate instead.
		 *
		 * @return void
		 */
		public static function enqueue_fresh_site_notice() {

			// Only when the site is still fresh ( no published content yet ).
			if ( ! get_option( 'fresh_site' ) ) {
				return;
			}

			global $wp_customize;

			wp_enqueue_script(
				'zakra-starter-content-notice',
				get_template_directory_uri() . '/inc/compatibility/starter-content/customize-notice.js',
				array( 'customize-controls', 'jquery' ),
				defined( 'ZAKRA_THEME_VERSION' ) ? ZAKRA_THEME_VERSION : false,
				true
			);

			// custom_logo's value in get_chrome() is still the raw '{{logo}}'
			// placeholder — swap in the real attachment ID here so it can be
			// set client-side too ( the logo itself is already sideloaded as
			// an auto-draft attachment by get(), staged at the same time as
			// the Home page itself ).
			$chrome_theme_mods = self::get_chrome()['theme_mods'];
			$logo_id           = self::logo_attachment_id();
			if ( $logo_id ) {
				$chrome_theme_mods['custom_logo'] = $logo_id;
			} else {
				unset( $chrome_theme_mods['custom_logo'] );
			}

			// "Clean slate" needs each theme-mod's real registered default to
			// revert to — wp.customize.Setting has no '.default' of its own
			// client-side ( unlike the PHP WP_Customize_Setting it mirrors ),
			// so that has to be looked up here and sent over instead.
			$chrome_defaults = array();
			foreach ( $chrome_theme_mods as $id => $value ) {
				$setting = $wp_customize->get_setting( $id );
				if ( $setting ) {
					$chrome_defaults[ $id ] = $setting->default;
				}
			}

			wp_localize_script(
				'zakra-starter-content-notice',
				'zakraStarterContent',
				array(
					'title'          => __( 'Welcome to your new site!', 'zakra' ),
					'message'        => __( 'We\'ve added a starter homepage to help you get going quickly. It is only published if you keep it.', 'zakra' ),
					'keep'           => __( 'Keep the starter homepage', 'zakra' ),
					'clean'          => __( 'Start with a clean slate', 'zakra' ),
					'note'           => __( 'Don\'t worry — you can always change this later.', 'zakra' ),
					'chromeNonce'    => wp_create_nonce( 'zakra-starter-chrome' ),
					'chromeMods'     => $chrome_theme_mods,
					'chromeDefaults' => $chrome_defaults,
				)
			);

			wp_add_inline_style( 'customize-controls', self::notice_css() );
		}

		/**
		 * AJAX handler: stage the Agency 03 header/footer chrome into the live
		 * Customizer changeset. Fired by customize-notice.js the moment it
		 * runs, not gated behind either notice button — "Keep" just publishes
		 * what this already staged; "Clean slate" undoes it before publishing.
		 *
		 * Relies on WordPress core's own admin-ajax bootstrap, which already
		 * instantiates $GLOBALS['wp_customize'] scoped to the request's
		 * `customize_changeset_uuid` whenever `wp_customize=on` is posted
		 * alongside it — the same mechanism every other Customizer AJAX action
		 * ( menus, widgets, save ) relies on, so no manual bootstrapping needed.
		 *
		 * Something else can race to save the same live changeset at the same
		 * moment — WordPress's own Customizer autosave heartbeat included —
		 * clobbering one of the array-shaped theme-mods staged here right
		 * after it's written. Worse, any such competing save that doesn't
		 * itself pass 'starter_content' => true clears that flag from every
		 * setting it touches ( see WP_Customize_Manager::save_changeset_post()
		 * ), and import_theme_starter_content() refuses to re-stage a setting
		 * once its flag is gone — so after the first heartbeat autosave fires,
		 * calling it again here would silently do nothing for settings the
		 * heartbeat already touched. To stay robust regardless, this re-reads
		 * the changeset from the database ( bypassing the in-request post
		 * cache, which can otherwise mask a clobber by returning what THIS
		 * request wrote even after another request has overwritten it ), and
		 * for anything that didn't stick, re-asserts it with a direct,
		 * unconditional save that doesn't depend on that flag at all — a few
		 * times, before giving up.
		 *
		 * @return void
		 */
		public static function ajax_apply_chrome() {

			check_ajax_referer( 'zakra-starter-chrome', 'nonce' );

			if ( ! current_user_can( 'customize' ) ) {
				wp_send_json_error();
			}

			global $wp_customize;

			if ( ! ( $wp_customize instanceof WP_Customize_Manager ) ) {
				wp_send_json_error();
			}

			$chrome       = self::get_chrome();
			$max_attempts = 8;
			$unresolved   = array();

			// First pass: the normal starter-content import, which resolves
			// the {{home}}/{{logo}} placeholders and creates the nav menu and
			// widgets, in addition to staging the theme-mods.
			$wp_customize->import_theme_starter_content( $chrome );

			// Not part of that import — see set_home_page_meta()'s docblock
			// for why the per-page meta has to be set this way instead.
			self::set_home_page_meta();

			for ( $attempt = 1; $attempt <= $max_attempts; $attempt++ ) {

				$changeset_id = $wp_customize->changeset_post_id();

				usleep( 200000 ); // Give a competing save a moment to land before checking.

				$unresolved = $changeset_id
					? self::find_unpersisted_mods( $changeset_id, $chrome['theme_mods'] )
					: array_keys( $chrome['theme_mods'] );

				if ( empty( $unresolved ) ) {
					break;
				}

				// Re-assert just what didn't stick with a direct save that
				// doesn't rely on the ( possibly already-cleared ) starter-
				// content flag import_theme_starter_content() itself needs.
				$data = array();
				foreach ( $unresolved as $name ) {
					if ( $wp_customize->get_setting( $name ) ) {
						$data[ $name ] = array( 'value' => $chrome['theme_mods'][ $name ] );
					}
				}
				if ( $data ) {
					$wp_customize->save_changeset_post( array( 'data' => $data ) );
				}
			}

			wp_send_json_success(
				array(
					'attempts'   => $attempt,
					'unresolved' => $unresolved,
				)
			);
		}

		/**
		 * Compare the theme-mods just staged against what's actually stored in
		 * the changeset post right now, bypassing the in-request post cache so
		 * a same-request read can't mask a same-moment overwrite by another
		 * request.
		 *
		 * @param int   $changeset_id Changeset post ID.
		 * @param array $expected_mods Theme-mod name => expected value.
		 * @return string[] Names of theme-mods whose stored value doesn't match.
		 */
		private static function find_unpersisted_mods( $changeset_id, $expected_mods ) {

			clean_post_cache( $changeset_id );

			$changeset_post = get_post( $changeset_id );
			$changeset_data = $changeset_post ? json_decode( $changeset_post->post_content, true ) : null;

			if ( ! is_array( $changeset_data ) ) {
				return array_keys( $expected_mods );
			}

			$stylesheet  = get_stylesheet();
			$unpersisted = array();

			foreach ( $expected_mods as $name => $expected_value ) {

				// Placeholder values ( e.g. custom_logo => '{{logo}}' ) get
				// resolved to a real ID during staging, so the stored value is
				// never expected to match the raw placeholder string — skip.
				if ( is_string( $expected_value ) && preg_match( '/^{{.+}}$/', $expected_value ) ) {
					continue;
				}

				$stored_entry = $changeset_data[ $stylesheet . '::' . $name ] ?? null;
				$stored_value = $stored_entry['value'] ?? '__zakra_missing__';

				if ( maybe_serialize( $stored_value ) !== maybe_serialize( $expected_value ) ) {
					$unpersisted[] = $name;
				}
			}

			return $unpersisted;
		}

		/**
		 * Inline CSS for the Customizer notice card.
		 *
		 * @return string
		 */
		private static function notice_css() {

			return '.zakra-sc-notice{margin:12px;padding:16px;background:#fff;border:1px solid #dcdcde;border-left:4px solid #2271b1;border-radius:2px;}'
				. '.zakra-sc-notice h3{margin:0 0 6px;font-size:14px;line-height:1.4;}'
				. '.zakra-sc-notice p{margin:0 0 12px;color:#50575e;font-size:13px;line-height:1.5;}'
				. '.zakra-sc-notice .button{display:block;width:100%;text-align:center;margin:0 0 8px;}'
				. '.zakra-sc-notice .zakra-sc-note{margin:10px 0 0;font-size:12px;color:#787c82;text-align:center;}';
		}

		/**
		 * Zero out #zak-primary's own top/bottom padding, but ONLY on the
		 * starter-content Home page — never anywhere else.
		 *
		 * The Agency 03 demo's edge-to-edge sections leave a visible gap
		 * above and below the page content because #zak-primary carries that
		 * padding independent of any block spacing. The theme's own "Remove
		 * content padding" per-page option ( zakra_remove_content_margin,
		 * body class zak-no-content-margin ) looked like the obvious fix,
		 * but its CSS ( see _content.scss ) only ever zeroes .zak-row's
		 * padding, never #zak-primary's — so making it also do that would
		 * change how "Remove content padding" behaves for every existing
		 * page and site already using it, plus the transparent-header,
		 * Elementor full-width, and page-builder-template cases that share
		 * the same CSS rule, none of which this ticket has anything to do
		 * with. Scoping the fix to a dedicated marker meta instead ( set
		 * only in home.php's returned array ) means this can only ever
		 * apply to this one page.
		 *
		 * @return void
		 */
		public static function print_home_page_styles() {

			if ( ! is_page() || ! get_post_meta( get_the_ID(), '_zakra_starter_content_page', true ) ) {
				return;
			}

			wp_add_inline_style( 'zakra-style', '#zak-primary{padding-top:0;padding-bottom:0;}' );
			wp_add_inline_style( 'zakra-style', 'html,body{overflow-x:clip;}' );
		}
	}
}

add_action( 'customize_controls_enqueue_scripts', array( 'Zakra_Starter_Content', 'enqueue_fresh_site_notice' ) );
add_action( 'wp_ajax_zakra_apply_starter_chrome', array( 'Zakra_Starter_Content', 'ajax_apply_chrome' ) );
add_action( 'wp_enqueue_scripts', array( 'Zakra_Starter_Content', 'print_home_page_styles' ), 20 );
