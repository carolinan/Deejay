<?php
/**
 *  Deejay Theme Customizer.
 *
 * @package Deejay
 */

/**
 * Add settings and controls for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function deejay_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport  = 'postMessage';

	$wp_customize->add_section('deejay_options',	array(
		'title' => __( 'Theme Options', 'deejay' ),
		'priority' => 90,
		)
	);

	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'deejay' );
	$wp_customize->get_control( 'background_color' )->label = __( 'Body Background Color', 'deejay' );
	$wp_customize->get_control( 'background_color' )->priority = 20;

	$wp_customize->add_setting( 'deejay_description_textcolor',		array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'        => '#ffffff ',
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
		'default' => '#111111',
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
		'label'      => __( 'Top Navigation Bar Background Color', 'deejay' ),
		'section'    => 'colors',
		'settings'   => 'deejay_topbar_bgcolor',
		'priority' => 15,
		)
	) );

	$wp_customize->add_setting( 'deejay_header_widget_bgcolor', array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => null,
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'deejay_header_widget_bgcolor', array(
		'label'	=> __( 'Header Widget Background Color', 'deejay' ),
		'section' => 'colors',
		'settings' => 'deejay_header_widget_bgcolor',
		'priority' => 20,
		)
	) );

	$wp_customize->add_setting( 'deejay_postnav', array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	) );

	$wp_customize->add_control('deejay_postnav', array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to display the next and previous post navigation for single posts.', 'deejay' ),
		'section' => 'deejay_options',
	) );

	$wp_customize->add_setting( 'deejay_hide_credits', array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	) );

	$wp_customize->add_control('deejay_hide_credits', array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to hide the footer credit links. :(', 'deejay' ),
		'section' => 'deejay_options',
	) );

	$wp_customize->add_setting( 'deejay_grid_size', array(
		'sanitize_callback' => 'deejay_sanitize_select',
		'default' => '3',
	) );

	$wp_customize->add_control('deejay_grid_size', array(
		'type' => 'radio',
		'label' => __( 'Grid Layout', 'deejay' ),
		'description' => __( 'By default, posts are listed in a 3 column grid. You can change the number of columns here:', 'deejay' ),
		'section' => 'deejay_options',
		'choices' => array(
			'1' => __( '1', 'deejay' ),
			'2' => __( '2', 'deejay' ),
			'3' => __( '3 (Default)', 'deejay' ),
		),
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

/**
 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
 * as a slug, and then validates `$input` against the choices defined for the control.
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function deejay_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
