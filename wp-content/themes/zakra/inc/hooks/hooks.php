<?php

/**
 * Search content.
 *
 * @see zakra_search_content()
 */
add_action( 'zakra_action_search_content', 'zakra_entry_content', 10 );


/**
 * Post read more.
 *
 * @see zakra_entry_content()
 */
add_action( 'zakra_post_readmore', 'zakra_post_readmore', 10 );

/**
 * Get sidebar based on the layout.
 *
 * @see zakra_get_sidebar()
 */
add_filter( 'zakra_get_sidebar', 'zakra_get_sidebar', 10 );

/**
 * Set posts per page for search results.
 *
 * @see zakra_set_posts_per_page()
 */

add_action( 'pre_get_posts', 'zakra_set_posts_per_page', 10 );

/**
 * Repair a corrupted `active_plugins` option before the plugin-management
 * REST routes run, so activating a plugin from the starter-templates screen
 * can't fatal-error (ZAK-334).
 *
 * @see zakra_repair_active_plugins_option()
 */
add_filter( 'rest_pre_dispatch', 'zakra_repair_active_plugins_option', 5, 3 );
