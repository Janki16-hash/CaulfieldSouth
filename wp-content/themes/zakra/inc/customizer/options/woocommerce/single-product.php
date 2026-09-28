<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'zakra_customind' ) ) {
	return;
}

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
	'zakra_single_page_options',
	array(
		'zakra_single_product_container_layout'       => array(
			'default'  => 'default',
			'type'     => 'customind-radio-image',
			'title'    => esc_html__( 'Container Layout', 'zakra' ),
			'section'  => 'zakra_single_product',
			'choices'  => $container_layout_choices,
			'columns'  => 2,
			'priority' => 10,
		),
		'zakra_single_product_sidebar_layout_divider' => array(
			'type'       => 'customind-divider',
			'variant'    => 'dashed',
			'section'    => 'zakra_single_product',
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_single_product_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_single_product_container_layout',
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
		'zakra_single_product_sidebar_layout'         => array(
			'default'    => 'default',
			'type'       => 'customind-radio-image',
			'title'      => esc_html__( 'Sidebar Layout', 'zakra' ),
			'section'    => 'zakra_single_product',
			'choices'    => $sidebar_layout_choices,
			'columns'    => 2,
			'priority'   => 10,
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_single_product_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_single_product_container_layout',
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
	)
);
zakra_customind()->add_controls( $options );
