<?php
/**
 * The template for displaying the Jetpack testimonial archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Deejay
 */

get_header(); ?>

	<?php $jetpack_options = get_theme_mod( 'jetpack_testimonials' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
			<h1 class="page-title">
			<?php
			if ( isset( $jetpack_options['page-title'] ) && '' !== $jetpack_options['page-title'] ) {
				echo esc_html( $jetpack_options['page-title'] );
			} else {
				esc_html_e( 'Testimonials', 'deejay' );
			}
			?>
			</h1>
			<?php
			if ( isset( $jetpack_options['featured-image'] ) && '' !== $jetpack_options['featured-image'] ) {
				echo wp_get_attachment_image( (int) $jetpack_options['featured-image'] );
			}
			if ( '' !== $jetpack_options['page-content'] ) {
				echo convert_chars( convert_smilies( wptexturize( stripslashes( wp_filter_post_kses( addslashes( $jetpack_options['page-content'] ) ) ) ) ) );
			}
			?>
			</header><!-- .page-header -->
			<?php
			if ( have_posts() ) {
				?>
				<section class="post-wrap">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'thumbnail' );
						}
						echo deejay_get_svg(
							array(
								'icon' => 'quote-right',
							)
						);
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
				</section>
				<?php
			}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
