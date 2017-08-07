=== Deejay ===
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Copyright Carolina Nymark 2016-2017.

Demo: deejay.wptema.se

Important Notes:

The header widget area is only visible on the front page and only has room for 3 widgets.
The space is somewhat limited, so carefully select widgets that will fit inside the area.
At 960px width, only the first header widget will be shown.

The mobile menu and the social menu does not show submenus.
I recommend a short site title and max 3 or 4 header menu items for the title and menu to align properly.

The testimonial widget requires the Jetpack plugin. https://wordpress.org/plugins/jetpack/

== Installation ==
	
1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== To do ==
Text color options.
Update WooCommerce css to better match the theme colors.
Add WooCommerce cart to the menu.
rtl.

== Changelog ==

= 1.9 - August 7 2017 =
Changed the screenshot -lets not have recognisable people in it.
Updated the custom recent posts widget:
	The featured image is now displayed in a smaller size, 150x150, side by side with the post title instead of above it.
	The image is displayed on the left, and the title to the right.
Added a print style.
Added an editor style.
Added two tags to style.css: editor-style, featured-images.
Minor code styling changes: tabs instead of spaces.
Updated the "Get started here" link (index.php)
Removed the role attribute from main, nav, header and aside.


= 1.8 - May 26 2017 =
Fixed a problem with the site title color.
Fixed a problem with the styling for the navigation bar fallback menu.

= 1.7 - May 23 2017 =
Added a solid background color to the header widgets when header media is used.
Updated the screenshot to better match the default colors.


= 1.6 - May 19 2017 =
Header.php: Re-added the h1 meant for screen readers in case the site-title is hidden.
Assured that there is only one h1 in the standard markup for the archives and the single post- or page views.
Corrected the heading levels on posts that has no comments but where comments are open. 
Increased the contrast of the video header play and pause buttons.
Removed an empty h2 tag from the 404.


= 1.5 - May 14 2017 =
The header is now visible on all pages, but has a smaller size than on the front page. The header widgets are only shown on the front page.
Added an option to hide the footer credit links.
Added an option to change the number of columns of the post listing.
CSS changes: improved color options, the responsive menu and plugin styling.
Added support for menu descriptions for the header menu.
Added svg icons.
Added 3 custom widgets: 
	One that shows recent posts with featured images.
	One that shows recent comments with the actual comment content.
	One that shows Jetpack Testimonials.
Added a post template that hides the date, author name, categories and tags on individual posts.


= 1.4 - March 20 2017 =
Corrected two errors with the translation of the footer credit links.
Removed the "View portfolio" link from individual projects.


= 1.3 - March 13 2017 =
Logo position improvements.
Made sure that long site titles and descriptions wrap correctly.
Improved documentation.
Added author URI.
Reduced image size.
Improved the styling of the pagination.


= 1.2 - January 21 2017 =
CSS improvements, including border corners for sticky posts, menu spacing and tables.
Moved the mobile/responsive menu button below the site title.
Corrected an issue with the color options in the customizer.
Added the Hybrid Media Grabber to display content for the video and audio post formats.
Added a Home menu item. (Todo: This will eventually be optional.)
Removed an unused image size and increased the content_width.

= 1.1 - December 29 2016 =
CSS improvements.
Added support for the audio post format.
Improved support for Jetpack.
	-Infinite Scroll.
	-Breadcrumbs.
	-Portfolio.
Added a Go to top button in the footer.
Fixed a problem with the keyboard navigation.


= 1.0 - December 22 2016 =
* Initial release


== Credits ==

* Based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2015 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Hybrid Media Grabber Copyright (c) 2008 - 2015, Justin Tadlock -http://themehybrid.com/hybrid-core [GPLv2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
* Checkbox sanitization Copyright (c) 2015, WordPress Theme Review Team, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
  https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
* Keyboard Accessible Dropdown Menus Copyright 2013 Amy Hendrix, Graham Armfield [MIT](http://opensource.org/licenses/MIT) 
  http://github.com/sabreuse/accessible-menus
* CSS animated border: Copyright (c) 2016 by Arsen Zbidniakov (http://codepen.io/ARS/pen/vEwEPP) [MIT](http://opensource.org/licenses/MIT)
* CSS border corners: Copyright (c) 2017 by Patrick Little (http://codepen.io/patricklittle/pen/GJyqyN) [MIT](http://opensource.org/licenses/MIT)
* Header image (remix.png): Copyright Marcela Laskoski. (https://unsplash.com/@ponicornio?photo=YrtFlrLo2DQ) License: CC0.
* Smaller image used in the screenshot: Copyright Stephen Niemeier. License: CC0. Source: https://www.pexels.com/photo/table-music-power-sound-63703/
* SVG icons: Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org, License: GPLv2 or later
  Font Awesome icons, Copyright Dave Gandy, License: SIL Open Font License, version 1.1. Source: http://fontawesome.io/
* Menu description: Twenty Fifteen WordPress Theme, Copyright 2014-2016 WordPress.org & Automattic.com, License: GPLv2 or later

