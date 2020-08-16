<?php
/**
 * Deejay block patterns
 *
 * @package Deejay
 */

if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'deejay/profile',
		array(
			'title'   => __( 'Deejay: Profile', 'deejay' ),
			'content' => '
			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"id":1,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/profile.jpg' ) ) . '" alt="' . esc_attr( _x( 'Profile photo.', 'Block pattern content', 'deejay' ) ). '" class="wp-image-1"/></figure>
			<!-- /wp:image -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textColor":"accent"} -->
			<h2 class="has-accent-color has-text-color">' . _x( 'Profile Name', 'Block pattern content', 'deejay' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"normal"} -->
			<p class="has-normal-font-size">' . _x( 'Sed eu commodo nisi. Nullam in nulla tempor, laoreet orci et, <strong>maximus</strong> lacus. Sed ut commodo justo, quis congue felis.', 'Block pattern content', 'deejay' ) . ' </p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"normal"} -->
			<h3 class="has-normal-font-size"><strong>' . _x( 'Etiam id laoreet arcu', 'Block pattern content', 'deejay' ) . '</strong>.</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . _x( 'Vivamus sed rhoncus dolor. <a href="#">Ut eu eros augue. </a>', 'Block pattern content', 'deejay' ) . '</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->
			
			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column">
			<!-- wp:social-links -->
			<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"twitter"} /-->

			<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

			<!-- wp:social-link {"url":"#","service":"instagram"} /-->

			<!-- wp:social-link {"url":"#",service":"facebook"} /-->

			<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
			<!-- /wp:social-links -->
			<!-- wp:core-embed/youtube /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
			<!-- wp:latest-posts {"postsToShow":4,"displayPostContent":true,"excerptLength":20,"displayAuthor":true,"displayPostDate":true} /-->
			</div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->
			',
		)
	);

}
