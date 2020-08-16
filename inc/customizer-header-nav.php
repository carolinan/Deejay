<?php
/**
 *  Deejay Theme Customizer.
 *
 * @package Deejay
 */

$wp_customize->add_section(
	'deejay_navigation_section',
	array(
		'title' => __( 'Navigation Bar Settings', 'deejay' ),
		'panel' => 'deejay_options',
	)
);

$wp_customize->add_setting(
	'deejay_sticky_menu',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_sticky_menu',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Check this box to stick the Top Navigation Bar to the top of the page.', 'deejay' ),
		'section' => 'deejay_navigation_section',
	)
);

$wp_customize->add_setting(
	'deejay_hide_priority_menu',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_hide_priority_menu',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Check this box to turn off the priority menu and only show the menu button on smaller screens.', 'deejay' ),
		'section' => 'deejay_navigation_section',
	)
);

$wp_customize->add_setting(
	'deejay_display_home',
	array(
		'default' => true,
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_display_home',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Check this box to display a home link in the top navigation bar.', 'deejay' ),
		'section' => 'deejay_navigation_section',
	)
);

$wp_customize->add_setting(
	'deejay_display_search',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_display_search',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Check this box to display a search form in the top navigation bar.', 'deejay' ),
		'section' => 'deejay_navigation_section',
	)
);

$wp_customize->add_setting(
	'deejay_hide_top_social_links',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_hide_top_social_links',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Check this box to hide the social menu in the top navigation bar.', 'deejay' ),
		'section' => 'deejay_navigation_section',
	)
);

$wp_customize->add_setting(
	'deejay_footer_menu',
	array(
		'sanitize_callback' => 'deejay_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'deejay_footer_menu',
	array(
		'type'    => 'checkbox',
		'label'   => __( 'Move the menu to the footer on small screens.', 'deejay' ),
		'section' => 'deejay_navigation_section',
	)
);
