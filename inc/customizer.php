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
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	$wp_customize->add_panel(
		'deejay_options',
		array(
			'title'    => __( 'Theme Options', 'deejay' ),
			'priority' => 90,
		)
	);

	$wp_customize->get_control( 'header_textcolor' )->label    = __( 'Site Title Color', 'deejay' );
	$wp_customize->get_control( 'background_color' )->label    = __( 'Body Background Color', 'deejay' );
	$wp_customize->get_control( 'background_color' )->priority = 20;

	$wp_customize->get_section( 'header_image' )->description = __(
		'<b>Important:</b></br>The header on the front page is only as big as your header image. If your header image is too small, your
		header widgets will not show.</br></br>If you add a video, the image will be used as a fallback while the video loads.',
		'deejay'
	);

	$wp_customize->add_setting(
		'deejay_description_textcolor',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#ffffff',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_description_textcolor',
			array(
				'label'    => __( 'Tagline Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_description_textcolor',
				'priority' => 10,
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_textcolor',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => null,
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_textcolor',
			array(
				'label'    => __( 'Body Text Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_textcolor',
				'priority' => 10,
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_accent_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#4ac6c9',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_accent_color',
			array(
				'label'    => __( 'Accent Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_accent_color',
				'priority' => 15,
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_link_underline_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#b902c4',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_link_underline_color',
			array(
				'label'    => __( 'Link Underline & Border Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_link_underline_color',
				'priority' => 15,
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_menu_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#cfcfcf',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_menu_text_color',
			array(
				'label'    => __( 'Top Navigation Bar Text Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_menu_text_color',
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_footer_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#aeaeae',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_footer_text_color',
			array(
				'label'    => __( 'Footer Text Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_footer_text_color',
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_footer_bgcolor',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#111111',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_footer_bgcolor',
			array(
				'label'    => __( 'Footer Background Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_footer_bgcolor',
				'priority' => 20,
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_topbar_bgcolor',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#111111',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_topbar_bgcolor',
			array(
				'label'    => __( 'Top Navigation Bar Background Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_topbar_bgcolor',
				'priority' => 15,
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_header_bgcolor',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_header_bgcolor',
			array(
				'label'       => __( 'Header Background Color ', 'deejay' ),
				'description' => __( 'In case your front page header image does not fit on other pages, you can now select a color that will replace the header image on all pages <b>except the front page</b>. To reset the option, press the Clear button.', 'deejay' ),
				'section'     => 'colors',
				'settings'    => 'deejay_header_bgcolor',
				'priority'    => 100,
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_header_widget_bgcolor',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => null,
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'deejay_header_widget_bgcolor',
			array(
				'label'    => __( 'Header Widget Background Color', 'deejay' ),
				'section'  => 'colors',
				'settings' => 'deejay_header_widget_bgcolor',
				'priority' => 20,
			)
		)
	);

	$wp_customize->add_setting(
		'deejay_postnav',
		array(
			'sanitize_callback' => 'deejay_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'deejay_postnav',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Check this box to display the next and previous post navigation for single posts and image attachments.', 'deejay' ),
			'section' => 'deejay_options',
		)
	);


	$wp_customize->add_setting(
		'deejay_menu_site_icon',
		array(
			'sanitize_callback' => 'deejay_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'deejay_menu_site_icon',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Check this box to display the site icon in the top navigation bar.', 'deejay' ),
			'section'  => 'title_tagline',
			'priority' => 95,
		)
	);

	$wp_customize->add_section(
		'deejay_crew',
		array(
			'title'       => __( 'Crew Template Settings', 'deejay' ),
			'description' => __( '<b>This setting is specific for the Crew page template.</b><br><br>Select the crew members that you would like to feature at the top of the page.', 'deejay' ),
			'priority'    => 95,
		)
	);

	// Create a list of users / crew members.
	$users  = get_users();
	$output = array();
	foreach ( (array) $users as $user ) {
		$output[ $user->ID ] = $user->display_name;
	}

	for ( $i = 1; $i < 9; $i++ ) {
		$wp_customize->add_setting(
			'deejay_crew_member' . $i,
			array(
				'sanitize_callback' => 'deejay_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'deejay_crew_member' . $i,
			array(
				'type'    => 'select',
				'label'   => __( 'Crew member #', 'deejay' ) . $i,
				'section' => 'deejay_crew',
				'choices' => $output,
			)
		);
	}

	$wp_customize->add_setting(
		'deejay_dark_mode',
		array(
			'sanitize_callback' => 'deejay_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'deejay_dark_mode',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Check this box to enable dark mode in the editor.', 'deejay' ),
			'section'  => 'colors',
			'priority' => 1,
		)
	);

	/* Navigation -Keep the old name for backwards compatibility.*/
	require get_template_directory() . '/inc/customizer-header-nav.php';
	/* Header */
	require get_template_directory() . '/inc/customizer-header.php';
	/* Footer */
	require get_template_directory() . '/inc/customizer-footer.php';
	/* Blog */
	require get_template_directory() . '/inc/customizer-blog-archive.php';
	/* Posts */
	require get_template_directory() . '/inc/customizer-posts.php';

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
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function deejay_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_text_field( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
