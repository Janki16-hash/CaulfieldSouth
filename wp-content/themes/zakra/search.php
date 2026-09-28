<?php
/**
 * The template for displaying search results pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package zakra
 */

get_header();
?>

	<main id="zak-primary" class="zak-primary">
		<?php echo apply_filters( 'zakra_after_primary_start_filter', false ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted extension point; only site-installed code can hook this filter, never visitor input. ?>

		<?php
		/**
		 * Hook for search content.
		 *
		 * @hooked zakra_content_loop - 10
		 */
		do_action( 'zakra_content_search' );
		?>

		<?php echo apply_filters( 'zakra_after_primary_end_filter', false ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted extension point; only site-installed code can hook this filter, never visitor input. ?>
	</main> <!-- /.zak-primary -->

<?php
get_sidebar();
get_footer();
