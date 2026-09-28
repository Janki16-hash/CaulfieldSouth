<?php
/**
 * Abilities API — typed accessors for all Customizer settings.
 *
 * @package Zakra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Static API for reading Customizer settings with per-request caching.
 *
 * Usage: Zakra_Abilities::header_has_builder()
 */
class Zakra_Abilities {

	// -------------------------------------------------------------------------
	// Defaults
	// -------------------------------------------------------------------------

	const DEFAULT_GLOBAL_CONTAINER_LAYOUT = 'contained';
	const DEFAULT_GLOBAL_CONTAINER_WIDTH  = 1170;
	const DEFAULT_GLOBAL_SIDEBAR_LAYOUT   = 'no_sidebar';
	const DEFAULT_GLOBAL_SIDEBAR_WIDTH    = 30;
	const DEFAULT_GLOBAL_CONTENT_LAYOUT   = 'bordered';

	const DEFAULT_HEADER_MAIN_LAYOUT       = 'layout-1';
	const DEFAULT_HEADER_MAIN_LAYOUT_STYLE = 'style-1';
	const DEFAULT_HEADER_TOP_COL1_TYPE     = 'text_html';
	const DEFAULT_HEADER_TOP_COL2_TYPE     = 'none';
	const DEFAULT_HEADER_PAGE_HEADER_STYLE = 'style-1';

	const DEFAULT_FOOTER_BAR_COL1_TYPE = 'text_html';
	const DEFAULT_FOOTER_BAR_COL2_TYPE = 'none';
	const DEFAULT_FOOTER_WIDGET_LAYOUT = 'style-4';

	const DEFAULT_BLOG_CONTAINER_LAYOUT = 'default';
	const DEFAULT_BLOG_SIDEBAR_LAYOUT   = 'default';
	const DEFAULT_BLOG_EXCERPT_TYPE     = 'excerpt';
	const DEFAULT_BLOG_DATE_TYPE        = 'published-date';

	const DEFAULT_PAGE_CONTAINER_LAYOUT = 'default';
	const DEFAULT_PAGE_SIDEBAR_LAYOUT   = 'default';

	const DEFAULT_WOO_SIDEBAR_LAYOUT = 'no_sidebar';

	// -------------------------------------------------------------------------
	// Internal cache
	// -------------------------------------------------------------------------

	/**
	 * Per-request settings cache.
	 *
	 * @var array<string, mixed>
	 */
	private static $cache = array();

	/**
	 * Read a theme mod with per-request static caching.
	 *
	 * Returns the raw stored value. Callers must escape on output (esc_attr, esc_html, etc.).
	 *
	 * @param string $key             Setting ID.
	 * @param mixed  $fallback_value  Fallback value.
	 * @return mixed
	 */
	private static function mod( string $key, $fallback_value = null ) {
		if ( ! array_key_exists( $key, self::$cache ) ) {
			self::$cache[ $key ] = get_theme_mod( $key, $fallback_value );
		}
		return self::$cache[ $key ];
	}

	// =========================================================================
	// global_* — site-wide layout, color, container
	// =========================================================================

	/** Primary theme color (hex or CSS var). */
	public static function global_get_primary_color(): string {
		return (string) self::mod( 'zakra_primary_color', 'var(--zakra-color-1)' );
	}

	/** Base/background color. */
	public static function global_get_base_color(): string {
		return (string) self::mod( 'zakra_base_color', 'var(--zakra-color-6)' );
	}

	/** Default border color. */
	public static function global_get_border_color(): string {
		return (string) self::mod( 'zakra_border_color', 'var(--zakra-color-9)' );
	}

	/** Container layout slug (e.g. 'contained', 'full-width'). */
	public static function global_get_container_layout(): string {
		return (string) self::mod( 'zakra_global_container_layout', self::DEFAULT_GLOBAL_CONTAINER_LAYOUT );
	}

	/** Container width in pixels. */
	public static function global_get_container_width(): int {
		$val = self::mod( 'zakra_container_width', array( 'size' => self::DEFAULT_GLOBAL_CONTAINER_WIDTH, 'unit' => 'px' ) );
		return ( is_array( $val ) && isset( $val['size'] ) ) ? (int) $val['size'] : self::DEFAULT_GLOBAL_CONTAINER_WIDTH;
	}

