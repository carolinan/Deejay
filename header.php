<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Deejay
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'deejay' ); ?></a>

<nav id="site-navigation" class="main-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	<?php
	if ( display_header_text() ) { ?>
		<span class="responsive-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
		<?php
		if ( get_bloginfo( 'description' ) ) {
		?>
			<span class="responsive-site-description"><?php bloginfo( 'description' )?></span>
		<?php
		}
	}
	?>
	<span class="responsive-logo"><?php the_custom_logo(); ?></span>
	<button id="mobile-menu-toggle" aria-controls="top-bar-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'deejay' ); ?></button>
	<?php
	wp_nav_menu( array( 'theme_location' => 'bar', 'menu_id' => 'top-bar-menu', 'depth' => 3, 'container' => false ) );

	if ( has_nav_menu( 'social' ) ) { ?>
		<nav class="social-menu" role="navigation" aria-label="<?php esc_attr_e( 'Social media links', 'deejay' ); ?>">
			<?php wp_nav_menu( array(
				'theme_location' => 'social',
				'fallback_cb' => false,
				'depth' => 1,
				'container' => false,
				'link_before' => '<span class="screen-reader-text">',
				'link_after' => '</span>',
			) );
			?>
		</nav>
	<?php
	}
	?>
</nav>

<?php
if ( is_front_page() ) {
?>
	<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<?php
	if ( has_header_video() && is_header_video_active() ) {
		the_custom_header_markup();
	}

	if ( display_header_text() || has_custom_logo() ) { ?>
		<div class="site-branding">
		<?php
		if ( display_header_text() ) {
		?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			if ( get_bloginfo( 'description' ) ) { ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php
			}
		}
		the_custom_logo();
		?>
		</div>
	<?php
	}

	if ( has_nav_menu( 'header' ) ) { ?>
		<nav id="header-navigation" class="header-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		<?php wp_nav_menu( array( 'theme_location' => 'header', 'depth' => 1 ) ); ?>
		</nav>
	<?php
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
	?>
		<aside class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside>
	<?php
	}
	?>
	</header>
<?php
} // End if().
?>
<div id="content" class="site-content">
