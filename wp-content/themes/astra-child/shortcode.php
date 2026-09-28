<?php 
/**
 * Services Shortcode
 *
 * Usage:
 * [services]
 *
 * Optional:
 * [services posts_per_page="6"]
 */

function services_shortcode($atts) {

    $atts = shortcode_atts(
        array(
            'posts_per_page' => -1,
        ),
        $atts,
        'services'
    );

    $query = new WP_Query(array(
        'post_type'      => 'services',
        'post_status'    => 'publish',
        'posts_per_page' => intval($atts['posts_per_page']),
        'orderby'        => 'date',
        'order'          => 'ASC',
    ));

    ob_start();

    if ($query->have_posts()) : ?>

        <div class="services-grid">

            <?php while ($query->have_posts()) : $query->the_post(); ?>

                <div class="service-item">

                    <?php
                    /*
                     * Featured Image
                     */
                    if (has_post_thumbnail()) :

                        $image_id  = get_post_thumbnail_id(get_the_ID());
                        $image_url = wp_get_attachment_image_url($image_id, 'large');
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                        /*
                         * Icon Image from Post Meta
                         *
                         * Change 'icon_image' to your actual
                         * custom field/meta key.
                         */
                        $icon = get_post_meta(get_the_ID(), 'logo', true);

                        // Support both attachment ID and image URL
                        $icon_url = '';

                        if (is_numeric($icon)) {
                            $icon_url = wp_get_attachment_image_url(intval($icon), 'thumbnail');
                        } elseif (!empty($icon)) {
                            $icon_url = $icon;
                        }else{
                            $icon_url = 'http://localhost/CaulfieldSouth/wp-content/uploads/2026/08/Whitening-Icon.png';
                        }
                    ?>

                        <div class="service-image">

                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <img
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($image_alt ?: get_the_title()); ?>"
                                    loading="lazy"
                                >
                            </a>

                            <?php if (!empty($icon_url)) : ?>
                                <div class="service-icon">
                                    <img
                                        src="<?php echo esc_url($icon_url); ?>"
                                        alt=""
                                        loading="lazy"
                                    >
                                </div>
                            <?php endif; ?>

                        </div>

                    <?php endif; ?>


                    <div class="service-content">
                        <h3 class="service-title">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <a
                            class="service-read-more"
                            href="<?php echo esc_url(get_permalink()); ?>"
                        >
                            Read More
                        </a>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    <?php else : ?>

        <p>No services found.</p>

    <?php endif;

    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('services', 'services_shortcode');




// Shortcode: [recent_blogs]

function recent_blogs_shortcode() {

    $query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 2,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC'
    ));

    if (!$query->have_posts()) {
        return '<p>No blogs found.</p>';
    }

    ob_start();
    ?>

    <section class="recent-blogs">
      

        <?php while ($query->have_posts()) : $query->the_post(); ?>

            <article class="recent-blog-item">

                <div class="recent-blog-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } else {
                            echo '<div class="no-image"></div>';
                        }
                        ?>
                    </a>
                </div>

                <div class="recent-blog-content">

                    <div class="recent-blog-date">
                        <?php echo get_the_date('j F, Y'); ?>
                    </div>

                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
                    </p>

                 

                </div>

            </article>

        <?php endwhile; ?>

    </section>
    <?php

    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('recent_blogs', 'recent_blogs_shortcode');



/**
 * Common Breadcrumb
 *
 */
