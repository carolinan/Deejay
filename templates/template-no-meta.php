<?php
/**
 * Template Name: No Meta
 * Template Post Type: post

 * Template part for displaying posts without the date, author name, categories and tags.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Deejay
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) :
				the_post();
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
				</article><!-- #post-## -->
				<?php

				if ( get_theme_mod( 'deejay_postnav' ) && ! is_attachment() ) {
					the_post_navigation(
						array(
							'prev_text' => __( 'Previous', 'deejay' ),
							'next_text' => __( 'Next', 'deejay' ),
						)
					);
				}
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile;
		} // End if().
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
