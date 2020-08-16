<?php
/**
 *  Deejay Theme Customizer.
 *
 * @package Deejay
 */

$wp_customize->add_section(
	'deejay_blog_section',
	array(
		'title' => __( 'Blog and Archive Settings', 'deejay' ),
		'panel' => 'deejay_options',
	)
);

$wp_customize->add_setting(
	'deejay_grid_size',
	array(
		'sanitize_callback' => 'deejay_sanitize_select',
		'default'           => '3',
	)
);

$wp_customize->add_control(
	'deejay_grid_size',
	array(
		'type'        => 'radio',
		'label'       => __( 'Grid Layout', 'deejay' ),
		'description' => __( 'By default, posts are listed in a 3 column grid. You can change the number of columns here:', 'deejay' ),
		'section'     => 'deejay_blog_section',
		'choices'     => array(
			'1' => __( '1', 'deejay' ),
			'2' => __( '2', 'deejay' ),
			'3' => __( '3 (Default)', 'deejay' ),
		),
	)
);
