<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

	<main id="zak-primary" class="zak-primary">
		<?php echo apply_filters( 'zakra_after_primary_start_filter', false ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted extension point; only site-installed code can hook this filter, never visitor input. ?>

		<?php
		/**
		 * Hook for post listing content.
		 *
		 * @hooked zakra_content_loop - 10
		 */
		do_action( 'zakra_content' );
		?>

		<?php echo apply_filters( 'zakra_after_primary_end_filter', false ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted extension point; only site-installed code can hook this filter, never visitor input. ?>
	</main> <!-- /.zak-primary -->

<?php
get_sidebar();
get_footer();
