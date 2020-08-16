<?php
/**
 * SVG icons related functions and filters
 * Credits:
 * Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org
 * Twenty Seventeen is distributed under the terms of the GNU GPL
 *
 * @package Deejay
 */

/**
 * Add SVG definitions to the footer.
 */
function deejay_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_parent_theme_file_path( '/images/svg-icons.svg' );

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'deejay_include_svg_icons', 9999 );

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function deejay_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'deejay' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'deejay' );
	}

	// Set defaults.
	$defaults = array(
		'icon'      => '',
		'title'     => '',
		'desc'     => '',
		'fallback' => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * Deejay doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo deejay_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo deejay_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function deejay_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Get supported social icons.
	$social_icons = deejay_social_links_icons();

	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span>' . deejay_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'deejay_nav_menu_social_icons', 10, 4 );


if ( ! function_exists( 'deejay_social_links_icons' ) ) {
	/**
	 * Returns an array of supported social links (URL and icon name).
	 *
	 * @return array $social_links_icons
	 */
	function deejay_social_links_icons() {
		// Supported social links icons.
		$social_links_icons = array(
			'behance.net'      => 'behance',
			'codepen.io'       => 'codepen',
			'deviantart.com'   => 'deviantart',
			'digg.com'         => 'digg',
			'dribbble.com'     => 'dribbble',
			'dropbox.com'      => 'dropbox',
			'facebook.com'     => 'facebook',
			'flickr.com'       => 'flickr',
			'foursquare.com'   => 'foursquare',
			'play.google.com'  => 'google-play',
			'github.com'       => 'github',
			'instagram.com'    => 'instagram',
			'linkedin.com'     => 'linkedin',
			'mailto:'          => 'envelope-o',
			'medium.com'       => 'medium',
			'pinterest.com'    => 'pinterest-p',
			'getpocket.com'    => 'get-pocket',
			'reddit.com'       => 'reddit-alien',
			'skype.com'        => 'skype',
			'skype:'           => 'skype',
			'slideshare.net'   => 'slideshare',
			'snapchat.com'     => 'snapchat-ghost',
			'soundcloud.com'   => 'soundcloud',
			'spotify.com'      => 'spotify',
			'stumbleupon.com'  => 'stumbleupon',
			'tumblr.com'       => 'tumblr',
			'twitch.tv'        => 'twitch',
			'twitter.com'      => 'twitter',
			'vimeo.com'        => 'vimeo',
			'vine.co'          => 'vine',
			'vk.com'           => 'vk',
			'wordpress.org'    => 'wordpress',
			'wordpress.com'    => 'wordpress',
			'yelp.com'         => 'yelp',
			'youtube.com'      => 'youtube',
			'mixcloud.com'     => 'mixcloud',
			'bandcamp.com'     => 'bandcamp',
			'slack.com'        => 'slack',
			'itunes.apple.com' => 'itunes-note',
			'appstore.com'     => 'app-store-ios',
			'amazon.com'       => 'amazon',
			'deezer.com'       => 'deezer',
		);

		return apply_filters( 'deejay_social_links_icons', $social_links_icons );
	}
} // End if().
