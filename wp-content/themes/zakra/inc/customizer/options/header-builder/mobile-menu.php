<?php

$options = apply_filters(
	'zakra_header_mobile_menu_sub_controls',
	array(
		'zakra_header_mobile_menu_typography' => array(
			'default'   => array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
						'unit' => 'rem',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '1.6',
						'unit' => 'rem',
					),
				),
				'line-height'    => array(
					'desktop' => array(
						'size' => '1.8',
						'unit' => '-',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '1.8',
						'unit' => '-',
					),
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			),
			'type'      => 'customind-typography',
			'priority'  => 15,
			'title'     => esc_html__( 'Typography', 'zakra' ),
			'transport' => 'postMessage',
			'section'   => 'zakra_header_builder_mobile_menu',
		),
	)
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_mobile_menu_upgrade2'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in the Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_medium=dash-customizer-learn-more&utm_source=zakra-theme&utm_campaign=customizer-upgrade-button&utm_content=learn-more' ),
		'section'     => 'zakra_header_builder_mobile_menu',
		'priority'    => 100,
	);

}

zakra_customind()->add_controls( $options );
