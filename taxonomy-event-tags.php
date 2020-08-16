<?php
/**
 * The template for displaying the Events Mananger Event Tags archive.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Deejay
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
			</header><!-- .page-header -->
			<?php
			$args  = array(
				'post_type' => 'event',
				'tax_query' => array(
					'taxonomy' => 'event_tags',
				),
			);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				?>
				<section class="post-wrap">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
						<header class="entry-header">
							<?php
							if ( has_post_thumbnail() ) {
								echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
								the_post_thumbnail();
								echo '</a>';
							}
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							?>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						<footer class="entry-footer">
							<?php deejay_entry_footer(); ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-## -->
					<?php
				} // End of the loop.
				?>
				</section>
				<?php
			}
			wp_reset_postdata();
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
