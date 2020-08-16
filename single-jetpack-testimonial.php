<?php
/**
 * The template for displaying single Jetpack testimonials.
 *
 * @package Deejay
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'thumbnail' );
				}
				echo deejay_get_svg( array( 'icon' => 'quote-right' ) );
				?>
				<div class="testimonial-content">
				<?php
				the_content();
				?>
				</div><!-- .testimonial-content -->
				<?php the_title( '<span class="testimonial-by">', '</span>' ); ?>
			</article><!-- #post-## -->
			<?php
		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
