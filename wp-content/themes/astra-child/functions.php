<?php 

// custom posttype files
require_once get_stylesheet_directory() . '/posttypes.php';
require_once get_stylesheet_directory() . '/shortcode.php';
/**
 * Display page banner automatically.
 */
// function mytheme_page_banner() {

//     if (is_front_page() || is_home()) {
//         return;
//     }

//     echo '<div class="common-page-banner">';
//     echo do_shortcode('[page_banner]');
//     echo '</div>';
// }

// add_action('astra_primary_content_top', 'mytheme_page_banner');
function mytheme_page_banner() {

    if (is_front_page() || is_home()) {
        return;
    }

    if (!is_singular()) {
        return;
    }

    echo do_shortcode('[page_banner]');

}
add_action('astra_primary_content_top', 'mytheme_page_banner');
// add_action(
//     'astra_entry_content_before',
//     'mytheme_page_banner'
// );