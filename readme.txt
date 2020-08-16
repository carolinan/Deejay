=== Deejay ===
Contributors: poena
Requires at least: 5.0
Tested up to: 5.5
Version: 3.4
Requires PHP: 5.6
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Copyright: Carolina Nymark 2016-2020.

Deejay is an accessibility ready, responsive theme for musicians, DJ's and event planners.

== Description ==
Deejay was designed with musicians, DJ's and event planners in mind. 
The theme is accessibility ready and responsive with multiple menus and widget areas as well as color and layout options, 
including support for a header background video. Deejay has 3 custom widgets for recent posts, 
recent comments and testimonials (The testimonial widget requires Jetpack).
It also uses the audio and video post formats so that you can showcase your music,
and includes a custom post template that lets you hide the author, categories and tags.

Deejay is built to be used with these optional plugins:
Events Manager, WooCommerce or Easy Digital Downloads and Jetpack,
so that you can present your events, sell merchandise, share content or display your portfolio and testimonials. 

Demo: https://demos.themesbycarolina.com/deejay/

== Installation ==
	
1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Important Notes ==

The header widget area is only visible on the front page and only has room for 3 widgets.
The header on the front page is only as big as your header image.
If your header image is too small, your header widgets will not show.
The space is somewhat limited, so carefully select widgets that will fit inside the area.
If you add a video, the header image will be used as a fallback while the video loads.

The social menu does not show submenus.
I recommend a short site title and max 3 or 4 header menu items for the logo, title and menu to align properly.

The theme is responsive and by default it displays a simplified,
scaled down front page on mobile phones and tablets to reduce loading times and to 
make it easier for the user to access the content directly.

* At 960px width, only the first header widget will be shown.
* At 780px width, the header image, the custom header menu, and the header widgets are hidden. 
The logo, site title and the navigation bar are still visible.

If you want to display the full header content on mobile phones and tablets, 
go to the customizer, select the Theme Options panel, and select the advanced mobile header option.
Because the header image is much smaller on mobile devices, 
the widgets will be displayed below the header image, above the content.

The number of items that are shown in the top navigation bar depends on the screen size. 
To view the full menu, press the menu icon that appears on the left hand side.

The testimonial widget requires the Jetpack plugin. https://wordpress.org/plugins/jetpack/
Other recommended plugins:
Events Manager https://wordpress.org/plugins/events-manager/

Profile block pattern
The profile block pattern includes an image,
a heading where you can add your name, a short paragraph
with an example link, social media links, a youtube video,
and latest posts.
You can adjust the latest posts to show posts from a single author, or 
select categories.
You can change the styling or add and remove blocks as you wish.

== To do ==
Update WooCommerce css to better match the theme colors.
Add WooCommerce cart to the menu.

== Changelog ==

= 3.4 - August 15 2020 =
Solved an issue with the focus for the responsive menu.
Updated aria roles and labels.
Improved the visible hover status for some links including the social menu.
Added additional header image controls for the advanced header:
Image size, image position, header height.
Added a block pattern for a user or artist profile. Requires WordPress 5.5 or Gutenberg.
Added theme support for unlinked home page logo.
Added theme support for custom line height.
Added theme support for custom padding and custom units for the cover block. 
See https://developer.wordpress.org/block-editor/developers/themes/theme-support/#support-custom-units

Updated the tested up to version and added it to style.css
Updated credits, replaced the license information for the header image.
Removed two images that are no longer used.
Removed the license information for an image that is no longer used.
Removed theme URI since the page is not maintained.
Tested compatibility with WooCommerce 4.3.3

= 3.3 - November 11 2019 =
CSS: Improvements to match font sizes and font weight between the editor and the front.
CSS: Improved spacing between different block elements.
Fixed a critical problem with the editor dark mode option.
Added a new social media icon: deezer
Removed the google plus social media icon because the service has been discontinued.

= 3.2 - August 11 2019 =
Fixed a text domain issue, sorry! <3

= 3.1 - August 10 2019 =
Fixed a problem with the custom recent comments widget.
Fixed a problem with the search widget submit button.
Added an option to enable the darkmode for the editor. 
-You can find this option in the colors section in the customizer.
CSS improvements to better match the editor and the front.
Minor css improvements for when the classic editor is used.
Updated theme and author URI.
Increased the font size of the content on the blog and archives to improve
accessibility and to better match the font size of the post and page content.


= 3.0 - July 3 2019 =
Split the Customizer files into separate files to organise them better.
Fixed a problem with the sticky menu.
Added an option to hide the Home link in the menu.
Added an option to hide the social menu in the top navigation bar (The menu is shown both in the top navigation bar and the footer by default).
Added an option to move the navigation bar to the footer for mobile views.
Added an option to change the text color of the top navigation bar.
Added an option to change the text color of the footer.
Moved the search icon to the search form submit button.
Minor changes to 404 pages.
Minor color contrast and text size changes to improve accessibility.
Minor changes to page title on the search result page.

