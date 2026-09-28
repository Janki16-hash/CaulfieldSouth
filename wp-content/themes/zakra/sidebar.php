<?php
/**
 * The sidebar containing the main widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sidebar = apply_filters( 'zakra_get_sidebar', 'sidebar-right' );

/*
 * Skip rendering the sidebar server-side whenever it will end up hidden via
 * CSS anyway. `zakra_get_current_sidebar_layout()` only ever returns the
 * sidebar-specific class (no_sidebar|left|right|both, see its regex), so
 * checking it alone can never catch the Container Layout being Narrow
 * (`zak-site-layout--centered`) or Stretched (`zak-site-layout--stretched`)
 * — both of which force `.zak-secondary { display: none; }` regardless of
 * the Sidebar Layout setting. Check the full current layout for those two
 * container states instead of relying on the sidebar-only getter for them.
 */
$current_layout = zakra_get_current_layout();

if (
	'zak-site-layout--no_sidebar' === zakra_get_current_sidebar_layout() ||
	str_contains( $current_layout, 'zak-site-layout--centered' ) ||
	str_contains( $current_layout, 'zak-site-layout--stretched' )
) {
	return '';
}
?>

<aside id="zak-secondary" class="zak-secondary <?php zakra_sidebar_class(); ?>">
		<?php
		/*
		 * Hook - zakra_sidebar_before.
		 *
		 * @hooked zakra_sidebar_before_action - 10
		 */
		do_action( 'zakra_sidebar_before' );

		if ( is_active_sidebar( $sidebar ) ) {
			dynamic_sidebar( $sidebar );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<section class="widget">
				<h2 class="widget-title"><?php echo esc_html( zakra_get_sidebar_name_by_id( $sidebar ) ); ?></h2>
				<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Click here to add widgets for this area', 'zakra' ); ?></a>
			</section>
			<?php
		} else {

			the_widget(
				'WP_Widget_Text',
				array(
					'title'  => esc_html__( 'Example Widget', 'zakra' ),
					'text'   => sprintf(
					/* Translators: 1. Label for Contact Page or Right sidebar area, 2. Opening of the link for widgets.php WordPress section, 3. Closing of the link for widgets.php WordPress section */
						esc_html__( 'This is an example widget to show how the %1$s Sidebar looks by default. You can add custom widgets from the %2$swidgets screen%3$s in the admin. If custom widgets are added, then they will replace this.', 'zakra' ),
						current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '',
						current_user_can( 'edit_theme_options' ) ? '</a>' : '',
						esc_html__( 'Example Widget', 'zakra' )
					),
					'filter' => true,
				),
				array(
					'before_widget' => '<aside class="widget widget_text">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="zak-widget-title"><span>',
					'after_title'   => '</span></h3>',
				)
			);

		}

		/*
		 * Hook - zakra_sidebar_after.
		 *
		 * @hooked zakra_sidebar_after_action - 10
		 */
		do_action( 'zakra_sidebar_after' );

		?>

</aside><!-- .zak-secondary -->
