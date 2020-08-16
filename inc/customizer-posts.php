<?php
/**
 *  Deejay Theme Customizer.
 *
 * @package Deejay
 */

$wp_customize->add_section(
	'deejay_post_section',
	array(
		'title' => __( 'Post Settings', 'deejay' ),
		'panel' => 'deejay_options',
	)
);

$wp_customize->add_setting(
	'deejay_post_navigation',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
		'default'           => false,
	)
);

$wp_customize->add_control(
	'deejay_post_navigation',
	array(
		'type'        => 'checkbox',
		'label'       => __( 'Post navigation', 'deejay' ),
		'description' => __( 'Enable links to the next and previous posts in single posts.', 'deejay' ),
		'section'     => 'deejay_post_section',
	)
);
