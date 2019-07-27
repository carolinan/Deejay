<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Deejay
 */

if ( ! function_exists( 'deejay_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function deejay_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

		$byline = sprintf( esc_html_x( 'by %s', 'post author', 'deejay' ), '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>' );
		echo $posted_on . ' ' . $byline; // WPCS: XSS OK.
	}
}

if ( ! function_exists( 'deejay_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function deejay_entry_footer() {
		// Hide category and tag text for pages.
		// Icons representing text needs to have a fallback for screen readers.
		if ( 'post' === get_post_type() ) {

			$categories_list = get_the_category_list( '&#183;' );
			if ( $categories_list ) {
				echo '<span class="entry-meta">' . esc_html__( 'Categories: ', 'deejay' ) . $categories_list . '</span>'; // WPCS: XSS OK.
			}

			$tags_list = get_the_tag_list( '', '&#183;' );
			if ( $tags_list ) {
				echo '<span class="entry-meta">' . esc_html__( 'Tags: ', 'deejay' ) . $tags_list . '</span>'; // WPCS: XSS OK.
			}
		}

		/* Display Jetpack's share if it's active. */
		if ( function_exists( 'sharing_display' ) ) {
			echo sharing_display();
		}

		/* Display Jetpack's like if it's active. */
		if ( class_exists( 'Jetpack_Likes' ) ) {
			$deejay_custom_likes = new Jetpack_Likes();
			echo $deejay_custom_likes->post_likes( '' );
		}

		/* Display Jetpack's related posts if it's active. */
		if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
			echo do_shortcode( '[jetpack-related-posts]' );
		}
	}
} // End if().

if ( ! function_exists( 'deejay_post_title' ) ) {
	/**
	 * Add a title to posts that are missing titles.
	 */
	function deejay_post_title( $title ) {
		if ( $title == '' ) {
			return esc_html__( '(Untitled)', 'deejay' );
		} else {
			return $title;
		}
	}

	add_filter( 'the_title', 'deejay_post_title' );
}

/**
 * Add screen reader text to the image attachment navigation.
*/
if ( ! function_exists( 'deejay_prev_img_nav' ) ) {
	function deejay_prev_img_nav( $img_link ) {
		return str_replace( '</a>', '<span class="screen-reader-text">' . esc_html__( 'Previous image', 'deejay' ) . '</span></a>', $img_link );
	}
	add_filter( 'previous_image_link', 'deejay_prev_img_nav' );
}

if ( ! function_exists( 'deejay_next_img_nav' ) ) {
	function deejay_next_img_nav( $img_link ) {
		return str_replace( '</a>', '<span class="screen-reader-text">' . esc_html__( 'Next image', 'deejay' ) . '</span></a>', $img_link );
	}
	add_filter( 'next_image_link', 'deejay_next_img_nav' );
}
