<?php
/**
 *  Deejay Theme Customizer.
 *
 * @package Deejay
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function deejay_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_panel('deejay_options_panel',	array(
		'title' => __( 'Theme Options', 'deejay' ),
		'priority' => 90,
		)
	);

	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'deejay' );
	$wp_customize->get_control( 'background_color' )->label = __( 'Body Background Color', 'deejay' );
	$wp_customize->get_control( 'background_color' )->priority = 20;

	$wp_customize->add_section('colors',      array(
		'title' => __( 'Colors', 'deejay' ),
		'priority' => 200,
		'panel' => 'deejay_options_panel',
	) );

	$wp_customize->add_setting( 'deejay_description_textcolor',		array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'        => '#fff',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'deejay_description_textcolor', array(
		'label'      => __( 'Tagline Color', 'deejay' ),
		'section'    => 'colors',
		'settings'   => 'deejay_description_textcolor',
		'priority' => 15,
		)
	) );

	$wp_customize->add_setting( 'deejay_footer_bgcolor', array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#202020',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'deejay_footer_bgcolor', array(
		'label'      => __( 'Footer Background Color', 'deejay' ),
		'section'    => 'colors',
		'settings'   => 'deejay_footer_bgcolor',
		'priority' => 20,
		)
	) );

	$wp_customize->add_setting( 'deejay_topbar_bgcolor', array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#111111',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'deejay_topbar_bgcolor', array(
		'label'      => __( 'Top Menu Background Color', 'deejay' ),
		'section'    => 'colors',
		'settings'   => 'deejay_topbar_bgcolor',
		'priority' => 20,
		)
	) );

	$wp_customize->add_section('deejay_section_navigation', array(
		'title' => __( 'Navigation', 'deejay' ),
		'priority' => 200,
		'panel' => 'deejay_options_panel',
	) );

	$wp_customize->add_setting( 'deejay_postnav', array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	) );
	$wp_customize->add_control('deejay_postnav', array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to display the next and previous post navigation for single posts. ', 'deejay' ),
		'section' => 'deejay_section_navigation',
	) );
}

add_action( 'customize_register', 'deejay_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function deejay_customize_preview_js() {
	wp_enqueue_script( 'deejay_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'deejay_customize_preview_js' );

/**
 * Checkbox sanitization callback, from https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function deejay_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}