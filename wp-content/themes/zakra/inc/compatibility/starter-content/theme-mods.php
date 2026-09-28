<?php
/**
 * Header Builder / Footer Builder starter content for Zakra.
 *
 * Recreates the Zakra "Agency 03" demo's header and footer chrome using real
 * Header Builder / Footer Builder theme-mods, instead of duplicating them as
 * static block markup ( see home.php for why — ZAK-259 ). Unlike the Home
 * page itself, none of this is staged when the Customizer first loads —
 * it is only applied via an AJAX call fired when the user clicks "Keep the
 * starter homepage" ( see customize-notice.js and
 * Zakra_Starter_Content::ajax_apply_chrome() ), so a user who picks "Start
 * with a clean slate" never has any of it touch their site at all.
 *
 * @package zakra
 */

defined( 'ABSPATH' ) || exit;

$site_name = get_bloginfo( 'name' );

// Decorative cart icon ( no theme ever wires this to a real cart — the
// Agency 03 demo's own cart icon was purely decorative too ), placed via
// Header Builder's HTML 1 component rather than the WooCommerce-only Cart
// component, so it shows regardless of which plugins are active.
$header_cart_icon = '<span style="position:relative;display:inline-flex;align-items:center;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-label="Cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"></path></svg></span>';

$footer_html_1 = sprintf(
	'<div style="display:flex;align-items:center;gap:10px;margin-bottom:18px;"><span style="width:34px;height:34px;border-radius:50%%;background:#118b57;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:18px;">%1$s</span><span style="font-weight:700;font-size:22px;color:#1A1A1A;letter-spacing:-0.01em;">%2$s</span></div><p>%3$s</p>',
	esc_html( mb_substr( $site_name, 0, 1 ) ),
	esc_html( $site_name ),
	esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elit feugiat sit purus varius. Non in turpis tincidunt nulla. Condimentum ultrices nunc odio ante.', 'zakra' )
);

// Home is a real, working link everywhere. The rest are only added in the
// WordPress.org preview context ( see $is_theme_preview in get_chrome() ) —
// on a real site none of those pages exist, so they'd be dead '#' links.
$quick_links = array(
	array(
		'label' => __( 'Home', 'zakra' ),
		'url'   => home_url( '/' ),
	),
);

if ( ! empty( $is_theme_preview ) ) {
	foreach ( array( __( 'About', 'zakra' ), __( 'Shop', 'zakra' ), __( 'Blog', 'zakra' ), __( 'Contact', 'zakra' ) ) as $label ) {
		$quick_links[] = array(
			'label' => $label,
			'url'   => '#',
		);
	}
}

$footer_html_2 = sprintf(
	'<p style="font-weight:700;font-size:16px;color:#1A1A1A;margin:0 0 18px;">%1$s</p><ul style="list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:12px;font-size:14px;">%2$s</ul>',
	esc_html__( 'Quick Links', 'zakra' ),
	implode(
		'',
		array_map(
			static function ( $link ) {
				return sprintf( '<li><a href="%s" style="color:#888888;text-decoration:none;">%s</a></li>', esc_url( $link['url'] ), esc_html( $link['label'] ) );
			},
			$quick_links
		)
	)
);

$typography_defaults = array(
	'font-family' => 'inherit',
	'font-style'  => 'normal',
	'line-height' => array(
		'desktop' => array(
			'size' => '1.8',
			'unit' => '-',
		),
		'tablet'  => array(
			'size' => '',
			'unit' => '',
		),
		'mobile'  => array(
			'size' => '',
			'unit' => '',
		),
	),
);

