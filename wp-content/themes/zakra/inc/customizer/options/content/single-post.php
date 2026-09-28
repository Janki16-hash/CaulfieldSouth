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
	'zakra_single_blog_post_options',
	array(
		'zakra_single_post_container_tab_group'    => array(
			'type'    => 'customind-tabs',
			'title'   => esc_html__( 'Blog', 'zakra' ),
			'section' => 'zakra_single_blog_post',
			'tabs'    => array(
				'general' => esc_html__( 'General', 'zakra' ),
				'style'   => esc_html__( 'Style', 'zakra' ),
			),
			'default' => 'general',
		),
		'zakra_single_post_container_layout'       => array(
			'default'   => 'default',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Container Layout', 'zakra' ),
			'section'   => 'zakra_single_blog_post',
			'choices'   => $container_layout_choices,
			'columns'   => 2,
			'priority'  => 10,
			'tab_group' => 'zakra_single_post_container_tab_group',
			'tab'       => 'general',
		),
		'zakra_single_post_sidebar_layout_divider' => array(
			'type'      => 'customind-divider',
			'variant'   => 'dashed',
			'section'   => 'zakra_single_blog_post',
			'tab_group' => 'zakra_single_post_container_tab_group',
			'tab'       => 'general',
		),
		'zakra_single_post_sidebar_layout'         => array(
			'default'    => 'default',
			'type'       => 'customind-radio-image',
			'title'      => esc_html__( 'Sidebar Layout', 'zakra' ),
			'section'    => 'zakra_single_blog_post',
			'choices'    => $sidebar_layout_choices,
			'columns'    => 2,
			'tab_group'  => 'zakra_single_post_container_tab_group',
			'tab'        => 'general',
			'priority'   => 10,
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_single_post_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_single_post_container_layout',
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
		'zakra_single_post_elements_heading1'      => array(
			'type'        => 'customind-heading',
			'title'       => esc_html__( 'Post Elements', 'zakra' ),
			'section'     => 'zakra_single_blog_post',
			'tab_group'   => 'zakra_single_post_container_tab_group',
			'tab'         => 'general',
			'description' => esc_html__( 'Manage the post elements such as Post Format, Category, Title, Meta, Content, etc.', 'zakra' ),
		),
		'zakra_single_post_elements'               => array(
			'type'      => 'customind-sortable',
			'section'   => 'zakra_single_blog_post',
			'tab_group' => 'zakra_single_post_container_tab_group',
			'tab'       => 'general',
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
		),
		'zakra_single_meta_elements_heading'       => array(
			'type'        => 'customind-heading',
			'tab_group'   => 'zakra_single_post_container_tab_group',
			'tab'         => 'general',
			'title'       => esc_html__( 'Post Meta', 'zakra' ),
			'section'     => 'zakra_single_blog_post',
			'description' => esc_html__( 'Manage the post meta elements such as Categories, Author, Date, Comments, Tags, etc.', 'zakra' ),
		),
		'zakra_single_meta_elements'               => array(
			'type'      => 'customind-sortable',
			'tab_group' => 'zakra_single_post_container_tab_group',
			'tab'       => 'general',
			'section'   => 'zakra_single_blog_post',
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
		),
	)
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_single_blog_post_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in the Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_medium=dash-customizer-learn-more&utm_source=zakra-theme&utm_campaign=customizer-upgrade-button&utm_content=learn-more' ),
		'section'     => 'zakra_single_blog_post',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
