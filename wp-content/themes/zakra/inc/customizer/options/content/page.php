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
	'zakra_page_options',
	array(
		'zakra_single_page_container_layout'       => array(
			'default'   => 'default',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Container Layout', 'zakra' ),
			'section'   => 'zakra_page',
			'tab_group' => 'zakra_single_page_container_tab_group',
			'tab'       => 'general',
			'choices'   => $container_layout_choices,
			'columns'   => 2,
			'priority'  => 10,
		),
		'zakra_single_page_sidebar_layout_divider' => array(
			'type'       => 'customind-divider',
			'variant'    => 'dashed',
			'tab_group'  => 'zakra_single_page_container_tab_group',
			'tab'        => 'general',
			'section'    => 'zakra_page',
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_single_page_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_single_page_container_layout',
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
		'zakra_single_page_sidebar_layout'         => array(
			'default'    => 'default',
			'type'       => 'customind-radio-image',
			'title'      => esc_html__( 'Sidebar Layout', 'zakra' ),
			'section'    => 'zakra_page',
			'choices'    => $sidebar_layout_choices,
			'columns'    => 2,
			'priority'   => 10,
			'tab_group'  => 'zakra_single_page_container_tab_group',
			'tab'        => 'general',
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'zakra_single_page_container_layout',
						'operator' => '===',
						'value'    => 'contained',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'zakra_single_page_container_layout',
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

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_page_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in the Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_medium=dash-customizer-learn-more&utm_source=zakra-theme&utm_campaign=customizer-upgrade-button&utm_content=learn-more' ),
		'section'     => 'zakra_page',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
