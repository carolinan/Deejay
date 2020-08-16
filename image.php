<?php
/**
 * The template for displaying all image attachments.
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
				<header class="entry-header"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></header><!-- .entry-header -->
				<div class="entry-content">
					<figure class="gallery-item">
						<?php
						the_attachment_link( get_the_ID(), true );

						if ( wp_get_attachment_caption( get_the_ID() ) ) {
							echo '<figcaption class="wp-caption-text">' . esc_html( wp_get_attachment_caption( get_the_ID() ) ) . '</figcaption>';
						}
						?>
					</figure>
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="entry-meta nextpage">' . esc_html__( 'Pages:', 'deejay' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->
				<footer class="entry-footer"><?php deejay_entry_footer(); ?></footer><!-- .entry-footer -->
			</article><!-- #post-## -->
			<?php
			if ( get_theme_mod( 'deejay_postnav' ) ) {
				?>
				<nav class="navigation post-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Image Attachment Navigation', 'deejay' ); ?>">
					<div class="nav-links">
						<div class="gallery-item"><?php previous_image_link( 'thumbnail' ); ?></div>
						<div class="gallery-item"><?php next_image_link( 'thumbnail' ); ?></div>
					</div>
				</nav>
				<?php
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( is_front_page() && is_active_sidebar( 'sidebar-2' ) ) {
	?>
	<aside class="widget-area" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</aside><!-- #secondary -->
	<?php
}
get_footer();