return array(

	/*
	 * Header Builder layout: logo left, Primary Menu + Search + a decorative
	 * cart icon + a "Download" button on the right — matching the Agency 03
	 * header. Mobile/offset are left as the theme's own defaults, since those
	 * already wire up a real Toggle Button + off-canvas menu.
	 */
	'zakra_header_builder'                       => array(
		'desktop' => array(
			'top'    => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
			'main'   => array(
				'left'   => array( 'logo' ),
				'center' => array(),
				'right'  => array( 'primary-menu', 'search', 'html-1', 'button' ),
			),
			'bottom' => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
		),
		'mobile'  => array(
			'top'    => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
			'main'   => array(
				'left'   => array( 'logo' ),
				'center' => array(),
				'right'  => array( 'toggle-button' ),
			),
			'bottom' => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
		),
		'offset'  => array( 'mobile-menu' ),
	),

	// The bundled logo.png ( staged as a starter-content attachment under the
	// "logo" symbol, alongside this call — see get_chrome() ). Site Title text
	// is disabled so only the logo image shows, matching the demo exactly.
	'custom_logo'                                => '{{logo}}',
	'zakra_enable_site_identity'                 => false,

	// Decorative cart icon, positioned between Search and the Download button.
	'zakra_header_html_1'                        => $header_cart_icon,

	// Button 1 ("Download"), styled to match the demo's green CTA button.
	'zakra_header_button_text'                   => _x( 'Download', 'Theme starter content', 'zakra' ),
	'zakra_header_button_link'                   => '#',
	'zakra_header_button_color'                  => '#FFFFFF',
	'zakra_header_button_hover_color'            => '#FFFFFF',
	'zakra_header_button_background_color'       => '#118b57',
	'zakra_header_button_background_hover_color' => '#0e6e45',
	'zakra_header_button_padding'                => array(
		'top'    => '11',
		'right'  => '22',
		'bottom' => '11',
		'left'   => '22',
		'unit'   => 'px',
	),
	'zakra_header_button_border_radius'          => array(
		'size'  => '4',
		'units' => 'px',
	),
	'zakra_header_button_typography'             => array_merge(
		$typography_defaults,
		array(
			'font-weight'    => '600',
			'text-transform' => 'uppercase',
			'font-size'      => array(
				'desktop' => array(
					'size' => '12',
					'unit' => 'px',
				),
				'tablet'  => array(
					'size' => '',
					'unit' => '',
				),
				'mobile'  => array(
					'size' => '',
					'unit' => '',
				),
			),
		)
	),

	// Primary Menu styling to match the demo's nav text.
	'zakra_header_main_menu_color'              => '#2B2B2B',
	'zakra_header_main_menu_hover_color'        => '#118b57',
	'zakra_header_main_menu_typography'         => array_merge(
		$typography_defaults,
		array(
			'font-weight'    => '500',
			'text-transform' => 'none',
			'font-size'      => array(
				'desktop' => array(
					'size' => '15',
					'unit' => 'px',
				),
				'tablet'  => array(
					'size' => '',
					'unit' => '',
				),
				'mobile'  => array(
					'size' => '',
					'unit' => '',
				),
			),
		)
	),

	/*
	 * Footer Builder layout: logo/description, Quick Links, Latest Posts,
	 * Contact Info, and Copyright — matching the Agency 03 footer's columns.
	 */
	'zakra_footer_builder'                       => array(
		'desktop' => array(
			'top'    => array(
				'top-1' => array(),
				'top-2' => array(),
				'top-3' => array(),
				'top-4' => array(),
				'top-5' => array(),
				'top-6' => array(),
			),
			'main'   => array(
				'main-1' => array( 'html-1' ),
				'main-2' => array( 'html-2' ),
				'main-3' => array( 'widget-3' ),
				'main-4' => array( 'widget-4' ),
				'main-5' => array(),
				'main-6' => array(),
			),
			'bottom' => array(
				'bottom-1' => array( 'copyright' ),
				'bottom-2' => array(),
				'bottom-3' => array(),
				'bottom-4' => array(),
				'bottom-5' => array(),
				'bottom-6' => array(),
			),
		),
	),

	/*
	 * The Main/Bottom row background & text colors default to the theme's
	 * own dark footer style, which would swallow the demo's light-on-white
	 * look ( and the widgets' own unstyled text ) — override both explicitly.
	 */
	'zakra_footer_main_area_background'          => array(
		'background-color'      => '#FFFFFF',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'contain',
		'background-attachment' => 'scroll',
	),
	'zakra_footer_main_area_color'               => '#888888',
	'zakra_footer_main_area_link_color'          => '#1A1A1A',
	'zakra_footer_main_area_link_hover_color'    => '#118b57',
	'zakra_footer_main_area_border_width'        => array(
		'top'    => '1',
		'right'  => '0',
		'bottom' => '0',
		'left'   => '0',
		'unit'   => 'px',
	),
	'zakra_footer_main_area_border_color'        => '#ECECEC',
	'zakra_footer_widgets_title_color'           => '#1A1A1A',
	'zakra_footer_bottom_area_background'        => array(
		'background-color'      => '#FFFFFF',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'contain',
		'background-attachment' => 'scroll',
	),
	'zakra_footer_bottom_area_color'             => '#999999',

	// HTML 1: logo + description. HTML 2: Quick Links (placeholder links,
	// same as the rest of the starter content — meant to be edited).
	'zakra_footer_html_1'                        => $footer_html_1,
	'zakra_footer_html_2'                        => $footer_html_2,
);
