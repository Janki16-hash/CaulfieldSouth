<?php
/**
 * Template for 404
 *
 * @package     Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

$astra_404_subtitle_tag = true === astra_check_is_structural_setup() ? 'h3' : 'div';

?>
<div <?php echo wp_kses_post( astra_attr( '404_page', array( 'class' => 'ast-404-layout-1' ) ) ); ?> >
	<img src="http://139.59.85.161/~caulfieldsouthde/wp-content/themes/caulfield/assets/svg/404.svg" alt="">


	<?php astra_the_title( '<header class="page-header"><h1 class="page-title">', '</h1></header><!-- .page-header -->' ); ?>

	<div class="page-content">

		<<?php echo esc_attr( $astra_404_subtitle_tag ); ?> class="page-sub-title">
			<?php echo esc_html( astra_default_strings( 'string-404-sub-title', false ) ); ?>
		</<?php echo esc_attr( $astra_404_subtitle_tag ); ?>>

		<div class="ast-404-search">
			<?php the_widget( 'WP_Widget_Search' ); ?>
		</div>

	</div><!-- .page-content -->
</div>


<section class="error-404 not-found">
	<div class="ast-404-layout-1">
		<header class="page-header"><h1 class="page-title">Oops! Page Not Found</h1></header><!-- .page-header -->
		<div class="page-content">
			<p>We’re sorry, the page you requested could not be found. Please go back to the homepage.</p>
		</div><!-- .page-content -->
	</div>
</section>