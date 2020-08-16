<?php
/**
 *  Deejay Theme Customizer.
 *
 * @package Deejay
 */

$wp_customize->add_section(
	'deejay_footer_section',
	array(
		'title' => __( 'Footer Settings', 'deejay' ),
		'panel' => 'deejay_options',
	)
);

$wp_customize->add_setting(
	'deejay_hide_credits',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_hide_credits',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Check this box to hide the footer credit links. :(', 'deejay' ),
		'section' => 'deejay_footer_section',
	)
);

$wp_customize->add_setting(
	'deejay_hide_gototop',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_hide_gototop',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Check this box to hide the go to top link and icon.', 'deejay' ),
		'section' => 'deejay_footer_section',
	)
);

