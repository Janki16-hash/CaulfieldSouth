<?php
$container_layout_choices = apply_filters(
	'zakra_container_layout_choices',
	array(
		'default'   => array(
			'label' => 'Inherit',
			'url'   => ZAKRA_PARENT_INC_ICON_URI . '/inherit.svg',
		),
		'contained' => array(
			'label' => 'Normal',
			'url'   => ZAKRA_PARENT_INC_ICON_URI . '/normal.svg',
		),
		'centered'  => array(
			'label' => 'Narrow',
			'url'   => ZAKRA_PARENT_INC_ICON_URI . '/narrow.svg',
		),
		'stretched' => array(
			'label' => 'Full Width',
			'url'   => ZAKRA_PARENT_INC_ICON_URI . '/full-width.svg',
		),
	)
);

$sidebar_layout_choices = apply_filters(
	'zakra_sidebar_layout_choices',
	array(
		'default'    => array(
			'label' => 'Inherit',
			'url'   => ZAKRA_PARENT_INC_ICON_URI . '/inherit.svg',
		),
		'no_sidebar' => array(
			'label' => 'No Sidebar',
			'url'   => ZAKRA_PARENT_INC_ICON_URI . '/no-sidebar.svg',
		),
		'right'      => array(
			'label' => 'Right Sidebar',
			'url'   => ZAKRA_PARENT_INC_ICON_URI . '/right-sidebar.svg',
		),
		'left'       => array(
			'label' => 'Left Sidebar',
			'url'   => ZAKRA_PARENT_INC_ICON_URI . '/left-sidebar.svg',
		),
	)
);

