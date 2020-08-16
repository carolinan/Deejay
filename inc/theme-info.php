<?php
/**
 * Documentation for Deejay WordPress theme.
 *
 * @package Deejay
 */

/**
 * Add the menu item under Appearance, themes.
 */
function deejay_docs_menu() {
	add_theme_page(
		__( 'Deejay Setup Help', 'deejay' ),
		__( 'Deejay Setup Help', 'deejay' ),
		'edit_theme_options',
		'deejay-theme',
		'deejay_docs'
	);
}
add_action( 'admin_menu', 'deejay_docs_menu' );

/**
 * Create the doucmentation page.
 */
function deejay_docs() {
	?>
	<div class="wrap">
	<div class="welcome-panel">
	<div class="welcome-panel-content">
	<h1><?php esc_html_e( 'Deejay Setup Help', 'deejay' ); ?></h1>
	<br>
	<p class="about-description">
	<?php
	esc_html_e( 'Thank you for downloading and trying out Deejay.', 'deejay' );
	echo '<br>';
	printf(
		/* translators: %s: A link to the themes support page on WordPress.org  */
		__( 'If you like the theme, please review it on <a href="%s">WordPress.org</a>', 'deejay' ),
		esc_url( 'https://wordpress.org/support/view/theme-reviews/deejay' )
	);
	?>
	</p><br>
	<div class="welcome-panel-column-container">
	<div>
	<h2><?php esc_html_e( 'Personalize your theme:', 'deejay' ); ?></h2>
	<a class="button button-primary button-hero load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>">
	<?php esc_html_e( 'Add a logo', 'deejay' ); ?></a>
	<a class="button button-primary button-hero load-customize" 
	href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>">
	<?php esc_html_e( 'Add a header image or video', 'deejay' ); ?></a>
	<a class="button button-primary button-hero load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_topbar_bgcolor' ) ); ?>">
	<?php esc_html_e( 'Mix your favorite colors', 'deejay' ); ?></a>
	<a class="button button-primary button-hero load-customize" 
	href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=nav_menus' ) ); ?>">
	<?php esc_html_e( 'Set up the menus', 'deejay' ); ?></a>
	<a class="button button-medium button-hero load-customize" href="<?php echo esc_url( '#support' ); ?>"><?php esc_html_e( 'Support & Customization', 'deejay' ); ?></a>
	<br><br>
	</div>
	</div>
	</div>
	</div>

	<div class="welcome-panel">
	<div class="welcome-panel-content">
	<h2><?php esc_html_e( 'Theme Documentation & Setup', 'deejay' ); ?></h2>
		<nav>
		<ul class="subsubsub">
			<li><a href="#header"><?php esc_html_e( 'Header', 'deejay' ); ?></a></li>
			<li><a href="#menus"><?php esc_html_e( 'Menus', 'deejay' ); ?></a></li>
			<li><a href="#widgets"><?php esc_html_e( 'Widgets', 'deejay' ); ?></a></li>
			<li><a href="#blog"><?php esc_html_e( 'Blog, Archve and Search', 'deejay' ); ?></a></li>
			<li><a href="#posts"><?php esc_html_e( 'Posts', 'deejay' ); ?></a></li>
			<li><a href="#footer"><?php esc_html_e( 'Footer', 'deejay' ); ?></a></li>
		</ul>
	</nav>
	<br>
	<h3 id="header"><?php esc_html_e( 'Header', 'deejay' ); ?></h3>
	<?php esc_html_e( 'Deejay has several options where you can customize your header.', 'deejay' ); ?>
	<br>
	<?php esc_html_e( 'Using a header image or video is optional. If you want to use a header image, the recommended size is 1900 X 860 pixels.', 'deejay' ); ?>
	<br><a class="button button-medium load-customize"
	href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>">
	<?php esc_html_e( 'Add a header image', 'deejay' ); ?></a>
	&nbsp;
	<a class="button button-medium load-customize"
	href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=external_header_video' ) ); ?>">
	<?php esc_html_e( 'Add a header video', 'deejay' ); ?></a>
	<br><br>
	<?php esc_html_e( 'The logo is shown in the header area, next to your Site title. The recommended size for the logo is 150 x 200 pixels.', 'deejay' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>"><?php esc_html_e( 'Add a logo', 'deejay' ); ?></a>
	<br><br>
	<?php esc_html_e( 'You can strengthen your branding further by adding a Site icon (favicon).', 'deejay' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=site_icon' ) ); ?>"><?php esc_html_e( 'Add a site icon', 'deejay' ); ?></a>
	&nbsp;
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_menu_site_icon' ) ); ?>"><?php esc_html_e( 'Add the site icon to the menu', 'deejay' ); ?></a>
	<br><br>
	<?php esc_html_e( 'Deejay has two different responsive header styles:', 'deejay' ); ?>
	<br>	
	<?php esc_html_e( 'The default mobile header is a simplified, scaled down version that does not display the header image, the header menu or the front page widgets.', 'deejay' ); ?>
	<br>
	<?php esc_html_e( 'This is to reduce loading times and to make it easier for the user to access the content directly.', 'deejay' ); ?>
	<br>
	<?php esc_html_e( 'The optional advanced mobile header shows the header image and the header menu, while the front page widgets are displayed below the header, above the content.', 'deejay' ); ?>
	<br><a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_advanced_header' ) ); ?>">
	<?php esc_html_e( 'Enable the advanced mobile header', 'deejay' ); ?></a>
	<br><br>
	<?php esc_html_e( 'In case your header image does not fit well on single posts and pages, you can select a color that will replace the header image on all pages except the front page.', 'deejay' ); ?>
	<br><a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_header_bgcolor' ) ); ?>">
	<?php esc_html_e( 'Select an optional header background color', 'deejay' ); ?></a>
	<h3 id="menus"><?php esc_html_e( 'Menus', 'deejay' ); ?></h3>
	<?php esc_html_e( 'The theme has three menu locations: The top navigation bar, header menu, and social menu.', 'deejay' ); ?>
	<div class="welcome-icon welcome-widgets-menus" style="margin:6px 0;"><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Manage menus', 'deejay' ); ?></a>
	</div>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_sticky_menu' ) ); ?>">
	<?php esc_html_e( 'Stick the Top Navigation Bar to the top of the page', 'deejay' ); ?></a>
	<br><br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_display_search' ) ); ?>">
	<?php esc_html_e( 'Show a search form in the top navigation bar', 'deejay' ); ?></a>
	<br><br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_topbar_bgcolor' ) ); ?>">
	<?php esc_html_e( 'Select a background color for the top navigation bar', 'deejay' ); ?></a>
	<br><br>
	<?php esc_html_e( 'The top navigation bar uses a priority menu which shows a different number of menu items depending on the screensize.', 'deejay' ); ?>
	<br><a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_hide_priority_menu' ) ); ?>">
	<?php esc_html_e( 'Turn off the priority menu for mobile devices', 'deejay' ); ?></a>
	<br><br>
	<?php esc_html_e( 'When you activate the social menu, it is also visible in the site footer.', 'deejay' ); ?>
	<br><a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_hide_footer_social_links' ) ); ?>">
	<?php esc_html_e( 'Hide the footer menu', 'deejay' ); ?></a>
	<br>
	<h4 style="margin-bottom:6px;"><?php esc_html_e( '-How to add a social menu:', 'deejay' ); ?></h4>
	<?php esc_html_e( 'The social menu uses svg icons to represent the social media links.', 'deejay' ); ?>
	<?php echo esc_html_x( 'It does not display any text, but has additional information for screen readers.', 'the social menu', 'deejay' ); ?><br>
	<?php esc_html_e( 'The icons will be added automatically, all you need to do is add a link to your menu.', 'deejay' ); ?>
	<br>
	<?php esc_html_e( 'Create a new menu, then click on Custom links and add your URL.', 'deejay' ); ?>
	<br>
	<?php esc_html_e( 'The Link Text that you provide is used as screen reader text.', 'deejay' ); ?><br>
	<img style="margin:6px 0;" src="<?php echo esc_url( get_template_directory_uri() . '/images/doc-social2.jpg' ); ?>" 
		alt="<?php esc_attr_e( 'An image describing where to add URLS for the social menu.', 'deejay' ); ?>"><br>
	<?php esc_html_e( 'Choose the theme location named Social Menu, and save.', 'deejay' ); ?><br>
	<img style="margin:6px 0;" src="<?php echo esc_url( get_template_directory_uri() . '/images/doc-social3.jpg' ); ?>" 
		alt="<?php esc_attr_e( 'An image describing what the social menu will look like when a theme location has been picked.', 'deejay' ); ?>">
	<br>
	<div class="notice notice-info inline"><?php esc_html_e( 'Troubleshooting: If your link or icon is not showing up, try using lower case letters.', 'deejay' ); ?></div>
	<b><?php esc_html_e( 'Available icons:', 'deejay' ); ?></b><br>
	<i style="display:block; max-width:340px;">
	<?php esc_html_e( 'codepen deezer deviantart digg dribbble dropbox facebook flickr foursquare google-play github instagram linkedin mail medium pinterest pocket reddit skype slideshare snapchat soundcloud spotify stumbleupon tumblr twitch twitter vimeo vine vk wordpress yelp youtube mixcloud bandcamp slack itunes appstore amazon,', 'deejay' ); ?>
	</i>
	<h3 id="widgets"><?php esc_html_e( 'Widgets', 'deejay' ); ?></h3>
	<?php esc_html_e( 'The theme has four widget areas:', 'deejay' ); ?>
	<ul>
		<li><?php esc_html_e( 'Front Page Widgets: Header.', 'deejay' ); ?></li>
		<li><?php esc_html_e( 'Front Page Widget: Below the content.', 'deejay' ); ?></li>
		<li><?php esc_html_e( 'Footer Widgets: -Visible on all pages.', 'deejay' ); ?></li>
		<li><?php esc_html_e( 'Footer Copyright: -Visible on all pages.', 'deejay' ); ?></li>
	</ul>
	<div class="welcome-icon welcome-widgets-menus">
	<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add widgets', 'deejay' ); ?></a>
	</div>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_header_widget_bgcolor' ) ); ?>">
	<?php esc_html_e( 'Select an optional header widget background color', 'deejay' ); ?></a>
	<br><br>
	<div class="notice notice-info inline">
	<?php esc_html_e( 'Important: The header widget area is only visible on the front page and only has room for 3 widgets.', 'deejay' ); ?>
	<br><?php esc_html_e( 'If your header image is too small, your header widgets will not show.', 'deejay' ); ?>
	<br><?php esc_html_e( 'The space is somewhat limited, so carefully select widgets that will fit inside the area.', 'deejay' ); ?>
	<br>
	<?php esc_html_e( '* At 960px width, only the first header widget will be shown', 'deejay' ); ?>
	<br>
	<?php esc_html_e( '* At 780px width, the header widgets are hidden unless you activate the advanced mobile header.', 'deejay' ); ?>
	</div>
	<h3 id="blog"><?php esc_html_e( 'Blog, Archives and search', 'deejay' ); ?></h3>
	<?php esc_html_e( 'Posts are listed in a responsive 3 column grid. On smaller screensizes like mobile phones, a one column grid is used.', 'deejay' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_grid_size' ) ); ?>"><?php esc_html_e( 'Change the number of columns', 'deejay' ); ?></a>
	<h3 id="posts"><?php esc_html_e( 'Posts', 'deejay' ); ?></h3>
	<?php esc_html_e( 'By default, single posts does not show the next and previous post navigation.', 'deejay' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_postnav' ) ); ?>">
	<?php esc_html_e( 'Enable post navigation', 'deejay' ); ?></a>
	<h3 id="footer"><?php esc_html_e( 'Footer', 'deejay' ); ?></h3>
	<?php esc_html_e( 'Deejay has the following footer settings:', 'deejay' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_footer_bgcolor' ) ); ?>">
	<?php esc_html_e( 'Select an optional footer background color', 'deejay' ); ?></a>
	<br><br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_hide_credits' ) ); ?>">
	<?php esc_html_e( 'Hide the footer credit links', 'deejay' ); ?></a>
	&nbsp;
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=deejay_hide_gototop' ) ); ?>">
	<?php esc_html_e( 'Hide the go to top link', 'deejay' ); ?></a>
	<br><br>
	</div>
	</div>
	<div class="welcome-panel">
	<div class="welcome-panel-content" id="support">
	<h2><?php esc_html_e( 'Support & Customization', 'deejay' ); ?></h2>
	<?php esc_html_e( 'If you have questions, if you wish to purchase customizations or if something is not working as expected, you can also email me to check my availability and I will reply as soon as I can.', 'deejay' ); ?>
	<br>
	<a class="button button-medium button-hero load-customize" href="mailto:carolina@themesbycarolina.com"><?php esc_html_e( 'Contact', 'deejay' ); ?></a>
	<br><br>
	<?php
	printf(
		/* translators: %s: A link to the themes support page on WordPress.org  */
		__( 'You can also visit the <a href="%s">official support forum</a>.', 'deejay' ),
		esc_url( 'https://wordpress.org/support/theme/deejay' )
	);
	?>
	<br><br>
	</div>
	</div>
	<?php
}
