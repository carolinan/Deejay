<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Deejay
 */

?>
</div><!-- #content -->
	<footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter" role="contentinfo">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Footer Content', 'deejay' ); ?></h2>
		<?php
		if ( is_active_sidebar( 'sidebar-3' ) ) {
			?>
			<aside class="widget-area" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</aside>
			<?php
		}
		if ( has_nav_menu( 'social' ) && ! get_theme_mod( 'deejay_hide_footer_social_links' ) ) {
			?>
			<nav class="social-menu" aria-label="<?php esc_attr_e( 'Footer Social Media Links', 'deejay' ); ?>" 
			itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . deejay_get_svg( array( 'icon' => 'chain' ) ),
					'container'      => false,
				)
			);
			?>
			</nav><!-- #social-menu -->
		<?php }; ?>

		<div class="site-info">
			<?php
			if ( is_active_sidebar( 'sidebar-4' ) ) {
				?>
				<aside class="widget-area" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</aside>
				<?php
			}

			if ( ! get_theme_mod( 'deejay_hide_credits' ) ) {
				?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'deejay' ) ); ?>" class="credit"><?php printf( esc_html__( 'Proudly powered by %s', 'deejay' ), 'WordPress' ); ?></a>
				<?php
				if ( ! get_theme_mod( 'deejay_hide_gototop' ) ) {
					?>
					<div class="go-to-top">
						<a href="#page"><?php echo deejay_get_svg( array( 'icon' => 'angle-down' ) ); ?><span class="screen-reader-text"><?php esc_html_e( 'Go to the top', 'deejay' ); ?></span></a>
					</div>
					<?php
				} else {
					echo '&nbsp;|&nbsp;';
				}
				?>
				<a href="<?php echo esc_url( 'https://themesbycarolina.com/' ); ?>" rel="nofollow" class="theme-credit"><?php /* translators: 1: Theme name */ printf( esc_html__( 'Theme: %1$s by Carolina', 'deejay' ), 'Deejay' ); ?></a>
				<?php
			} else {
				if ( ! get_theme_mod( 'deejay_hide_gototop' ) ) {
					?>
					<div class="go-to-top">
						<a href="#page"><?php echo deejay_get_svg( array( 'icon' => 'angle-down' ) ); ?><span class="screen-reader-text"><?php esc_html_e( 'Go to the top', 'deejay' ); ?></span></a>
					</div>
					<?php
				}
			}
			?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
wp_footer();
?>
</body>
</html>