function common_breadcrumb() {

    $items = [];

    /*
     * Home
     */
    $items[] = [
        'title' => 'Home',
        'url'   => home_url('/')
    ];

    /*
     * Front Page / Blog Home
     */
    if (is_front_page() || is_home()) {

        echo '<nav class="breadcrumb" aria-label="Breadcrumb">';
        echo '<span class="breadcrumb-current">Home</span>';
        echo '</nav>';

        return;
    }

    /*
     * Normal WordPress Page
     *
     * Example:
     * Home > Contact Us
     *
     * OR:
     * Home > About Us > Our Team
     */
    if (is_page()) {

        $page_id = get_the_ID();
        // print_r($page_id);

        // Get parent pages
        $ancestors = get_post_ancestors($page_id);

        if (!empty($ancestors)) {

            // Show parent from oldest to newest
            $ancestors = array_reverse($ancestors);

            foreach ($ancestors as $ancestor_id) {

                $items[] = [
                    'title' => get_the_title($ancestor_id),
                    'url'   => get_permalink($ancestor_id)
                ];
            }
        }

        // Current page
        $items[] = [
            'title' => get_the_title($page_id),
            'url'   => ''
        ];
    }

    /*
     * Normal WordPress Post
     *
     * Example:
     * Home > Blog > My Post
     */
    elseif (is_singular('post')) {

        $blog_page_id = get_option('page_for_posts');

        if ($blog_page_id) {

            $items[] = [
                'title' => get_the_title($blog_page_id),
                'url'   => get_permalink($blog_page_id)
            ];
        }

        // Current post
        $items[] = [
            'title' => get_the_title(),
            'url'   => ''
        ];
    }

    /*
     * Custom Post Type
     *
     * Example:
     * Home > Projects > Project Name
     */
    elseif (is_singular()) {

        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);

        if ($post_type_obj) {

            $listing_page = false;
            $listing_title = '';

            /*
            * 1. Check CPT rewrite slug
            */
            if (
                isset($post_type_obj->rewrite['slug']) &&
                !empty($post_type_obj->rewrite['slug'])
            ) {

                $rewrite_slug = trim(
                    $post_type_obj->rewrite['slug'],
                    '/'
                );

                /*
                * Use rewrite slug as breadcrumb title
                *
                * Example:
                * our-services
                * becomes:
                * Our Services
                */
                $listing_title = ucwords(
                    str_replace(
                        ['-', '_'],
                        ' ',
                        basename($rewrite_slug)
                    )
                );

                /*
                * Try to find a WordPress page
                * with this slug.
                */
                $listing_page = get_page_by_path($rewrite_slug);
            }

            /*
            * 2. If no rewrite slug,
            *    use CPT name/label.
            */
            if (empty($listing_title)) {

                $listing_title = $post_type_obj->labels->name;

                /*
                * Try CPT slug as a page.
                */
                $listing_page = get_page_by_path($post_type_obj->name);
            }

            /*
            * 3. Add listing breadcrumb
            */
            if ($listing_page) {

                $items[] = [
                    'title' => $listing_title,
                    'url'   => get_permalink($listing_page)
                ];

            } else {

                /*
                * Page doesn't exist.
                * Show title but don't add link.
                */
                $items[] = [
                    'title' => $listing_title,
                    'url'   => ''
                ];
            }
        }

        /*
        * 4. Current custom post
        */
        $items[] = [
            'title' => get_the_title(),
            'url'   => ''
        ];
    }

    /*
     * Archive
     */
    elseif (is_archive()) {

        $items[] = [
            'title' => get_the_archive_title(),
            'url'   => ''
        ];
    }

    /*
     * Search
     */
    elseif (is_search()) {

        $items[] = [
            'title' => 'Search',
            'url'   => ''
        ];
    }

    /*
     * 404
     */
    elseif (is_404()) {

        $items[] = [
            'title' => '404',
            'url'   => ''
        ];
    }

    /*
     * Output Breadcrumb
     */
    echo '<nav class="breadcrumb" aria-label="Breadcrumb">';

    $total = count($items);

    foreach ($items as $index => $item) {

        $is_current = ($index === $total - 1);

        /*
         * Current item = no link
         */
        if ($is_current || empty($item['url'])) {

            echo '<span class="breadcrumb-current">';
            echo esc_html($item['title']);
            echo '</span>';

        } else {

            /*
             * Parent/Home = clickable
             */
            echo '<a href="' . esc_url($item['url']) . '">';
            echo esc_html($item['title']);
            echo '</a>';
        }

        /*
         * Separator
         */
        if (!$is_current) {

            echo '<span class="breadcrumb-separator">';
            echo ' &gt; ';
            echo '</span>';
        }
    }

    echo '</nav>';
}
add_shortcode('common_breadcrumb', 'common_breadcrumb');
/**
 * Page Banner Shortcode
 *
 * Usage:
 * [page_banner]
 */
