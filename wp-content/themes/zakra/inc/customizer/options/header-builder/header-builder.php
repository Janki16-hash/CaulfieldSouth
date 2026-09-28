<?php

function customind_get_header_components() {

	return apply_filters(
		'zakra_header_builder_components',
		array(
			'desktop' => array_filter(
				array(
					array(
						'name'    => __( 'Site Title & Logo', 'zakra' ),
						'section' => 'zakra_header_builder_logo',
						'id'      => 'logo',
					),
					array(
						'name'    => __( 'Primary Menu', 'zakra' ),
						'section' => 'zakra_header_builder_primary_menu',
						'id'      => 'primary-menu',
					),
					array(
						'name'    => __( 'Secondary Menu', 'zakra' ),
						'section' => 'zakra_header_builder_secondary_menu',
						'id'      => 'secondary-menu',
					),
					array(
						'name'    => __( 'Tertiary Menu', 'zakra' ),
						'section' => 'zakra_header_builder_tertiary_menu',
						'id'      => 'tertiary-menu',
					),
					array(
						'name'    => __( 'Quaternary Menu', 'zakra' ),
						'section' => 'zakra_header_builder_quaternary_menu',
						'id'      => 'quaternary-menu',
					),
					array(
						'name'    => __( 'Button 1', 'zakra' ),
						'section' => 'zakra_header_builder_button_1',
						'id'      => 'button',
					),
					array(
						'name'    => __( 'Search', 'zakra' ),
						'section' => 'zakra_header_builder_search',
						'id'      => 'search',
					),
					array(
						'name'    => __( 'HTML 1', 'zakra' ),
						'section' => 'zakra_header_builder_html_1',
						'id'      => 'html-1',
					),
					array(
						'name'    => __( 'HTML 2', 'zakra' ),
						'section' => 'zakra_header_builder_html_2',
						'id'      => 'html-2',
					),
					array(
						'name'     => __( 'Widget 1', 'zakra' ),
						'section'  => 'zakra_header_builder_widget_1',
						'id'       => 'widget-1',
						'section2' => 'sidebar-widgets-top-bar-col-1-sidebar',
					),
					array(
						'name'     => __( 'Widget 2', 'zakra' ),
						'section'  => 'zakra_header_builder_widget_2',
						'id'       => 'widget-2',
						'section2' => 'sidebar-widgets-top-bar-col-2-sidebar',
					),
					array(
						'name'    => __( 'Social', 'zakra' ),
						'section' => 'zakra_header_builder_socials',
						'id'      => 'socials',
					),
					class_exists( 'WooCommerce' ) ? array(
						'name'    => __( 'Cart', 'zakra' ),
						'section' => 'zakra_header_builder_cart',
						'id'      => 'cart',
					) : false,
				)
			),
			'mobile'  => array_filter(
				array(
					array(
						'name'    => __( 'Logo', 'zakra' ),
						'section' => 'zakra_header_builder_logo',
						'id'      => 'logo',
					),
					array(
						'name'    => __( 'Mobile Menu', 'zakra' ),
						'section' => 'zakra_header_builder_mobile_menu',
						'id'      => 'mobile-menu',
					),
					array(
						'name'    => __( 'Button', 'zakra' ),
						'section' => 'zakra_header_builder_button_1',
						'id'      => 'button',
					),
					array(
						'name'    => __( 'HTML 1', 'zakra' ),
						'section' => 'zakra_header_builder_html_1',
						'id'      => 'html-1',
					),
					array(
						'name'    => __( 'HTML 2', 'zakra' ),
						'section' => 'zakra_header_builder_html_2',
						'id'      => 'html-2',
					),
					array(
						'name'     => __( 'Widget 1', 'zakra' ),
						'section'  => 'zakra_header_builder_widget_1',
						'id'       => 'widget-1',
						'section2' => 'sidebar-widgets-top-bar-col-1-sidebar',
					),
					array(
						'name'     => __( 'Widget 2', 'zakra' ),
						'section'  => 'zakra_header_builder_widget_2',
						'id'       => 'widget-2',
						'section2' => 'sidebar-widgets-top-bar-col-2-sidebar',
					),
					array(
						'name'    => __( 'Toggle Button', 'zakra' ),
						'section' => 'zakra_header_builder_toggle_button',
						'id'      => 'toggle-button',
					),
					class_exists( 'WooCommerce' ) ? array(
						'name'    => __( 'Cart', 'zakra' ),
						'section' => 'zakra_header_builder_cart',
						'id'      => 'cart',
					) : false,
				)
			),
		)
	);
}

$zakra_pro_active = is_plugin_active( 'zakra-pro/zakra-pro.php' );

