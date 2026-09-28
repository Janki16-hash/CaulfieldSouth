<?php
/**
 * The template for search form.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zakra
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$product_search = get_theme_mod( 'zakra_enable_product_search_search', false );
?>

<div class="zak-search-container">
<form role="search" method="get" class="zak-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="zak-search-field-label">
		<button type="submit" class="zak-icon--search" aria-label="<?php echo esc_attr_x( 'Search', 'submit button', 'zakra' ); ?>">

			<?php zakra_get_icon( 'magnifying-glass' ); ?>

		</button>

		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'zakra' ); ?></span>

		<input type="search"
				class="zak-search-field"
				placeholder="<?php echo esc_attr_x( 'Type & hit Enter &hellip;', 'placeholder', 'zakra' ); ?>"
				value="<?php echo esc_attr( get_search_query() ); ?>"
				name="s"
				title="<?php echo esc_attr_x( 'Search for:', 'label', 'zakra' ); ?>"
		>
	</label>

	<?php if ( $product_search ) : ?>
	<input type="hidden" name="post_type" value="product" />
	<?php endif; ?>
</form>
<button class="zak-icon--close" role="button" aria-label="<?php esc_attr_e( 'Close', 'zakra' ); ?>">
</button>
</div>
