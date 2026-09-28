<?php

$options = apply_filters(
	'zakra_header_media_options',
	array(
		'zakra_header_media_heading'      => array(
			'type'     => 'customind-title',
			'title'    => esc_html__( 'Header Media', 'zakra' ),
			'section'  => 'header_image',
			'priority' => 30,
		),
		'zakra_header_media_mobile_image' => array(
			'default'     => '',
			'type'        => 'customind-image',
			'title'       => esc_html__( 'Mobile Image', 'zakra' ),
			'description' => esc_html__( 'Optional. Shown instead of the Header Image/Video above on mobile devices. Leave empty to use the same header media on mobile.', 'zakra' ),
			'section'     => 'header_image',
			'priority'    => 65,
		),
	)
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_header_media_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in the Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_medium=dash-customizer-learn-more&utm_source=zakra-theme&utm_campaign=customizer-upgrade-button&utm_content=learn-more' ),
		'section'     => 'header_image',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
