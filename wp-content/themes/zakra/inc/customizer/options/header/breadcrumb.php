<?php

$options = apply_filters(
	'zakra_breadcrumbs_options',
	array(
		'zakra_enable_breadcrumb'            => array(
			'title'   => esc_html__( 'Enable', 'zakra' ),
			'default' => true,
			'type'    => 'customind-toggle',
			'section' => 'zakra_breadcrumb',
		),
		'zakra_breadcrumb_typography'        => array(
			'default'   => apply_filters(
				'zakra_breadcrumb_typography_filter',
				array(
					'font-family' => 'Default',
					'font-weight' => '500',
					'font-size'   => array(
						'desktop' => array(
							'size' => '16',
							'unit' => 'px',
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
				)
			),
			'type'      => 'customind-typography',
			'title'     => esc_html__( 'Typography', 'zakra' ),
			'transport' => 'postMessage',
			'section'   => 'zakra_breadcrumb',
			'priority'  => 13,
			'condition' => array(
				'zakra_enable_breadcrumb' => true,
			),
		),
		'zakra_breadcrumbs_text_color'       => array(
			'title'     => esc_html__( 'Text Color', 'zakra' ),
			'default'   => '#16181a',
			'type'      => 'customind-color',
			'transport' => 'postMessage',
			'section'   => 'zakra_breadcrumb',
			'priority'  => 14,
			'condition' => array(
				'zakra_enable_breadcrumb' => true,
			),
		),
		'zakra_breadcrumb_separator_color'   => array(
			'title'     => esc_html__( 'Separator Color', 'zakra' ),
			'default'   => '#16181a',
			'type'      => 'customind-color',
			'transport' => 'postMessage',
			'priority'  => 14,
			'section'   => 'zakra_breadcrumb',
			'condition' => array(
				'zakra_enable_breadcrumb' => true,
			),
		),
		'zakra_breadcrumbs_link_color_group' => array(
			'type'         => 'customind-color-group',
			'title'        => esc_html__( 'Link Color', 'zakra' ),
			'section'      => 'zakra_breadcrumb',
			'priority'     => 15,
			'sub_controls' => array(
				'zakra_breadcrumbs_link_color'       => array(
					'default'   => '#16181a',
					'type'      => 'customind-color',
					'transport' => 'postMessage',
					'title'     => esc_html__( 'Normal', 'zakra' ),
					'section'   => 'zakra_breadcrumb',
				),
				'zakra_breadcrumbs_link_hover_color' => array(
					'default'   => 'var(--zakra-color-1)',
					'type'      => 'customind-color',
					'transport' => 'postMessage',
					'title'     => esc_html__( 'Hover', 'zakra' ),
					'section'   => 'zakra_breadcrumb',
				),
			),
			'condition'    => array(
				'zakra_enable_breadcrumb' => true,
			),
		),
	)
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_page_header_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in the Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_medium=dash-customizer-learn-more&utm_source=zakra-theme&utm_campaign=customizer-upgrade-button&utm_content=learn-more' ),
		'section'     => 'zakra_breadcrumb',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
