<?php
/**
 * Header media hooks.
 *
 * @package zakra
 *
 * TODO: @since
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/* ------------------------------ Header Media ------------------------------ */

if ( ! function_exists( 'zakra_header_media_markup' ) ) :

	/**
	 * Header media tag.
	 */
	function zakra_header_media_markup() {

		the_custom_header_markup();

		zakra_header_media_mobile_image_markup();
	}
endif;

add_action( 'zakra_action_after_header', 'zakra_header_media_markup', 20 );

if ( ! function_exists( 'zakra_header_media_mobile_image_markup' ) ) :

	/**
	 * Prints the optional mobile-only replacement for the Header Image/Video.
	 *
	 * Deliberately called from inside `zakra_header_media_markup()` (rather
	 * than hooked on its own) so it automatically follows the same
	 * position/visibility handling Zakra Pro already applies to that
	 * function as a whole (ZAK-195).
	 */
	function zakra_header_media_mobile_image_markup() {

		if ( ! has_header_image() && ! has_header_video() ) {
			return;
		}

		$mobile_image_id = get_theme_mod( 'zakra_header_media_mobile_image', '' );

		if ( empty( $mobile_image_id ) ) {
			return;
		}

		// The control stores the attachment ID, not the URL.
		$mobile_image_url = wp_get_attachment_image_url( $mobile_image_id, 'full' );

		if ( empty( $mobile_image_url ) ) {
			return;
		}
		?>
		<div class="zak-header-media-mobile">
			<img src="<?php echo esc_url( $mobile_image_url ); ?>" class="zak-header-media-mobile-image" alt="<?php esc_attr_e( 'Mobile Header Image', 'zakra' ); ?>" />
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'zakra_header_media_mobile_image_body_class' ) ) :

	/**
	 * Adds a body class when a mobile Header Media image is set, so the
	 * mobile-breakpoint CSS that swaps it in only hides the desktop
	 * Header Image/Video when there's actually a replacement to show
	 * (ZAK-195).
	 *
	 * @param array $classes Body classes.
	 * @return array
	 */
	function zakra_header_media_mobile_image_body_class( $classes ) {

		if ( ! empty( get_theme_mod( 'zakra_header_media_mobile_image', '' ) ) ) {
			$classes[] = 'has-header-media-mobile-image';
		}

		return $classes;
	}
endif;

add_filter( 'body_class', 'zakra_header_media_mobile_image_body_class' );
