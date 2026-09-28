<?php
/**
 * Load CSS & Javascript files.
 *
 * @package zakra
 *
 * TODO: @since.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_Enqueue_Scripts' ) ) {

	/**
	 * Enqueue Scripts.
	 */
	class Zakra_Enqueue_Scripts {

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

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			// Preload critical web fonts as early as possible in <head> to prevent the
			// font-swap layout shift that happens while the CSS-referenced font file downloads.
			add_action( 'wp_head', array( $this, 'preload_web_fonts' ), 1 );

			add_action( 'enqueue_block_assets', array( $this, 'block_editor_styles' ), 1 );

			add_action( 'customize_controls_enqueue_scripts', array( $this, 'zakra_inline_customizer_css' ) );

			// Bust the dynamic CSS cache whenever the Customizer settings are saved.
			add_action( 'customize_save_after', array( $this, 'clear_dynamic_css_cache' ) );

			if ( is_child_theme() ) {
				add_action(
					'customize_controls_enqueue_scripts',
					[
						$this,
						'zakra_child_theme_inline_customizer_css',
					]
				);
			}
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @return void
		 * TODO: Refactor this, split code inside method.
		 */
		public function enqueue_scripts() {

			$suffix = zakra_get_script_suffix();

			// FontAwesome.
			global $customind;

			$fontawesome_path = $customind->get_asset_url( 'all.min.css', 'assets/fontawesome/v6/css', false );

			wp_enqueue_style( 'font-awesome-all', $fontawesome_path, array(), '6.2.4' );

			// Local Google fonts locally.
			$host_fonts_locally = get_theme_mod( 'zakra_load_google_fonts_locally', false );

			$typography_ids = $this->get_typography_control_ids();

			$google_fonts_url = \Customind\Core\get_google_fonts_url_by_ids( $typography_ids, $host_fonts_locally );

			if ( $google_fonts_url ) {
				wp_enqueue_style( 'zakra_google_fonts', $google_fonts_url, array(), ZAKRA_THEME_VERSION, 'all' );
			}

			// Theme style.
			wp_register_style(
				'zakra-style',
				get_stylesheet_uri(),
				array(),
				ZAKRA_THEME_VERSION
			);

			wp_enqueue_style( 'zakra-style' );

			// Support RTL.
			wp_style_add_data( 'zakra-style', 'rtl', 'replace' );

			/**
			 * Dynamic CSS.
			 */
			// Serve dynamic CSS from a transient cache unless inside the Customizer live preview,
			// where edits need to reflect immediately.
			$dynamic_css_fingerprint = ! is_customize_preview() ? md5( serialize( get_theme_mods() ) ) : ''; // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_serialize
			$cached_dynamic_css      = ! is_customize_preview() ? get_transient( 'zakra_dynamic_css_cache' ) : false;

			if ( ! is_customize_preview() && false !== $cached_dynamic_css && isset( $cached_dynamic_css['hash'], $cached_dynamic_css['css'] ) && $cached_dynamic_css['hash'] === $dynamic_css_fingerprint ) {
				$theme_dynamic_css = $cached_dynamic_css['css'];
			} else {

				// Dynamically generated styles from options.
				add_filter( 'zakra_dynamic_theme_css', array( 'Zakra_Dynamic_CSS', 'render_output' ) );
				add_filter( 'zakra_dynamic_theme_css', array( 'Zakra_Dynamic_CSS', 'render_builder_output' ) );

				// Generate dynamic CSS to add inline styles for the theme.
				$theme_dynamic_css = apply_filters( 'zakra_dynamic_theme_css', '' );

				if ( ! is_customize_preview() ) {
					set_transient(
						'zakra_dynamic_css_cache',
						array(
							'hash' => $dynamic_css_fingerprint,
							'css'  => $theme_dynamic_css,
						),
						DAY_IN_SECONDS
					);
				}
			}

			// Load dynamic CSS.
			if ( zakra_is_zakra_pro_active() ) {

				wp_add_inline_style( 'zakra-pro', $theme_dynamic_css );
			} else {

				wp_add_inline_style( 'zakra-style', $theme_dynamic_css );
			}

			/**
			 * Scripts.
			 */
			// Do not load scripts if AMP.
			if ( zakra_is_amp() ) {

				return;
			}

			// Script for menus.
			wp_enqueue_script(
				'zakra-navigation',
				ZAKRA_PARENT_ASSETS_URI . '/js/navigation' . $suffix . '.js',
				array(),
				ZAKRA_THEME_VERSION,
				true
			);

			// Accessiblity JS for keyboard only users.
			wp_enqueue_script(
				'zakra-skip-link-focus-fix',
				ZAKRA_PARENT_ASSETS_URI . '/js/skip-link-focus-fix' . $suffix . '.js',
				array(),
				ZAKRA_THEME_VERSION,
				true
			);

			// Zakra main JavaScript file.
			wp_enqueue_script(
				'zakra-custom',
				ZAKRA_PARENT_ASSETS_URI . '/js/zakra-custom' . $suffix . '.js',
				array(),
				ZAKRA_THEME_VERSION,
				true
			);

			// JS file for comment form.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Get the typography Customizer control IDs whose fonts get loaded via Google Fonts.
		 *
		 * Shared by `enqueue_scripts()` and `preload_web_fonts()` so both always resolve the
		 * exact same font URL — `preload_web_fonts()` relies on this to hit the same font
		 * cache `enqueue_scripts()` already populated, rather than triggering a second fetch.
		 *
		 * @return array
		 */
		private function get_typography_control_ids() {

			return apply_filters(
				'zakra_enqueue_scripts_typography_ids',
				array(
					'zakra_body_typography',
					'zakra_heading_typography',
					'zakra_site_title_typography',
					'zakra_site_tagline_typography',
					'zakra_main_menu_typography',
					'zakra_sub_menu_typography',
					'zakra_mobile_menu_typography',
					'zakra_breadcrumb_typography',
					'zakra_shop_product_button_typography',
					'zakra_shop_product_price_typography',
					'zakra_shop_product_title_typography',
					'zakra_shop_product_view_cart_typography',
					'zakra_post_page_title_typography',
					'zakra_blog_post_title_typography',
					'zakra_h1_typography',
					'zakra_h2_typography',
					'zakra_h3_typography',
					'zakra_h4_typography',
					'zakra_h5_typography',
					'zakra_h6_typography',
					'zakra_widget_title_typography',
					'zakra_widget_content_typography',
					'zakra_header_drawer_menu_typography',
					'zakra_header_main_menu_typography',
					'zakra_header_sub_menu_typography',
					'zakra_header_site_title_typography',
					'zakra_header_site_tagline_typography',
					'zakra_header_secondary_menu_typography',
					'zakra_header_secondary_sub_menu_typography',
					'zakra_header_tertiary_menu_typography',
					'zakra_header_tertiary_sub_menu_typography',
					'zakra_header_quaternary_menu_typography',
					'zakra_button_typography',
					'zakra_header_button_typography',
				)
			);
		}

		/**
		 * Preload the critical web font files.
		 *
		 * The Google Fonts stylesheet enqueued in `enqueue_scripts()` only points at the
		 * font files via `@font-face src` — the browser can't start downloading them until
		 * it has fetched and parsed that stylesheet. Meanwhile, `font-display: fallback`
		 * paints text with a fallback font, then swaps to the web font once it arrives,
		 * shifting layout as text metrics change. Preloading the font files directly lets
		 * the browser fetch them in parallel with the stylesheet, closing that gap.
		 *
		 * Font files can only be preloaded when hosted locally, since remote Google Fonts
		 * URLs aren't known ahead of the stylesheet request; in that case, preconnect to the
		 * font host instead to reduce the connection latency for the eventual font request.
		 *
		 * @return void
		 */
		public function preload_web_fonts() {

			if ( ! get_theme_mod( 'zakra_load_google_fonts_locally', false ) ) {

				echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";

				return;
			}

			$font_files = \Customind\Core\get_google_font_files_by_ids( $this->get_typography_control_ids() );

			// Cap the number of preloaded files: preloading is meant for the handful of
			// fonts needed for the very first paint, not every configured typeface/weight.
			$font_files = apply_filters( 'zakra_preload_web_fonts_files', array_slice( $font_files, 0, 4 ) );

			foreach ( $font_files as $font_file ) {

				printf(
					'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin />' . "\n",
					esc_url( $font_file )
				);
			}
		}

		/**
		 * Bust the dynamic CSS transient cache after a Customizer save,
		 * so saved changes appear immediately on the next page load.
		 *
		 * @return void
		 */
		public function clear_dynamic_css_cache() {

			delete_transient( 'zakra_dynamic_css_cache' );
		}

		/**
		 * Enqueue block editor styles.
		 *
		 * Hooked on `enqueue_block_assets` instead of `enqueue_block_editor_assets` because
		 * only styles enqueued via the former are picked up inside the iframed block editor
		 * canvas; the latter triggers Gutenberg's "was added to the iframe incorrectly"
		 * console warning instead. `enqueue_block_assets` also fires on the frontend, but
		 * this stylesheet only exists to compensate for editor-canvas-only spacing, so bail
		 * out there to avoid enqueuing it twice on the front end.
		 *
		 * TODO: @since.
		 */
		public function block_editor_styles() {

			if ( ! is_admin() ) {
				return;
			}

			wp_enqueue_style( 'zakra-block-editor-styles', ZAKRA_PARENT_URI . '/style-editor-block.css', array(), ZAKRA_THEME_VERSION );
		}

		public function zakra_inline_customizer_css() {
			$css = '

				#customize-control-zakra_content_area_heading {
				display: inline-block;
                 width: 100%;
				}

				#customize-control-external_header_video,#customize-control-header_image,#customize-control-header_video {
				display: contents;
				}

				#accordion-section-title_tagline {
				    margin-top: 40px;
				        border-top: 1px solid #dcdcde !important;
				}

				#accordion-panel-zakra_global {
				 border-top: 1px solid #dcdcde !important;
				}

				#customize-theme-controls .customize-pane-child#sub-accordion-section-zakra_header_builder_section {
				height: 780px;
				}

				#customize-control-zakra_button_color_group,#customize-control-zakra_enable_scroll_to_top,#customize-control-zakra_load_google_fonts_locally,#customize-control-zakra_enable_breadcrumb,#customize-control-zakra_enable_page_header,.customize-section-title-nav_menus-heading {
				 margin-top: 12px;
				}

				.customize-control-nav_menu_location select {
				max-width: 100% !important;
				}

				#customize-control-zakra_body_typography .customind-typography-label,#customize-control-zakra_heading_typography .customind-typography-label,#customize-control-zakra_site_title_typography .customind-typography-label,#customize-control-zakra_site_tagline_typography .customind-typography-label,#customize-control-zakra_main_menu_typography .customind-typography-label,#customize-control-zakra_sub_menu_typography .customind-typography-label,#customize-control-zakra_mobile_menu_typography .customind-typography-label {
				font-weight: 600;
				}

				#customize-control-site_icon .customize-control-title,#customize-control-site_icon .customize-control-description,#customize-control-zakra_header_media_heading {
				display: none;
				}

				#customize-control-zakra_color_palette .customind-preset-1, #customize-control-zakra_color_palette .customind-preset-2, #customize-control-zakra_color_palette .customind-preset-3, #customize-control-zakra_color_palette .customind-preset-4 {
				display:none
				}

				[data-customind-builder-panel="zakra_header_builder"].in-sub-panel:not(.section-open) #customize-theme-controls ul[id="sub-accordion-section-zakra_header_builder_section"],[data-customind-builder-panel="zakra_footer_builder"].in-sub-panel:not(.section-open) #customize-theme-controls ul[id="sub-accordion-section-zakra_footer_builder_section"] {
                     background: #F0F0F1;
				}

				#customize-control-zakra_header_builder_components .customind-header-types,#sub-accordion-section-zakra_footer_builder_section .customind-footer-types {
				display: none;
				}

				#customize-controls .customize-info {
				margin-bottom: 0;
				}

		        #customize-control-zakra_site_identity_general_heading .customind-control .font-normal{
		        font-weight: 600;
		        }

		        #customize-control-zakra_header_media_heading .customind-control .font-normal{
		        font-weight: 600;
		        }

		        #customize-control-zakra_header_media_heading .customind-control {
		        border-bottom: 1px solid #e5e5e5;
		        }

		        #customize-control-zakra_site_identity_general_heading .customind-control {
		        border-bottom: 1px solid #e5e5e5;
		        }

		        #customize-control-blogname #_customize-input-blogname {
		        height: 40px;
		        }

		        #customize-control-blogdescription #_customize-input-blogdescription {
		        height: 40px;
		        }

		        /*
		         * Also require #sub-accordion-panel-zakra_header.current-panel -- WP core own
		         * reliable indicator of which panel is actually open -- alongside the data-attribute
		         * above. That attribute is only ever toggled by our own JS bound to the classic
		         * zakra_header panel, with no cross-check against which panel is truly current, so
		         * if that gets stale this Enable Builder promo control can float over unrelated
		         * panels, e.g. the Header Builder panel, instead of staying inside its own.
		         */
		        [data-zakra-header-panel="active"] #sub-accordion-panel-zakra_header.current-panel #sub-accordion-section-zakra_builder{
			    top: 65px !important;
			        left:2px !important;
			    visibility: visible !important;
			    height: auto !important;
			    transform: none !important;
			    z-index: 99999999;
			}

			[data-zakra-header-panel="active"] #sub-accordion-panel-zakra_header.current-panel #sub-accordion-section-zakra_builder .section-meta{
			    display:none !important;
			}

			[data-zakra-header-panel="active"] #sub-accordion-panel-zakra_header.current-panel #accordion-section-zakra_builder {
			    height:155px !important;
			    visibility: hidden;
			}
			[data-zakra-header-panel="active"] #sub-accordion-panel-zakra_header.current-panel [data-control-id="zakra_builder_heading"]{
			    max-width: 310px !important;
			}

			.section-open[data-zakra-header-panel="active"] #sub-accordion-panel-zakra_header.current-panel #sub-accordion-section-zakra_builder{
			    visibility: hidden !important;
			    height: auto !important;
			    transform: none !important;
			}

			    #customize-control-zakra_header_builder_style_heading {
			    margin-top: 20px;
			    }

			    .zak-hidden{
			       height: 0;
				    visibility: hidden;
				    padding: 0 !important;
				    margin: 0;
				}

				.customize-control-customind-upsell a:focus{
				color:white;
				box-shadow: none;
				outline: none;
				}

				#customize-control-zakra_demo_migrated_heading {
				display: none;
				}

				#customize-theme-controls .control-section-customind-upsell-section .accordion-section-title {
				    padding: 16px 8px;
				}

				#customize-theme-controls #sub-accordion-panel-zakra_header_builder.current-panel{
					height: auto !important;
				}

				#customize-theme-controls #sub-accordion-section-zakra_header_builder_section, #customize-theme-controls #sub-accordion-section-zakra_footer_builder_section{
					background-color: #ffffff;
				}
		    ';

			// These sections are real, functional Pro features once Zakra Pro is active,
			// so their native accordion navigation must stay visible; only hide it in favor
			// of the upsell entries above while Pro isn't active.
			if ( ! zakra_is_zakra_pro_active() ) {
				$css .= '
				#accordion-section-zakra_sticky_header > .accordion-section-title,
				#accordion-section-zakra_transparent_header > .accordion-section-title,
				#accordion-section-zakra_header_action > .accordion-section-title {
					display: none;
				}
				';
			}

			wp_add_inline_style( 'customize-controls', $css );
		}

		public function zakra_child_theme_inline_customizer_css() {
			wp_add_inline_style(
				'customize-controls',
				'
		        .zak-hidden.child-theme-notice {
					height: auto;
				    visibility: visible;
				        padding-top: 16px !important;
                         padding-bottom: 16px !important;
				    margin: 0;
				}

		    '
			);
		}
	}

}

Zakra_Enqueue_Scripts::get_instance();
