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
            'posts_per_page' => 4,
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
                        $icon = get_post_meta(get_the_ID(), 'icon_image', true);

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
