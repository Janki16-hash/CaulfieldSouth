<?php
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
$options                = apply_filters(
	'zakra_sidebar',
	array(
		'zakra_layout_heading_tab_group'        => array(
			'type'    => 'customind-tabs',
			'title'   => esc_html__( 'Layouts', 'zakra' ),
			'section' => 'zakra_container',
			'tabs'    => array(
				'general' => esc_html__( 'General', 'zakra' ),
				'style'   => esc_html__( 'Style', 'zakra' ),
			),
			'default' => 'general',
		),
		'zakra_layout_heading'                  => array(
			'type'      => 'customind-heading',
			'title'     => esc_html__( 'Container', 'zakra' ),
			'section'   => 'zakra_container',
			'tab_group' => 'zakra_layout_heading_tab_group',
			'tab'       => 'general',
		),
		'zakra_global_container_layout'         => array(
			'default'   => 'contained',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Layout', 'zakra' ),
			'section'   => 'zakra_container',
			'choices'   => $container_layout_choices,
			'columns'   => 2,
			'tab_group' => 'zakra_layout_heading_tab_group',
			'tab'       => 'general',
		),
		'zakra_container_width'                 => array(
			'default'     => array(
				'size' => 1170,
				'unit' => 'px',
			),
			'type'        => 'customind-slider',
			'title'       => esc_html__( 'Width', 'zakra' ),
			'section'     => 'zakra_container',
			'transport'   => 'postMessage',
			'units'       => array( 'px' ),
			'defaultUnit' => 'px',
			'tab_group'   => 'zakra_layout_heading_tab_group',
			'tab'         => 'general',
			'input_attrs' => array(
				'min'  => 768,
				'max'  => 1920,
				'step' => 1,
			),
		),
		'zakra_enable_container_box_style'      => array(
			'title'     => esc_html__( 'Box Style', 'zakra' ),
			'default'   => false,
			'type'      => 'customind-toggle',
			'section'   => 'zakra_container',
			'tab_group' => 'zakra_layout_heading_tab_group',
			'tab'       => 'general',
		),
		'zakra_content_area_layout_divider'     => array(
			'type'      => 'customind-divider',
			'variant'   => 'dashed',
			'section'   => 'zakra_container',
			'tab_group' => 'zakra_layout_heading_tab_group',
			'tab'       => 'general',
		),
		'zakra_content_area_layout'             => [
			'type'      => 'customind-toggle-button',
			'default'   => 'bordered',
			'title'     => esc_html__( 'Content Area Layout', 'zakra' ),
			'section'   => 'zakra_container',
			'tab_group' => 'zakra_layout_heading_tab_group',
			'tab'       => 'general',
			'choices'   => [
				'bordered' => esc_html__( 'Bordered', 'zakra' ),
				'boxed'    => esc_html__( 'Boxed', 'zakra' ),
			],
		],
		'zakra_content_area_padding'            => array(
			'default'     => array(
				'size' => '',
				'unit' => 'px',
			),
			'type'        => 'customind-slider',
			'title'       => esc_html__( 'Content Area Padding (Top/Bottom)', 'zakra' ),
			'section'     => 'zakra_container',
			'transport'   => 'postMessage',
			'units'       => array( 'px' ),
			'defaultUnit' => 'px',
			'tab_group'   => 'zakra_layout_heading_tab_group',
			'tab'         => 'style',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 500,
				'step' => 1,
			),
		),
		'zakra_content_area_padding_horizontal' => array(
			'default'     => array(
				'size' => '',
				'unit' => 'px',
			),
			'type'        => 'customind-slider',
			'title'       => esc_html__( 'Content Area Padding (Left/Right)', 'zakra' ),
			'section'     => 'zakra_container',
			'transport'   => 'postMessage',
			'units'       => array( 'px' ),
			'defaultUnit' => 'px',
			'tab_group'   => 'zakra_layout_heading_tab_group',
			'tab'         => 'style',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 500,
				'step' => 1,
			),
		),
		'zakra_sidebar_heading'                 => array(
			'type'      => 'customind-heading',
			'title'     => esc_html__( 'Sidebar', 'zakra' ),
			'section'   => 'zakra_container',
			'tab_group' => 'zakra_layout_heading_tab_group',
			'tab'       => 'general',
			'condition' => array(
				'zakra_global_container_layout' => 'contained',
			),
		),
		'zakra_global_sidebar_layout'           => array(
			'default'   => 'no_sidebar',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Layout', 'zakra' ),
			'section'   => 'zakra_container',
			'choices'   => $sidebar_layout_choices,
			'columns'   => 2,
			'tab_group' => 'zakra_layout_heading_tab_group',
			'tab'       => 'general',
			'condition' => array(
				'zakra_global_container_layout' => 'contained',
			),
		),
		'zakra_sidebar_width'                   => array(
			'title'       => esc_html__( 'Width', 'zakra' ),
			'default'     => array(
				'size' => 30,
				'unit' => '%',
			),
			'type'        => 'customind-slider',
			'section'     => 'zakra_container',
			'transport'   => 'postMessage',
			'tab_group'   => 'zakra_layout_heading_tab_group',
			'tab'         => 'general',
			'priority'    => 10,
			'units'       => array( '%', 'em', 'rem' ),
			'defaultUnit' => '%',
			'input_attrs' => array(
				'min'  => 15,
				'max'  => 100,
				'step' => 1,
			),
			'condition'   => array(
				'zakra_global_container_layout' => 'contained',
			),
		),
	)
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_base_colors_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in the Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_medium=dash-customizer-learn-more&utm_source=zakra-theme&utm_campaign=customizer-upgrade-button&utm_content=learn-more' ),
		'section'     => 'zakra_container',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