= 2.9 - May 8 2019 =
Added support for wp_body_open.
Added a block style for the gallery which hides the image captions.
Updated required WordPress version and PHP version.
Updated the styles for tables to work with the new table block color options.
Added a license file.

= 2.8 - January 26 2019 =
Fixed a couple of critical problems with how the logo is displayed when a header video or the advanced
mobile header is used.
Added a theme documentation page.
Added an option to hide the social menu in the footer.
Added an option to hide the go to top link in the footer.

= 2.7 - November 17 2018 =
Updated readme file.

Added an option for a search form in the top navigation bar.
To maintain the positions of the top social menu and and the search form,
a new span with the class top-bar-right was added to header.php.
The search form is filtered to hide the submit button for the form in the top navigation bar,
unless the menu is toggled. A screen reader text for the submit button will be displayed just below the input field.

= 2.6 - November 8 2018 =
Improved theme support for the new editor:
Centered post and page content.
Chnaged content width to 720px.
Color palette, align wide, block styles, responsive embeds.

Improved support for system fonts:
-You may experience a slight shift in the font styles as the theme is no longer only using "sans-serif" as the font family.
New font-families are: BlinkMacSystemFont, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif.

Additional tests and improvements for the advanced mobile header, 
including header image size, text size and positioning for the site title and the header menu.

Added options for a sticky menu and for disabling the priority menu.

Housekeeping:
Updated links. Removed unused code. Update the screenshot to comply with the latest screenshot requirements.
Added a rtl stylesheet.
Code style updates to better match coding standards.
Fixed an issue where the background color for the widgets did not display if the advanced mobile header was enabled.

= 2.5 - May 30 2018 =
Added an option for an advanced mobile header.
When the advanced header option is active, the header image, site title and description, logo, header menu, and header widgets will be shown.

= 2.4 - February 18 2018 =
Added two new taxonomy template files that are used with the Events Manager plugin:
taxonomy-event-categories.php and taxonomy-event-tags.php. Both taxonomy archive templates now displays the full content instead of the excerpt.
Added an option to show the site-icon in the top navigation bar. CLicking the icon takes you to the front page.
The mobile menu now shows submenu items.
Added new (social) media icons: itunes, app store, google play, bandcamp, mixcloud, slack, amazon.
Improved the way excerpts are displayed in the admin.
Improved escaping and translation comments.
Fixed an issue with the body background color option.

= 2.3 - January 28 2018 =
Fixed missing border colors for images and the menu button.
Added theme support for the editor color palette.

= 2.2 - October 3 2017 =
Added a template for image attachments: image.php.
Minor style changes for attached images.
Added screen reader text to the image attachment navigation.
Added a new page template called "Header & Footer". This template does not display the content of your page, only the header and footer.
Added a new Crew page template where you can feature your crew members. 
	Create a new static page.
	Select the Crew page template.
	Go to the customizer to select the crew members that you would like to feature.
	Note: Crew members are existing users.
Page and post templates has moved to a new folder called templates.
Added two new functions that moves the Jetpack related posts further down in the post footer.
Header Background Color
	In case your front page header image does not fit on other pages, you can now select a color that will replace the header image on all pages except the front page.
Added links to the support forum and theme rating in the customizer.
Updated credits.

= 2.1 - September 14 2017 =
Fixed issues with the color options for the top navigation bar and post navigation.
Updated links.

= 2.0 - September 14 2017 =
The header area now shows if a static page is selected as the front page.
Added text color options. -New file added, see inc/colors.php
Small changes to the styling of the comments section.

= 1.9 - August 7 2017 =
Changed the screenshot -lets not have recognizable people in it.
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
Fixed a problem with the styling for the navigation bar fall back menu.

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
Added a Home menu item. (To do: This will eventually be optional.)
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
* Twenty Twenty https://wordpress.org/themes/twentytwenty/ (C) 2019 WordPress.org, GNU General Public License v2 or later
* CSS animated border: Copyright (c) 2016 by Arsen Zbidniakov (http://codepen.io/ARS/pen/vEwEPP) [MIT](http://opensource.org/licenses/MIT)
* CSS border corners: Copyright (c) 2017 by Patrick Little (http://codepen.io/patricklittle/pen/GJyqyN) [MIT](http://opensource.org/licenses/MIT)
* Header image (remix.png): By Marcela Laskoski. (https://pxhere.com/en/photo/145322) License: CC0.
* Block pattern image (profile.jpg) https://pxhere.com/sv/photo/949348 License: CC0.
* SVG icons: Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org, License: GPLv2 or later
  Font Awesome icons, Copyright Dave Gandy, License: SIL Open Font License, version 1.1. Source: http://fontawesome.io/
* Menu description: Twenty Fifteen WordPress Theme, Copyright 2014-2016 WordPress.org & Automattic.com, License: GPLv2 or later
* Customizer pro button, licensed under the GNU GPL, version 2 or later. Copyright Justin Tadlock 2016. https://github.com/justintadlock/trt-customizer-pro

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
