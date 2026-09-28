<?php

$options = apply_filters(
	'zakra_blog_sidebar_options',
	array(
		'zakra_widget_title_heading'      => array(
			'type'      => 'customind-heading',
			'title'     => esc_html__( 'Sidebar Widget Title', 'zakra' ),
			'section'   => 'zakra_sidebar',
			'priority'  => 6,
			'condition' => array(
				'zakra_enable_sidebar_widgets_title!' => false,
			),
		),
		'zakra_widget_title_typography'   => array(
			'default'   => apply_filters(
				'zakra_widget_title_typography_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.2',
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
				)
			),
			'type'      => 'customind-typography',
			'title'     => esc_html__( 'Typography', 'zakra' ),
			'transport' => 'postMessage',
			'section'   => 'zakra_sidebar',
			'priority'  => 9,
			'condition' => array(
				'zakra_enable_sidebar_widgets_title!' => false,
			),
		),
		'zakra_widget_content_heading'    => array(
			'type'     => 'customind-heading',
			'title'    => esc_html__( 'Widget Content', 'zakra' ),
			'section'  => 'zakra_sidebar',
			'priority' => 11,
		),
		'zakra_widget_content_typography' => array(
			'default'   => apply_filters(
				'zakra_widget_content_typography_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '400',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '14',
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
							'size' => '',
							'unit' => '',
						),
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			),
			'type'      => 'customind-typography',
			'title'     => esc_html__( 'Typography', 'zakra' ),
			'transport' => 'postMessage',
			'section'   => 'zakra_sidebar',
			'priority'  => 13,
		),
	)
);
if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_blog_sidebar_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in the Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_medium=dash-customizer-learn-more&utm_source=zakra-theme&utm_campaign=customizer-upgrade-button&utm_content=learn-more' ),
		'section'     => 'zakra_sidebar',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
