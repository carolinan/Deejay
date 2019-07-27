<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Deejay
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<?php if ( function_exists( 'jetpack_breadcrumbs' ) ) { ?>
		<span class="screen-reader-text"><?php esc_html_e( 'Breadcrumb Navigation', 'deejay' ); ?></span>
		<div class="breadcrumb-area">
			<?php jetpack_breadcrumbs(); ?>
		</div><!-- .breadcrumb-area -->
	<?php } ?>
	<div class="entry-content">
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
	<footer class="entry-footer">
		<?php
		/* Display jetpack's share if it's active. */
		if ( function_exists( 'sharing_display' ) ) {
			echo sharing_display();
		}

		/* Display jetpack's like if it's active. */
		if ( class_exists( 'Jetpack_Likes' ) ) {
			$deejay_custom_likes = new Jetpack_Likes();
			echo $deejay_custom_likes->post_likes( '' );
		}
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
