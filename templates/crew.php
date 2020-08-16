<?php
/**
 * Template Name: Crew
 * Description: A Page Template that displays your selected number of users.
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
					for ( $i = 1; $i < 9; $i++ ) {
						$crewmember = get_user_by( 'ID', get_theme_mod( 'deejay_crew_member' . $i ) );
						if ( ! empty( $crewmember ) ) {
							echo '<div class="crew-member">';
							echo get_avatar( $crewmember->user_email ) . '<br>';

							if ( count_user_posts( $crewmember->ID ) ) {
								echo '<a href="' . esc_url( get_author_posts_url( $crewmember->ID ) ) . '">' . esc_html( $crewmember->display_name ) . '</a>';
							} elseif ( $crewmember->user_url ) {
									echo '<a href="' . esc_url( $crewmember->user_url ) . '">' . esc_html( $crewmember->display_name ) . '</a>';
							} else {
								echo esc_html( $crewmember->display_name );
							}
							echo '<br>';
							echo '<span class="crew-description">' . get_user_meta( $crewmember->ID, 'description', true ) . '</span>';
							echo '</div>';
						}
					}

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

			<?php
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