	/** Global sidebar layout slug (e.g. 'no_sidebar', 'right-sidebar', 'left-sidebar'). */
	public static function global_get_sidebar_layout(): string {
		return (string) self::mod( 'zakra_global_sidebar_layout', self::DEFAULT_GLOBAL_SIDEBAR_LAYOUT );
	}

	/** Sidebar width as percentage integer. */
	public static function global_get_sidebar_width(): int {
		$val = self::mod( 'zakra_sidebar_width', array( 'size' => self::DEFAULT_GLOBAL_SIDEBAR_WIDTH, 'unit' => '%' ) );
		return ( is_array( $val ) && isset( $val['size'] ) ) ? (int) $val['size'] : self::DEFAULT_GLOBAL_SIDEBAR_WIDTH;
	}

	/** Content area layout slug (e.g. 'bordered', 'boxed'). */
	public static function global_get_content_area_layout(): string {
		return (string) self::mod( 'zakra_content_area_layout', self::DEFAULT_GLOBAL_CONTENT_LAYOUT );
	}

	// =========================================================================
	// header_* — header features and layout
	// =========================================================================

	/** Whether the header/footer builder is enabled (shared toggle). */
	public static function header_has_builder(): bool {
		return (bool) self::mod( 'zakra_enable_builder', false );
	}

	/** Whether the top bar is visible. */
	public static function header_has_top_bar(): bool {
		return (bool) self::mod( 'zakra_enable_top_bar', false );
	}

	/** Top bar column 1 content type slug (e.g. 'text_html', 'menu', 'none'). */
	public static function header_get_top_bar_col1_type(): string {
		return (string) self::mod( 'zakra_top_bar_column_1_content_type', self::DEFAULT_HEADER_TOP_COL1_TYPE );
	}

	/** Top bar column 2 content type slug. */
	public static function header_get_top_bar_col2_type(): string {
		return (string) self::mod( 'zakra_top_bar_column_2_content_type', self::DEFAULT_HEADER_TOP_COL2_TYPE );
	}

	/** Main header layout slug (e.g. 'layout-1', 'layout-2'). */
	public static function header_get_main_layout(): string {
		return (string) self::mod( 'zakra_main_header_layout', self::DEFAULT_HEADER_MAIN_LAYOUT );
	}

	/** Main header layout 1 style slug (e.g. 'style-1', 'style-2', 'style-3'). */
	public static function header_get_main_layout_style(): string {
		return (string) self::mod( 'zakra_main_header_layout_1_style', self::DEFAULT_HEADER_MAIN_LAYOUT_STYLE );
	}

	/** Whether header search is enabled. */
	public static function header_has_search(): bool {
		return (bool) self::mod( 'zakra_enable_header_search', true );
	}

	/** Whether WooCommerce product search is enabled in header. */
	public static function header_has_product_search(): bool {
		return (bool) self::mod( 'zakra_enable_product_search_search', false );
	}

	/** Whether the header CTA button is enabled. */
	public static function header_has_button(): bool {
		return (bool) self::mod( 'zakra_enable_header_button', false );
	}

	/** Header button label text. */
	public static function header_get_button_text(): string {
		return (string) self::mod( 'zakra_header_button_text', '' );
	}

	/** Header button URL. */
	public static function header_get_button_link(): string {
		return (string) self::mod( 'zakra_header_button_link', '' );
	}

	/** Whether the page header (title banner) is shown. */
	public static function header_has_page_header(): bool {
		return (bool) self::mod( 'zakra_enable_page_header', true );
	}

	/** Page header layout slug (e.g. 'style-1' through 'style-5'). */
	public static function header_get_page_header_layout(): string {
		return (string) self::mod( 'zakra_page_header_layout', self::DEFAULT_HEADER_PAGE_HEADER_STYLE );
	}

	/** Whether breadcrumbs are shown. */
	public static function header_has_breadcrumb(): bool {
		return (bool) self::mod( 'zakra_enable_breadcrumb', true );
	}

	// =========================================================================
	// footer_* — footer features and layout
	// =========================================================================

