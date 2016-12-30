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
	<?php if ( function_exists( 'jetpack_breadcrumbs' ) ) : ?>
		<span class="screen-reader-text"><?php esc_html_e( 'Breadcrumb Navigation', 'deejay' ); ?></span>
		<div class="breadcrumb-area">
	      	<?php jetpack_breadcrumbs(); ?>
		</div><!-- .breadcrumb-area -->
	<?php endif; ?>
	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<div class="entry-meta">' . esc_html__( 'Pages:', 'deejay' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer"></footer><!-- .entry-footer -->
</article><!-- #post-## -->
