<?php
/**
 * Site navigation template file.
 *
 * @package zakra
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Fall back to the Primary Menu when no menu is assigned to the Mobile
// Menu location, instead of letting `wp_nav_menu()` dump every page on
// the site into the off-canvas panel (see ZAK-278/280).
$zakra_mobile_menu_location = has_nav_menu( 'menu-mobile' ) ? 'menu-mobile' : 'menu-primary';

wp_nav_menu(
	array(
		'theme_location' => $zakra_mobile_menu_location,
		'menu_id'        => 'zak-mobile-menu',
		'menu_class'     => 'zak-mobile-menu',
		'container'      => '',
		'fallback_cb'    => false,
	)
);
