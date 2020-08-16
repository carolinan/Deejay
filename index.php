<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
				?>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Portfolio', 'deejay' ); ?></h1>
				</header><!-- .page-header -->
				<?php
			} elseif ( is_archive() ) {
				?>
				<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				</header><!-- .page-header -->
				<?php
			} elseif ( is_search() ) {
				?>
				<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: seach terms */
					printf( esc_html__( 'Search Results for: %s', 'deejay' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
				</header><!-- .page-header -->
				<?php
			}
			?>
			<section class="post-wrap">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
				?>
			</section>
			<?php
			the_posts_pagination( array( 'type' => 'list' ) );
		} else {
			// Nothing was found.
			?>
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'deejay' ); ?></h1>
			</header><!-- .page-header -->
			<article class="grid">
			<div class="entry-meta">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) {
				?>
				<p>
				<?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'deejay' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
				</p>
				<?php
			} elseif ( is_search() ) {
				?>
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'deejay' ); ?></p>
				<?php
				get_search_form();
			} elseif ( is_404() ) {
				?>
				<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found. Perhaps searching can help.', 'deejay' ); ?></p><br/>
				<?php get_search_form(); ?>
				<br/>
				<?php
			} else {
				?>
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'deejay' ); ?></p><br/>
				<?php
				get_search_form();
			} // End if().
			echo '</div></article>';

		} // End if().
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
if ( is_active_sidebar( 'sidebar-2' ) ) {
	?>
	<aside class="widget-area" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</aside><!-- #secondary -->
	<?php
}

get_footer();
