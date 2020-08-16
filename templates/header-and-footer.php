<?php
/**
 * Template Name: Header & Footer
 * Description: A Page Template that displays header and footer.
 * Important:  This template does not display your page content.
 *
 * @package Deejay
 */

get_header();

if ( is_front_page() && is_active_sidebar( 'sidebar-2' ) ) {
	?>
	<div class="widget-area" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- #secondary -->
	<?php
}
get_footer();
