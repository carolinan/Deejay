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
	<?php deejay_posted_on();
	/**
	* Support for Jetpack Portfolio. This requires the Jetpack plugin to be installed.
	* https://en.support.wordpress.com/portfolios/
	*/
	if ( 'jetpack-portfolio' === get_post_type() ) {
		echo '<span class="jetpack-portfolio-link"><a href="' . esc_url( home_url( '/portfolio/' ) ) . '">' . esc_html__( 'View Portfolio','deejay' ) . '</a>
		</span>';
		echo the_terms( $post->ID, 'jetpack-portfolio-type', '<span class="jetpack-portfolio-type cat-links">' . esc_html__( 'Project Type: ','deejay' ) ,', ',
		'</span>' );
		echo the_terms( $post->ID, 'jetpack-portfolio-tag', '<span class="tags-links">',', ', '</span>' );
	}
	?>		
	</div><!-- .entry-meta -->
<?php
}
?>
</header><!-- .entry-header -->
<?php
if ( ! is_single() && 'video' == ! has_post_format() ) {
	echo '<div class="entry-summary">';
	the_excerpt();
	echo '</div>';
} else {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	}

	echo '<div class="entry-content">';
	the_content();

	wp_link_pages( array(
		'before' => '<div class="entry-meta">' . esc_html__( 'Pages:', 'deejay' ),
		'after'  => '</div>',
	) );
	echo '</div><!-- .entry-content -->';
}
?>
<footer class="entry-footer">
	<?php deejay_entry_footer(); ?>
</footer><!-- .entry-footer -->
</article><!-- #post-## -->