function page_banner_shortcode() {

    // if (!is_page()) {
    //     return '';
    // }

    $page_id = get_the_ID();

    // ACF banner image field
    $banner = get_field('banner_image', $page_id);
    $banner_preview = get_field('banner_preview', $page_id);
    
    if (isset($banner_preview) && !empty($banner_preview)){
    // Get image URL
        if (is_array($banner)) {
            $banner_url = $banner['url'];
            $banner_alt = $banner['alt'] ?? get_the_title($page_id);
        } elseif (is_numeric($banner)) {
            $banner_url = wp_get_attachment_image_url($banner, 'full');
            $banner_alt = get_post_meta($banner, '_wp_attachment_image_alt', true);
        } else {
            $banner_url = $banner;
            $banner_alt = get_the_title($page_id);
        }

        // Fallback image
        if (empty($banner_url)) {
            $banner_url = get_template_directory_uri() . '/assets/images/default-banner.jpg';
        }

        ob_start();?>

        <section class="page-banner"
            style="background-image: url('<?php echo esc_url($banner_url); ?>');">

            <div class="page-banner-overlay">

                <div class="container">

                    <h1 class="page-banner-title">
                        <?php echo esc_html(get_the_title($page_id)); ?>
                    </h1>

                    <div class="page-banner-breadcrumb">
                        <?php common_breadcrumb(); ?>
                    </div>

                </div>

            </div>

        </section>

        <?php
    }
    return ob_get_clean();
}

add_shortcode('page_banner', 'page_banner_shortcode');
function google_review_summary_shortcode() {
    return '
    <div id="my-google-rating">
        <span class="my-stars">★★★★★</span>
        <strong class="my-rating">Loading...</strong>
        <span class="my-reviews"></span>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        function getTrustindexRating() {
            const text = document.body.innerText;

            const rating = text.match(/\\b([1-5](?:\\.\\d)?)\\s*(?:\\/\\s*5)?\\b/);
            const reviews = text.match(/([\\d,]+)\\s*(?:Google\\s*)?reviews?/i);

            if (rating) {
                document.querySelector("#my-google-rating .my-rating").textContent =
                    rating[1];
            }

            if (reviews) {
                document.querySelector("#my-google-rating .my-reviews").textContent =
                    "(" + reviews[1] + " reviews)";
            }
        }

        getTrustindexRating();
    });
    </script>';
}

add_shortcode("google_review_summary", "google_review_summary_shortcode");
function google_rating_from_map() {
    return '<div id="google-rating">Loading...</div>
    <script>
    (async () => {
        const iframe = document.querySelector(".elementor-custom-embed iframe");
        if (!iframe) return;

        const address = iframe.title || new URL(iframe.src).searchParams.get("q");
        if (!address) return;

        const r = await fetch("/wp-json/google-rating/v1/get?address=" + encodeURIComponent(address));
        const data = await r.json();

        if (data.rating) {
            document.getElementById("google-rating").innerHTML =
                "★★★★★ " + data.rating + " (" + data.reviewCount + " reviews)";
        }
    })();
    </script>';
}

add_shortcode('google_rating', 'google_rating_from_map');
// add_shortcode('google_review_summary', function () {
//     return '<span id="google-review-summary">12 Reviews | 4.9</span>
//     <script>
//     document.addEventListener("DOMContentLoaded", function () {
//         const find = setInterval(function () {
//             const text = document.body.innerText;
//             const reviews = text.match(/(\d+)\s*Reviews?/i);
//             const rating = text.match(/([0-5](?:\.[0-9])?)\s*(?:\/\s*5)?/);

//             if (reviews && rating) {
//                 document.getElementById("google-review-summary").textContent =
//                     reviews[1] + " Reviews | " + rating[1];
//                 clearInterval(find);
//             }
//         }, 500);

//         setTimeout(() => clearInterval(find), 10000);
//     });
//     </script>';
// });