$options = apply_filters(
	'zakra_blog_options',
	array(
		'zakra_blog_container_tab_group'             => array(
			'type'    => 'customind-tabs',
			'title'   => esc_html__( 'Blog', 'zakra' ),
			'section' => 'zakra_blog',
			'tabs'    => array(
				'general' => esc_html__( 'General', 'zakra' ),
				'style'   => esc_html__( 'Style', 'zakra' ),
			),
			'default' => 'general',
		),
		'zakra_blog_container_layout'                => array(
			'default'   => 'default',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Container Layout', 'zakra' ),
			'section'   => 'zakra_blog',
			'tab_group' => 'zakra_blog_container_tab_group',
			'tab'       => 'general',
			'choices'   => $container_layout_choices,
			'columns'   => 2,
			'priority'  => 10,
		),
		'zakra_blog_sidebar_layout_divider'          => array(
			'type'       => 'customind-divider',
			'variant'    => 'dashed',
			'tab_group'  => 'zakra_blog_container_tab_group',
			'tab'        => 'general',
			'section'    => 'zakra_blog',
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_blog_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_blog_container_layout',
								'operator' => '===',
								'value'    => 'default',
							),
							array(
								'id'       => 'zakra_global_container_layout',
								'operator' => '===',
								'value'    => 'contained',
							),
						),
					),
				),
			),
		),
		'zakra_blog_sidebar_layout'                  => array(
			'default'    => 'default',
			'type'       => 'customind-radio-image',
			'title'      => esc_html__( 'Sidebar Layout', 'zakra' ),
			'section'    => 'zakra_blog',
			'tab_group'  => 'zakra_blog_container_tab_group',
			'tab'        => 'general',
			'choices'    => $sidebar_layout_choices,
			'columns'    => 2,
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_blog_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_blog_container_layout',
								'operator' => '===',
								'value'    => 'default',
							),
							array(
								'id'       => 'zakra_global_container_layout',
								'operator' => '===',
								'value'    => 'contained',
							),
						),
					),
				),
			),
		),
		'zakra_navigate_page_title_position_heading' => array(
			'type'      => 'customind-heading',
			'tab_group' => 'zakra_blog_container_tab_group',
			'title'     => esc_html__( 'Page Title', 'zakra' ),
			'section'   => 'zakra_blog',
			'tab'       => 'general',
			'priority'  => 15,
		),
		'zakra_navigate_page_title_position'         => array(
			'title'     => esc_html__( 'Page Title Position Navigation', 'zakra' ),
			'type'      => 'customind-navigation',
			'tab_group' => 'zakra_blog_container_tab_group',
			'section'   => 'zakra_blog',
			'to'        => 'zakra_page_header',
			'nav_type'  => 'section',
			'tab'       => 'general',
			'priority'  => 15,
		),
		'zakra_blog_post_date_type_heading'          => array(
			'type'      => 'customind-heading',
			'tab_group' => 'zakra_blog_container_tab_group',
			'title'     => esc_html__( 'Post Date Type', 'zakra' ),
			'section'   => 'zakra_blog',
			'tab'       => 'general',
			'priority'  => 15,
		),
		'zakra_blog_post_date_type'                  => array(
			'default'   => 'published-date',
			'type'      => 'customind-select',
			'tab_group' => 'zakra_blog_container_tab_group',
			'tab'       => 'general',
			'section'   => 'zakra_blog',
			'priority'  => 15,
			'choices'   => apply_filters(
				'zakra_blog_post_date_type_choices',
				array(
					'published-date' => esc_html__( 'Published Date', 'zakra' ),
					'modified-date'  => esc_html__( 'Modified Date', 'zakra' ),
				)
			),
		),
		'zakra_blog_post_elements_heading'           => array(
			'type'        => 'customind-heading',
			'tab_group'   => 'zakra_blog_container_tab_group',
			'title'       => esc_html__( 'Post Elements', 'zakra' ),
			'section'     => 'zakra_blog',
			'description' => esc_html__( 'Manage the post elements such as Post Format, Category, Title, Meta, Content, etc.', 'zakra' ),
			'tab'         => 'general',
			'priority'    => 15,
		),
		'zakra_blog_post_elements'                   => array(
			'type'      => 'customind-sortable',
			'section'   => 'zakra_blog',
			'tab_group' => 'zakra_blog_container_tab_group',
			'tab'       => 'general',
			'priority'  => 15,
			'choices'   => array(
				'featured_image' => esc_attr__( 'Featured Image', 'zakra' ),
				'title'          => esc_attr__( 'Title', 'zakra' ),
				'meta'           => esc_attr__( 'Meta Tags', 'zakra' ),
				'content'        => esc_attr__( 'Content', 'zakra' ),
			),
			'default'   => array(
				'featured_image',
				'title',
				'meta',
				'content',
			),
			'condition' => apply_filters( 'zakra_structure_archive_blog_order', false ),
		),
		'zakra_blog_meta_elements_heading'           => array(
			'type'        => 'customind-heading',
			'title'       => esc_html__( 'Post Meta', 'zakra' ),
			'tab_group'   => 'zakra_blog_container_tab_group',
			'section'     => 'zakra_blog',
			'priority'    => 15,
			'tab'         => 'general',
			'description' => esc_html__( 'Manage the post meta elements such as Categories, Author, Date, Comments, Tags, etc.', 'zakra' ),
		),
		'zakra_blog_meta_elements'                   => array(
			'type'      => 'customind-sortable',
			'tab_group' => 'zakra_blog_container_tab_group',
			'section'   => 'zakra_blog',
			'tab'       => 'general',
			'priority'  => 15,
			'choices'   => array(
				'comments'   => esc_attr__( 'Comments', 'zakra' ),
				'categories' => esc_attr__( 'Categories', 'zakra' ),
				'author'     => esc_attr__( 'Author', 'zakra' ),
				'date'       => esc_attr__( 'Date', 'zakra' ),
				'tags'       => esc_attr__( 'Tags', 'zakra' ),
			),
			'default'   => array(
				'author',
				'date',
				'categories',
				'tags',
				'comments',
			),
			'condition' => apply_filters( 'zakra_structure_archive_blog_order', false ),
		),
		'zakra_blog_post_element_heading'            => array(
			'type'      => 'customind-heading',
			'tab_group' => 'zakra_blog_container_tab_group',
			'tab'       => 'style',
			'title'     => esc_html__( 'Title', 'zakra' ),
			'section'   => 'zakra_blog',
			'priority'  => 14,
		),
		'zakra_blog_post_title_color_group'          => array(
			'type'         => 'customind-color-group',
			'title'        => esc_html__( 'Color', 'zakra' ),
			'section'      => 'zakra_blog',
			'tab'          => 'style',
			'priority'     => 15,
			'tab_group'    => 'zakra_blog_container_tab_group',
			'sub_controls' => apply_filters(
				'zakra_blog_post_title_color_sub_controls',
				array(
					'zakra_blog_post_title_color'       => array(
						'default'   => '',
						'type'      => 'customind-color',
						'title'     => esc_html__( 'Normal', 'zakra' ),
						'transport' => 'postMessage',
						'section'   => 'zakra_blog',
					),
					'zakra_blog_post_title_hover_color' => array(
						'default'   => '',
						'type'      => 'customind-color',
						'title'     => esc_html__( 'Hover', 'zakra' ),
						'transport' => 'postMessage',
						'section'   => 'zakra_blog',
					),
				)
			),
		),
		'zakra_blog_post_title_typography'           => array(
			'default'   => array(
				'font-family'    => 'inherit',
				'font-weight'    => '500',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => array(
						'size' => '2.25',
						'unit' => 'rem',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '',
						'unit' => '',
					),
				),
				'line-height'    => array(
					'desktop' => array(
						'size' => '1.3',
						'unit' => '-',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '',
						'unit' => '',
					),
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			),
			'type'      => 'customind-typography',
			'title'     => esc_html__( 'Typography', 'zakra' ),
			'transport' => 'postMessage',
			'section'   => 'zakra_blog',
			'tab'       => 'style',
			'tab_group' => 'zakra_blog_container_tab_group',
			'priority'  => 15,
		),
		'zakra_blog_excerpt_heading'                 => array(
			'type'      => 'customind-heading',
			'title'     => esc_html__( 'Excerpt', 'zakra' ),
			'section'   => 'zakra_blog',
			'priority'  => 15,
			'tab'       => 'general',
			'tab_group' => 'zakra_blog_container_tab_group',
		),
		'zakra_blog_excerpt_type'                    => array(
			'default'   => 'excerpt',
			'type'      => 'customind-radio',
			'title'     => esc_html__( 'Type', 'zakra' ),
			'section'   => 'zakra_blog',
			'tab'       => 'general',
			'priority'  => 15,
			'tab_group' => 'zakra_blog_container_tab_group',
			'choices'   => array(
				'excerpt' => esc_html__( 'Excerpt', 'zakra' ),
				'content' => esc_html__( 'Full Content', 'zakra' ),
			),
		),
		'zakra_blog_buttons_heading'                 => array(
			'type'      => 'customind-heading',
			'title'     => esc_html__( 'Button', 'zakra' ),
			'section'   => 'zakra_blog',
			'tab'       => 'general',
			'priority'  => 20,
			'tab_group' => 'zakra_blog_container_tab_group',
			'condition' => array(
				'zakra_blog_excerpt_type' => 'excerpt',
			),
		),
		'zakra_enable_blog_button'                   => array(
			'title'     => esc_html__( 'Enable', 'zakra' ),
			'default'   => true,
			'type'      => 'customind-toggle',
			'section'   => 'zakra_blog',
			'tab'       => 'general',
			'priority'  => 20,
			'tab_group' => 'zakra_blog_container_tab_group',
			'condition' => array(
				'zakra_blog_excerpt_type' => 'excerpt',
			),
		),
		'zakra_blog_button_alignment'                => array(
			'default'   => 'style-1',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Alignment', 'zakra' ),
			'section'   => 'zakra_blog',
			'tab'       => 'general',
			'priority'  => 20,
			'tab_group' => 'zakra_blog_container_tab_group',
			'choices'   => apply_filters(
				'zakra_blog_button_alignment',
				array(
					'style-1' => array(
						'label' => '',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/read-more-left.svg',
					),
					'style-2' => array(
						'label' => '',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/read-more-right.svg',
					),
				)
			),
			'columns'   => 2,
			'condition' => apply_filters(
				'zakra_blog_button_alignment_dependency',
				array(
					'zakra_blog_excerpt_type'  => 'excerpt',
					'zakra_enable_blog_button' => true,
				)
			),
		),
		'zakra_site_identity_navigation'             => array(
			'title'    => esc_html__( 'Site Title & Logo', 'zakra' ),
			'type'     => 'customind-navigation',
			'section'  => 'title_tagline',
			'to'       => 'zakra_header_builder_logo',
			'nav_type' => 'section',
			'priority' => 1,
		),
		'zakra_site_identity_navigation_heading'     => array(
			'type'        => 'customind-heading',
			'title'       => esc_html__( 'Site Icon', 'zakra' ),
			'section'     => 'title_tagline',
			'priority'    => 2,
			'description' => esc_html__( 'The Site Icon is what you see in browser tabs, bookmark bars, and within the WordPress mobile apps. It should be square and at least 512 by 512 pixels.', 'zakra' ),
		),
	)
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_blog_upgrade_to_pro'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in the Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'section'     => 'zakra_blog',
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_medium=dash-customizer-learn-more&utm_source=zakra-theme&utm_campaign=customizer-upgrade-button&utm_content=learn-more' ),
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
