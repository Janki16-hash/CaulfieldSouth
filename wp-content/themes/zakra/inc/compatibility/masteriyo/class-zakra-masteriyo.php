<?php
/**
 * Masteriyo Compatibility.
 *
 * @package zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_Masteriyo' ) ) {

	/**
	 * Class Zakra_Masteriyo
	 */
	class Zakra_Masteriyo {

		/**
		 * Zakra_Masteriyo constructor.
		 */
		public function __construct() {

			add_action( 'masteriyo_before_single_course', array( $this, 'wrapper_before' ) );
			add_action( 'masteriyo_after_single_course', array( $this, 'wrapper_after' ) );
		}

		/**
		 * Before Content.
		 *
		 * Masteriyo's single-course.php renders its own markup directly inside
		 * the theme's #zak-content row, without ever passing through the
		 * `<main id="zak-primary">` wrapper that page.php/single.php provide —
		 * so the Container Layout and Sidebar Layout Customizer controls have
		 * no element to act on for course pages. `masteriyo_before_single_course`
		 * is the earliest hook Masteriyo exposes around its own content, so
		 * open the same wrapper here that every other template opens directly.
		 *
		 * @return void
		 */
		public function wrapper_before() {
			?>
			<main id="zak-primary" class="zak-primary">
			<?php
		}

		/**
		 * After Content.
		 *
		 * Closes the wrapper opened above and renders the sidebar. Unlike
		 * WooCommerce (which exposes its own `woocommerce_sidebar` hook that
		 * calls `get_sidebar()` from inside its templates), Masteriyo's single
		 * course template has no equivalent — so the sidebar is rendered
		 * directly here instead, matching where page.php calls get_sidebar()
		 * immediately after closing </main>.
		 *
		 * @return void
		 */
		public function wrapper_after() {
			?>
			</main><!-- /.zak-primary -->
			<?php
			get_sidebar();
		}
	}

	new Zakra_Masteriyo();
}
