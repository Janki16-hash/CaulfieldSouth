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
		'zakra_woocommerce_global_container_layout'       => array(
			'default'  => 'contained',
			'type'     => 'customind-radio-image',
			'title'    => esc_html__( 'Container Layout', 'zakra' ),
			'section'  => 'zakra_woocommerce_layout',
			'choices'  => $container_layout_choices,
			'columns'  => 2,
			'priority' => 10,
		),
		'zakra_woocommerce_global_sidebar_layout_divider' => array(
			'type'       => 'customind-divider',
			'variant'    => 'dashed',
			'section'    => 'zakra_woocommerce_layout',
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_woocommerce_global_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_woocommerce_global_container_layout',
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
		'zakra_woocommerce_global_sidebar_layout'         => array(
			'default'    => 'no_sidebar',
			'type'       => 'customind-radio-image',
			'title'      => esc_html__( 'Sidebar Layout', 'zakra' ),
			'section'    => 'zakra_woocommerce_layout',
			'choices'    => $sidebar_layout_choices,
			'columns'    => 2,
			'priority'   => 10,
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_woocommerce_global_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_woocommerce_global_container_layout',
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
