<?php
/**
 * Zakra content area functions to be hooked.
 *
 * @package zakra
 */

if ( ! function_exists( 'zakra_post_readmore' ) ) :

	/**
	 * Post read more HTML.
	 *
	 * @param string $readmore_alignment CSS class.
	 */
	function zakra_post_readmore( $readmore_alignment ) {
		?>
		<div class="<?php zakra_css_class( 'zakra_read_more_wrapper_class' ); ?> zak-<?php echo esc_attr( $readmore_alignment ); ?>">

			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="entry-button">

				<?php echo esc_html( apply_filters( 'zakra_read_more_text', esc_html__( 'Read More', 'zakra' ) ) ); ?>
				<?php zakra_get_icon( 'arrow-right-long' ); ?>

			</a>
		</div> <!-- /.zak-entry-footer -->
		<?php
	}
endif;

if ( ! function_exists( 'zakra_repair_active_plugins_option' ) ) :

	/**
	 * Guard against a corrupted `active_plugins` option crashing plugin
	 * activation from the starter-templates screen (ZAK-334).
	 *
	 * `activate_plugin()` (wp-admin/includes/plugin.php) does
	 * `in_array( $plugin, get_option( 'active_plugins', array() ) )` - the
	 * `array()` there is only a fallback for when the option row is entirely
	 * missing; if the row exists but its stored value isn't a valid
	 * serialized array (seen on at least one host, reported as a plain
	 * string), `get_option()` returns that raw value as-is and `in_array()`
	 * throws an uncaught `TypeError`, taking down the whole REST response as
	 * a fatal 500 instead of just failing to activate.
	 *
	 * WordPress already guards against exactly this with
	 * `validate_active_plugins()`, which resets the option back to `array()`
	 * when it isn't one - but that's only ever called from
	 * `wp-admin/plugins.php`. `is_admin()` (and so anything gated on it,
	 * including that admin page load) is false for REST API requests even
	 * when the calling JS runs inside wp-admin, and the "Activate ThemeGrill
	 * Demo Importer Plugin" button activates the plugin via a direct REST
	 * API call (`wp/v2/plugins`), not a `wp-admin/plugins.php` page load -
	 * so that repair never gets a chance to run before `activate_plugin()`
	 * does. Repeating it here, scoped to just the plugin-management REST
	 * routes and run before they dispatch, closes that gap without touching
	 * the option on every unrelated REST request.
	 *
	 * `rest_pre_dispatch` fires before route matching and so before any
	 * `permission_callback` - this filter would otherwise run for a fully
	 * unauthenticated request too, so it checks `activate_plugins` itself
	 * rather than relying on the route's own (not-yet-run) permission check.
	 *
	 * @param mixed           $result  Response to replace the requested version with. Untouched here.
	 * @param WP_REST_Server  $server  Server instance.
	 * @param WP_REST_Request $request Request used to generate the response.
	 * @return mixed Unmodified $result - this only repairs option state as a side effect.
	 */
	function zakra_repair_active_plugins_option( $result, $server, $request ) {
		if ( ! str_starts_with( $request->get_route(), '/wp/v2/plugins' ) ) {
			return $result;
		}

		if ( ! current_user_can( 'activate_plugins' ) ) {
			return $result;
		}

		if ( ! is_array( get_option( 'active_plugins', array() ) ) ) {
			update_option( 'active_plugins', array() );
		}

		return $result;
	}
endif;

if ( ! function_exists( 'zakra_get_sidebar' ) ) {

	function zakra_get_sidebar( $sidebar ) {

		$current_layout = zakra_get_current_layout();

		preg_match( '/zak-site-layout--(no_sidebar|left|right|both)/', $current_layout, $m_sidebar );
		$current_layout = $m_sidebar[0] ?? '';

		$sidebar_meta              = get_post_meta( zakra_get_post_id(), 'zakra_page_sidebar_layout', true );
		$single_page_layout        = get_theme_mod( 'zakra_single_page_sidebar_layout', 'default' );
		$single_post_layout        = get_theme_mod( 'zakra_single_post_sidebar_layout', 'default' );
		$blog_layout               = get_theme_mod( 'zakra_blog_sidebar_layout', 'default' );
		$global_sidebar_layout     = get_theme_mod( 'zakra_global_sidebar_layout', 'default' );
		$customizer_sidebar_layout = '';

		if ( 'customizer' === $sidebar_meta || 'default' === $sidebar_meta || empty( $sidebar_meta ) ) {
			if ( is_singular( 'page' ) || is_404() ) {
				if ( 'default' === $single_page_layout ) {
					$customizer_sidebar_layout = $global_sidebar_layout;
				} else {
					$customizer_sidebar_layout = $single_page_layout;
				}
			} elseif ( is_singular() ) {
				if ( 'default' === $single_post_layout ) {
					$customizer_sidebar_layout = $global_sidebar_layout;
				} else {
					$customizer_sidebar_layout = $single_post_layout;
				}
			} elseif ( is_archive() || is_home() ) {
				if ( 'default' === $blog_layout ) {
					$customizer_sidebar_layout = $global_sidebar_layout;
				} else {
					$customizer_sidebar_layout = $blog_layout;
				}
			}

			if ( 'right' === $customizer_sidebar_layout ) {
				$sidebar = 'sidebar-right';
			} elseif ( 'left' === $customizer_sidebar_layout || 'zak-site-layout--left' === $current_layout ) {
				$sidebar = 'sidebar-left';
			} elseif ( 'no_sidebar' === $customizer_sidebar_layout ) {
				$sidebar = 'sidebar-none';
			}
			return $sidebar;

		} else {
			$sidebar = '';
			if ( 'right' === $sidebar_meta ) {
				$sidebar = 'sidebar-right';
			} elseif ( 'left' === $sidebar_meta || 'zak-site-layout--left' === $current_layout ) {
				$sidebar = 'sidebar-left';
			} elseif ( 'no_sidebar' === $sidebar_meta ) {
				$sidebar = 'sidebar-none';
			}
			return $sidebar;
		}
	}
}

if ( ! function_exists( 'zakra_set_posts_per_page' ) ) {

	function zakra_set_posts_per_page( $query ) {

		if ( $query->is_search() && ! is_admin() ) {
			$posts_per_page = get_theme_mod( 'zakra_search_results_posts_per_page', array( 'size' => 10 ) );
			if ( is_array( $posts_per_page ) && isset( $posts_per_page['size'] ) ) {
				$query->set( 'posts_per_page', $posts_per_page['size'] );
			} else {
				$query->set( 'posts_per_page', 10 );
			}
		}
	}
}