$options = array(
	'zakra_header_builder_components'    => array(
		'type'    => 'customind-builder-components',
		'choices' => customind_get_header_components(),
		'context' => 'header',
		'group'   => 'zakra_header_builder',
		'section' => 'zakra_header_builder_section',
		'type_items' => array(
			array(
				'label'   => __( 'Sticky header', 'zakra' ),
				'pro'     => ! $zakra_pro_active,
				'section' => 'zakra_sticky_header',
				'url'     => esc_url_raw( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=dash-customizer-header&utm_campaign=ui-header-builder-3' ),
			),
			array(
				'label'   => __( 'Transparent header', 'zakra' ),
				'pro'     => ! $zakra_pro_active,
				'section' => 'zakra_transparent_header',
				'url'     => esc_url_raw( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=dash-customizer-header&utm_campaign=ui-header-builder-4' ),
			),
			array(
				'label'   => __( 'Header Action', 'zakra' ),
				'pro'     => ! $zakra_pro_active,
				'section' => 'zakra_header_action',
				'url'     => esc_url_raw( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=dash-customizer-header&utm_campaign=ui-header-builder-5' ),
			),
		),
		'pro_items'  => array_filter(
			array(
				$zakra_pro_active ? false : array(
					'label' => __( 'Drawer Menu', 'zakra' ),
					'pro'   => true,
					'url'   => esc_url_raw( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=dash-customizer-header&utm_campaign=ui-header-builder-1' ),
				),
				$zakra_pro_active ? false : array(
					'label' => __( 'Button 2', 'zakra' ),
					'pro'   => true,
					'url'   => esc_url_raw( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=dash-customizer-header&utm_campaign=ui-header-builder-2' ),
				),
			)
		),
	),
	'zakra_header_builder'               => array(
		'section'     => 'zakra_header_builder_section',
		'type'        => 'customind-header-builder',
		'transport'   => 'postMessage',
		'components'  => customind_get_header_components(),
		'default'     => array(
			'desktop' => array(
				'top'    => array(
					'left'   => array(),
					'center' => array(),
					'right'  => array(),
				),
				'main'   => array(
					'left'   => array(
						'logo',
					),
					'center' => array(),
					'right'  => array(
						'primary-menu',
						'search',
					),
				),
				'bottom' => array(
					'left'   => array(),
					'center' => array(),
					'right'  => array(),
				),
			),
			'mobile'  => array(
				'top'    => array(
					'left'   => array(),
					'center' => array(),
					'right'  => array(),
				),
				'main'   => array(
					'left'   => array(
						'logo',
					),
					'center' => array(),
					'right'  => array(
						'toggle-button',
					),
				),
				'bottom' => array(
					'left'   => array(),
					'center' => array(),
					'right'  => array(),
				),
			),
			'offset'  => array(
				'mobile-menu',
			),
		),
		'areas'       => array(
			array(
				'name'    => __( 'Builder area top', 'zakra' ),
				'id'      => 'top',
				'section' => 'zakra_header_builder_top_area',
				'areas'   => array(
					array(
						'name'    => __( 'Builder area top left', 'zakra' ),
						'id'      => 'left',
						'section' => '',
					),
					array(
						'name'    => __( 'Builder area top middle', 'zakra' ),
						'id'      => 'center',
						'section' => '',
					),
					array(
						'name'    => __( 'Builder area top right', 'zakra' ),
						'id'      => 'right',
						'section' => '',
					),
				),
			),
			array(
				'name'    => __( 'Builder Main area', 'zakra' ),
				'id'      => 'main',
				'section' => 'zakra_header_builder_main_area',
				'areas'   => array(
					array(
						'name'    => __( 'Builder area middle left', 'zakra' ),
						'id'      => 'left',
						'section' => '',
					),
					array(
						'name'    => __( 'Main center', 'zakra' ),
						'id'      => 'center',
						'section' => '',
					),
					array(
						'name'    => __( 'Main right', 'zakra' ),
						'id'      => 'right',
						'section' => '',
					),
				),
			),
			array(
				'name'    => __( 'Bottom', 'zakra' ),
				'id'      => 'bottom',
				'section' => 'zakra_header_builder_bottom_area',
				'areas'   => array(
					array(
						'name'    => __( 'Bottom left', 'zakra' ),
						'id'      => 'left',
						'section' => '',
					),
					array(
						'name'    => __( 'Bottom center', 'zakra' ),
						'id'      => 'center',
						'section' => '',
					),
					array(
						'name'    => __( 'Bottom right', 'zakra' ),
						'id'      => 'right',
						'section' => '',
					),
				),
			),
		),
		'offset_area' => array(
			'name'    => __( 'Offset Area', 'zakra' ),
			'id'      => 'offset',
			'section' => 'zakra_header_builder_offset_area',
		),
		'partial'     => array(
			'selector'            => '.zak-header-builder',
			'container_inclusive' => true,
			'render_callback'     => function () {
				zakra_header_builder_markup();
			},
		),
	),
	'zakra_header_builder_style_heading' => array(
		'type'    => 'customind-title',
		'title'   => esc_html__( 'Global Header', 'zakra' ),
		'section' => 'zakra_global_header_option',
	),
	'zakra_header_builder_background'    => array(
		'default'   => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'contain',
			'background-attachment' => 'scroll',
		),
		'type'      => 'customind-background',
		'title'     => esc_html__( 'Background', 'zakra' ),
		'transport' => 'postMessage',
		'section'   => 'zakra_global_header_option',
	),
	'zakra_header_builder_border_width'  => array(
		'default'     => array(
			'top'    => '0',
			'right'  => '0',
			'bottom' => '1',
			'left'   => '0',
			'unit'   => 'px',
		),
		'type'        => 'customind-dimensions',
		'title'       => esc_html__( 'Border Width', 'zakra' ),
		'section'     => 'zakra_global_header_option',
		'units'       => array( 'px', 'em', 'rem', '%' ),
		'transport'   => 'postMessage',
		'defaultUnit' => 'px',
	),
	'zakra_header_builder_border_color'  => array(
		'default'   => 'var(--zakra-color-9)',
		'type'      => 'customind-color',
		'title'     => esc_html__( 'Border Color', 'zakra' ),
		'transport' => 'postMessage',
		'section'   => 'zakra_global_header_option',
	),
);

zakra_customind()->add_controls( $options );
