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
	<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Footer Content', 'deejay' ); ?></h2>
		<?php
		if ( is_active_sidebar( 'sidebar-3' ) ) {
		?>
			<aside class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</aside>
		<?php
		}
		if ( has_nav_menu( 'social' ) ) { ?>
			<nav class="social-menu" role="navigation" aria-label="<?php esc_attr_e( 'Social Media Links', 'deejay' ); ?>" 
			itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'fallback_cb' => false, 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>' ) ); ?>
			</nav><!-- #social-menu -->
		<?php }; ?>

		<div class="site-info">
		<?php if ( is_active_sidebar( 'sidebar-4' ) ) { ?>
			<aside class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</aside>
		<?php }	?>
		<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'deejay' ) ); ?>"><?php printf( esc_html( 'Proudly powered by %s', 'deejay' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
		<a href="<?php echo esc_url( 'http://wptema.se/deejay' ); ?>" rel="nofollow"><?php printf( esc_html( 'Theme: %1$s by Carolina', 'deejay' ), 'Deejay' ); ?></a>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
