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
<html <?php language_attributes(); ?> class="no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'deejay' ); ?></a>
<nav id="site-navigation" class="main-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'deejay' ); ?>">
	<?php
	if ( get_theme_mod( 'deejay_menu_site_icon' ) && has_site_icon() ) {
		if ( is_home() ) {
			echo '<span class="menu-site-icon-link"><img src="' . esc_url( get_site_icon_url( '32' ) ) . '" class="menu-site-icon" alt=""></span>';
		} else {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="menu-site-icon-link"><img src="' . esc_url( get_site_icon_url( '32' ) ) . '" class="menu-site-icon" alt=""></a>';
		}
	}
	?>
	<button id="mobile-menu-toggle" aria-controls="top-bar-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'deejay' ); ?></button>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'bar',
			'menu_id'        => 'top-bar-menu',
			'depth'          => 3,
			'container'      => false,
		)
	);

	echo '<span class="top-bar-right">';

	if ( has_nav_menu( 'social' ) && get_theme_mod( 'deejay_hide_top_social_links', false ) == false ) {
		?>
		<nav class="social-menu" aria-label="<?php esc_attr_e( 'Social media links', 'deejay' ); ?>" role="navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'fallback_cb'    => false,
					'depth'          => 1,
					'container'      => false,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . deejay_get_svg( array( 'icon' => 'chain' ) ),
				)
			);
			?>
		</nav>
		<?php
	}

	if ( get_theme_mod( 'deejay_display_search' ) ) {
		echo '<span class="top-bar-search">';
		echo get_search_form( false );
		echo '</span>';
	}
	?>
	</span>
</nav>
<?php
if ( has_custom_logo() && ! get_theme_mod( 'deejay_advanced_header' ) ) {
	?>
	<span class="responsive-logo"><?php the_custom_logo(); ?></span>
	<?php
}

if ( display_header_text() ) {
	?>
	<span class="responsive-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
	<?php
	if ( get_bloginfo( 'description' ) ) {
		?>
		<span class="responsive-site-description"><?php bloginfo( 'description' ); ?></span>
		<?php
	}
}

if ( is_front_page() ) {
	?>
	<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
	<?php
	if ( has_header_video() && is_header_video_active() ) {
		the_custom_header_markup();
	}

	the_custom_logo();
	if ( display_header_text() ) {
		?>
		<div class="site-branding">
		<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
		<?php
		if ( get_bloginfo( 'description' ) ) {
			?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php
		}
		echo '</div>';
	} else {
		// Make sure there is still a h1 for screen readers.
		?>
		<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
		<?php
	}

	if ( has_nav_menu( 'header' ) ) {
		?>
		<nav id="header-navigation" class="header-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Header navigation', 'deejay' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'header',
				'depth'          => 1,
			)
		);
		?>
		</nav>
		<?php
	}
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		?>
		<div class="widget-area" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
		<?php
	}
	?>
	</header>
	<?php
	if ( get_theme_mod( 'deejay_advanced_header' ) && is_active_sidebar( 'sidebar-1' ) ) {
		?>
		<div class="widget-area advanced-header-widgets" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
		<?php
	}
} else {
	?>
	<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<?php
	the_custom_logo();
	if ( display_header_text() ) {
		?>
		<div class="site-branding">
			<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
			<?php
			if ( get_bloginfo( 'description' ) ) {
				?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php
			}
			?>
		</div>
		<?php
	}

	if ( has_nav_menu( 'header' ) ) {
		?>
		<nav id="header-navigation" class="header-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Header navigation', 'deejay' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'header',
				'depth'          => 1,
			)
		);
		?>
		</nav>
		<?php
	}
	?>
	</header>
	<?php
} // End if().
?>
<div id="content" class="site-content">