	/** Whether the footer builder is enabled (same toggle as header builder). */
	public static function footer_has_builder(): bool {
		return self::header_has_builder();
	}

	/** Whether the scroll-to-top button is shown. */
	public static function footer_has_scroll_to_top(): bool {
		return (bool) self::mod( 'zakra_enable_scroll_to_top', true );
	}

	/** Whether the classic footer widget columns area is enabled. */
	public static function footer_has_widget_column(): bool {
		return (bool) self::mod( 'zakra_enable_footer_column', false );
	}

	/** Classic footer widget columns layout slug (e.g. 'style-4'). */
	public static function footer_get_widget_column_layout(): string {
		return (string) self::mod( 'zakra_footer_column_layout_1_style', self::DEFAULT_FOOTER_WIDGET_LAYOUT );
	}

	/** Footer bar column 1 content type slug (e.g. 'text_html', 'menu', 'none'). */
	public static function footer_get_bar_col1_type(): string {
		return (string) self::mod( 'zakra_footer_bar_column_1_content_type', self::DEFAULT_FOOTER_BAR_COL1_TYPE );
	}

	/** Footer bar column 2 content type slug. */
	public static function footer_get_bar_col2_type(): string {
		return (string) self::mod( 'zakra_footer_bar_column_2_content_type', self::DEFAULT_FOOTER_BAR_COL2_TYPE );
	}

	// =========================================================================
	// blog_* — blog archive and single post
	// =========================================================================

	/** Blog archive container layout slug. */
	public static function blog_get_container_layout(): string {
		return (string) self::mod( 'zakra_blog_container_layout', self::DEFAULT_BLOG_CONTAINER_LAYOUT );
	}

	/** Blog archive sidebar layout slug. */
	public static function blog_get_sidebar_layout(): string {
		return (string) self::mod( 'zakra_blog_sidebar_layout', self::DEFAULT_BLOG_SIDEBAR_LAYOUT );
	}

	/** Excerpt type slug ('excerpt' or 'full-content'). */
	public static function blog_get_excerpt_type(): string {
		return (string) self::mod( 'zakra_blog_excerpt_type', self::DEFAULT_BLOG_EXCERPT_TYPE );
	}

	/** Whether the Read More button is shown on blog cards. */
	public static function blog_has_read_more(): bool {
		return (bool) self::mod( 'zakra_enable_blog_button', true );
	}

	/** Post date type slug ('published-date' or 'modified-date'). */
	public static function blog_get_post_date_type(): string {
		return (string) self::mod( 'zakra_blog_post_date_type', self::DEFAULT_BLOG_DATE_TYPE );
	}

	// =========================================================================
	// page_* — static pages
	// =========================================================================

	/** Single page container layout slug. */
	public static function page_get_container_layout(): string {
		return (string) self::mod( 'zakra_single_page_container_layout', self::DEFAULT_PAGE_CONTAINER_LAYOUT );
	}

	/** Single page sidebar layout slug. */
	public static function page_get_sidebar_layout(): string {
		return (string) self::mod( 'zakra_single_page_sidebar_layout', self::DEFAULT_PAGE_SIDEBAR_LAYOUT );
	}

	// =========================================================================
	// woo_* — WooCommerce (only called when WooCommerce is active)
	// =========================================================================

	/** WooCommerce shop/archive page sidebar layout slug. */
	public static function woo_get_page_sidebar_layout(): string {
		return (string) self::mod( 'zakra_woocommerce_page_sidebar_layout', self::DEFAULT_WOO_SIDEBAR_LAYOUT );
	}

	/** WooCommerce global sidebar layout slug (fallback for all WC pages). */
	public static function woo_get_global_sidebar_layout(): string {
		return (string) self::mod( 'zakra_woocommerce_global_sidebar_layout', self::DEFAULT_WOO_SIDEBAR_LAYOUT );
	}

	/** WooCommerce single product page sidebar layout slug. */
	public static function woo_get_single_product_sidebar_layout(): string {
		return (string) self::mod( 'zakra_single_product_sidebar_layout', self::DEFAULT_WOO_SIDEBAR_LAYOUT );
	}
}
