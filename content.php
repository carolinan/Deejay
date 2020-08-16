<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Deejay
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
<header class="entry-header">
<?php
if ( is_single() ) {
	the_title( '<h1 class="entry-title">', '</h1>' );
} else {
	if ( has_post_thumbnail() ) {
		echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
		the_post_thumbnail();
		echo '</a>';
	}
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
}

if ( 'post' === get_post_type() || 'jetpack-portfolio' === get_post_type() ) {
	?>
	<div class="entry-meta">
	<?php
	deejay_posted_on();
	/**
	 * Support for Jetpack Portfolio. This requires the Jetpack plugin to be installed.
	 * https://en.support.wordpress.com/portfolios/
	 */
	if ( 'jetpack-portfolio' === get_post_type() ) {
		echo the_terms( $post->ID, 'jetpack-portfolio-type', '<span class="jetpack-portfolio-type">' . esc_html__( 'Project Type: ', 'deejay' ), '&#183', '</span>' );
		echo the_terms( $post->ID, 'jetpack-portfolio-tag', '<span class="jetpack-portfolio-tag">' . esc_html__( 'Tags: ', 'deejay' ), '&#183', '</span>' );
	}
	?>
	</div><!-- .entry-meta -->
	<?php
}
?>
</header><!-- .entry-header -->

<?php
if ( ! is_single() && ! has_post_format( 'video' ) && ! has_post_format( 'audio' ) ) {
	echo '<div class="entry-summary">';
	the_excerpt();
	echo '</div>';

} elseif ( ! is_single() && has_post_format( 'video' ) ) {
	echo '<div class="entry-summary">';
	if ( hybrid_media_grabber() ) {
		echo hybrid_media_grabber(
			array(
				'type' => 'video',
			)
		);
	} else {
		the_excerpt();
	}
	echo '</div>';

} elseif ( ! is_single() && has_post_format( 'audio' ) ) {
	echo '<div class="entry-summary">';
	if ( hybrid_media_grabber() ) {
		echo hybrid_media_grabber(
			array(
				'type' => 'audio',
			)
		);
	} else {
		the_excerpt();
	}
	echo '</div>';
} else {

	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	}

	echo '<div class="entry-content">';
	the_content();

	wp_link_pages(
		array(
			'before' => '<div class="entry-meta nextpage">' . esc_html__( 'Pages:', 'deejay' ),
			'after'  => '</div>',
		)
	);
	echo '</div><!-- .entry-content -->';
} // End if().
?>
<footer class="entry-footer">
	<?php deejay_entry_footer(); ?>
</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php
if ( is_single() && get_theme_mod( 'deejay_post_navigation', false ) === true ) {
	the_post_navigation();
}
