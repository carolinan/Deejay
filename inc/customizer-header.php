<?php
/**
 *  Deejay Theme Customizer.
 *
 * @package Deejay
 */

$wp_customize->add_section(
	'deejay_header_section',
	array(
		'title' => __( 'Header Settings', 'deejay' ),
		'panel' => 'deejay_options',
	)
);

$wp_customize->add_setting(
	'deejay_advanced_header',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_advanced_header',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Check this box to activate the advanced header for mobile phones and tablets. Because the header image is smaller on mobile devices, the widgets will be displayed below the header image.', 'deejay' ),
		'section' => 'deejay_header_section',
	)
);

$wp_customize->add_setting(
	'deejay_advanced_header_height',
	array(
		'sanitize_callback' => 'absint',
		'default'           => '445',
	)
);

$wp_customize->add_control(
	'deejay_advanced_header_height',
	array(
		'type'            => 'number',
		'label'           => __( 'Advanced header height', 'deejay' ),
		'description'     => __( 'Set a height for the responsive advanced header, using pixels.', 'deejay' ),
		'input_attrs'     => array(
			'min' => 1,
		),
		'section'         => 'deejay_header_section',
		'active_callback' => function() {
			return true === get_theme_mod( 'deejay_advanced_header', true );
		},
	)
);


$wp_customize->add_setting(
	'deejay_advanced_header_image_size',
	array(
		'sanitize_callback' => 'deejay_sanitize_select',
		'default'           => 'cover',
	)
);

$wp_customize->add_control(
	'deejay_advanced_header_image_size',
	array(
		'type'            => 'select',
		'label'           => __( 'Header image settings', 'deejay' ),
		'description'     => __( 'header background image size', 'deejay' ),
		'choices'         => array(
			'cover'   => __( 'Cover', 'deejay' ),
			'contain' => __( 'Contain', 'deejay' ),
		),
		'section'         => 'deejay_header_section',
		'active_callback' => function() {
			return true === get_theme_mod( 'deejay_advanced_header', true );
		},
	)
);


$wp_customize->add_setting(
	'deejay_advanced_header_image_size',
	array(
		'sanitize_callback' => 'deejay_sanitize_select',
		'default'           => 'cover',
	)
);

$wp_customize->add_control(
	'deejay_advanced_header_image_size',
	array(
		'type'            => 'select',
		'label'           => __( 'Header background image size', 'deejay' ),
		'choices'         => array(
			'cover'   => __( 'Cover', 'deejay' ),
			'contain' => __( 'Contain', 'deejay' ),
		),
		'section'         => 'deejay_header_section',
		'active_callback' => function() {
			return true === get_theme_mod( 'deejay_advanced_header', true );
		},
	)
);

$wp_customize->add_setting(
	'deejay_advanced_header_image_position',
	array(
		'sanitize_callback' => 'deejay_sanitize_select',
		'default'           => 'center center',
	)
);

$wp_customize->add_control(
	'deejay_advanced_header_image_position',
	array(
		'label'           => __( 'Header background image position', 'deejay' ),
		'section'         => 'deejay_header_section',
		'active_callback' => function() {
			return true === get_theme_mod( 'deejay_advanced_header', true );
		},
		'type'            => 'select',
		'choices'         => array(
			'center center' => __( 'Center', 'deejay' ),
			'center top'    => __( 'Top Center', 'deejay' ),
			'left center'   => __( 'Left center', 'deejay' ),
			'right center'  => __( 'Right center', 'deejay' ),
			'left top'      => __( 'Left top', 'deejay' ),
			'right top'     => __( 'Right top', 'deejay' ),
		),
	)
);
