<?php
/**
 * Deejay Custom colors
 *
 * @package Deejay
 */

/**
 *  Overrides colors for various elements.
 */
function deejay_custom_colors() {
	echo '<style type="text/css">';

	if ( get_theme_mod( 'deejay_textcolor' ) ) {
		echo '
			body,
			button,
			input,
			select,
			textarea,
			.grid,
			.site-footer,
			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			a,
			a:visited,
			a:hover,
			a:focus,
			a:active,
			th,
			table caption,
			table,
			.nav-next,
			.nav-previous,
			ul.page-numbers li,
			.header-navigation a:hover,
			.social-menu a,
			.social-menu a:hover,
			.social-menu a:focus,
			.widget a:hover,
			.widget a:focus,
			.widget-title:hover,
			.comment-reply-title,
			.comments-title,
			.no-comments,
			.widgettitle,
			.widget-title,
			.page-title,
			.entry-title,
			.entry-meta a,
			.entry-meta,
			.em-calendar,
			#wp-calendar,
			.em-calendar .days-names td,
			.em-calendar thead tr th,
			#wp-calendar thead tr th,
			#wp-calendar caption,
			.single .grid,
			.type-event,
			.single .type-jetpack-portfolio,
			body.attachment .type-attachment,
			body.page .type-page,
			.single .post,
			.comments-area,
			#edd_checkout_form_wrap span.edd-description,
			#edd_checkout_cart th,
			#edd_checkout_cart .edd_cart_header_row th,
			#edd_checkout_cart td,
			.entry-breadcrumbs span:after,
			.woocommerce nav.woocommerce-pagination ul li,
			.woocommerce nav.woocommerce-pagination ul li a:focus,
			.woocommerce nav.woocommerce-pagination ul li a:hover,
			.woocommerce nav.woocommerce-pagination ul li span.current,
			table.em-calendar td.eventful a:hover,
			#mobile-menu-toggle:hover,
			#mobile-menu-toggle:focus,
			table.em-calendar td.eventful-today a:hover,
			.crew-description,
			.wp-custom-header-video-button { color: ' . esc_attr( get_theme_mod( 'deejay_textcolor' ) ) . ';}

			.sticky:hover:before,
			.sticky:hover:after,
			.sticky:hover > :first-child::before,
			.sticky:hover > :first-child:after { border-color: ' . esc_attr( get_theme_mod( 'deejay_textcolor' ) ) . ';}

			.go-to-top a {
				background-color: ' . esc_attr( get_theme_mod( 'deejay_textcolor' ) ) . ';
				color: ' . esc_attr( get_theme_mod( 'deejay_textcolor' ) ) . ';
			}

			a#cancel-comment-reply-link,
			.must-log-in a,
			.logged-in-as a,
			.comment-content a,
			.entry-content a,
			.wp-caption-text a {
				border-bottom: 2px solid ' . esc_attr( get_theme_mod( 'deejay_textcolor' ) ) . ';
			}

			#mobile-menu-toggle,
			a#cancel-comment-reply-link,
			.wp-custom-header-video-button:hover,
			.wp-custom-header-video-button:focus { border: 2px solid ' . esc_attr( get_theme_mod( 'deejay_textcolor' ) ) . ';}

			.jetpack-testimonial .icon,
			.widget.deejay-recent-comments li .icon,
			.social-menu .icon,
			.social-menu li a:focus .icon,
			.social-menu li a:hover .icon {	fill:' . esc_attr( get_theme_mod( 'deejay_textcolor' ) ) . ';}
		';
	}

	if ( get_theme_mod( 'deejay_menu_text_color', '#cfcfcf' ) ) {
		echo '.main-navigation, .main-navigation a, .main-navigation a:focus, .main-navigation a:hover{ color:' . esc_attr( get_theme_mod( 'deejay_menu_text_color', '#cfcfcf' ) ) . ';}';
		echo '.main-navigation .social-menu .icon, .top-bar-search .icon {fill:' . esc_attr( get_theme_mod( 'deejay_menu_text_color', '#cfcfcf' ) ) . ';}';
	}

	if ( get_theme_mod( 'deejay_footer_text_color', '#aeaeae' ) ) {
		echo '.site-footer, .site-footer a, .site-footer a:focus, .site-footer a:hover{ color:' . esc_attr( get_theme_mod( 'deejay_footer_text_color', '#aeaeae' ) ) . ';}';
	}

	if ( get_theme_mod( 'background_color' ) && '0a0a0a' !== get_theme_mod( 'background_color' ) && '#0a0a0a' !== get_theme_mod( 'background_color' ) ) {
		echo '.go-to-top .icon{	fill: #' . esc_attr( get_theme_mod( 'background_color' ) ) . ';}';
		echo '.grid{ background:none; box-shadow:none; }';
		echo '.nav-next, .nav-previous, ul.page-numbers li{ background:#' . esc_attr( get_theme_mod( 'background_color' ) ) . ';}';
	}

	if ( get_theme_mod( 'deejay_footer_bgcolor' ) ) {
		echo '.site-footer{background:' . esc_attr( get_theme_mod( 'deejay_footer_bgcolor', '#222' ) ) . ';}';
	}

	if ( get_theme_mod( 'deejay_topbar_bgcolor' ) && '#111111' !== get_theme_mod( 'deejay_topbar_bgcolor' ) ) {
		echo '.main-navigation, .main-navigation ul ul li, .main-navigation ul ul li:hover{background:' . esc_attr( get_theme_mod( 'deejay_topbar_bgcolor', '#111111' ) ) . ';}';
		echo '@media screen and (max-width: 782px) { 
			.main-navigation ul li, .main-navigation.toggled li, #site-navigation.toggled nav.social-menu, 
			.main-navigation.toggled ul li:hover,
			.main-navigation.toggled .top-bar-search, .has-footer-menu .main-navigation { 
			background:' . esc_attr( get_theme_mod( 'deejay_topbar_bgcolor', '#111111' ) ) . ';} }';
	}

	if ( get_theme_mod( 'header_textcolor' ) !== '#4ac6c9' ) {
		echo '.responsive-site-title,
		.responsive-site-title a,
		.site-title,
		.site-title a{
			color: #' . esc_attr( get_theme_mod( 'header_textcolor' ) ) . ';}';
	}

	if ( get_theme_mod( 'deejay_description_textcolor' ) ) {
		echo '.site-description,
		.responsive-site-description {
			color: ' . esc_attr( get_theme_mod( 'deejay_description_textcolor' ) ) . ';}';
	}

	if ( get_theme_mod( 'deejay_header_widget_bgcolor' ) ) {
		echo '.has-header-media .site-header .widget, 
		.has-header-media .site-header .widget .inner,
		.site-header .widget,
		.advanced-header-widgets .widget{ background: ' . esc_attr( get_theme_mod( 'deejay_header_widget_bgcolor' ) ) . '; }';
	}

	/* Pink link accent color. */
	if ( get_theme_mod( 'deejay_link_underline_color' ) ) {
		echo ' .header-navigation a:focus {	border: 1px solid ' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . ';}
		.header-navigation a:hover::before { border-top-color:' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . '; 
		border-right-color: ' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . ';}
		.header-navigation a:hover::after { border-bottom-color: ' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . '; 
		border-left-color: ' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . ';}

		.go-to-top a:focus,	.go-to-top a:hover { background-color: ' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . ';}

		.woocommerce #respond input#submit:focus,
		.woocommerce a.button:focus,
		.woocommerce button.button:focus,
		.woocommerce input.button:focus,
		.woocommerce #respond input#submit:hover,
		.woocommerce a.button:hover,
		.woocommerce button.button:hover,
		.woocommerce input.button:hover {
			color: ' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . ';}

		.main-navigation a:focus,
		.main-navigation a:hover,
		.responsive-site-title a:hover,
		.responsive-site-title a:focus,
		.main-navigation a.custom-logo-link:hover,
		#mobile-menu-toggle:hover,
		#mobile-menu-toggle:focus,
		.site-main #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a:focus,
		.site-main #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post:hover .jp-relatedposts-post-title a,
		.entry-breadcrumbs a:focus,
		.entry-breadcrumbs a:hover,
		.woocommerce nav.woocommerce-pagination ul li a:hover,
		.woocommerce nav.woocommerce-pagination ul li a:focus,
		.entry-title a:focus,
		.entry-title a:hover,
		.site-title a:hover,
		.site-title a:focus,
		.entry-header a img:focus,
		.entry-header a img:hover,
		.single-attachment img a:focus,
		.single-attachment img a:hover,
		.entry-content .gallery-item a:focus,
		.entry-content .gallery-item a:hover,
		.deejay-recent-posts a.deejay-recent-post-img:focus,
		.deejay-recent-posts a.deejay-recent-post-img:hover,
		.single-attachment .entry-content a img:hover,
		.gallery-item a img:hover,
		.wp-caption-text a:focus,
		.wp-caption-text a:hover,
		.site-info a:focus,
		.site-info a:hover,
		.widget a:hover,
		.widget a:focus,
		.nav-next a:focus,
		.nav-previous a:focus,
		a.page-numbers:focus,
		.nav-next a:hover,
		.nav-previous a:hover,
		a.page-numbers:hover,
		a.more-link:focus,
		a#cancel-comment-reply-link:focus,
		.must-log-in a:focus,
		.logged-in-as a:focus,
		.comment-content a:focus,
		.entry-content a:focus,
		.entry-meta a:focus,
		a.more-link:hover,
		a#cancel-comment-reply-link:hover,
		.must-log-in a:hover,
		.logged-in-as a:hover,
		.comment-content a:hover,
		.entry-content a:hover,
		.entry-meta a:hover {
			border-bottom: 2px solid ' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . ';}';

		echo '#mobile-menu-toggle:hover, #mobile-menu-toggle:focus, 
			.entry-header a img:focus,
			.entry-header a img:hover,
			.single-attachment img a:focus,
			.single-attachment img a:hover,
			.entry-content .gallery-item a:focus,
			.entry-content .gallery-item a:hover,
			.single-attachment .entry-content a img:hover,
			.gallery-item a img:hover {
			border: 2px solid ' . esc_attr( get_theme_mod( 'deejay_link_underline_color' ) ) . ';}

		.single-attachment .entry-content a:hover, .entry-content .gallery-item a:hover {text-decoration: none; border: 2px solid transparent; }';
	} // End if().

	/* Turquoise link accent color. */
	if ( get_theme_mod( 'deejay_accent_color' ) ) {
		echo '
		.responsive-site-title a,
		.woocommerce-Price-amount,
		.woocommerce ul.products li.product .price,
		.jetpack-portfolio-tag,
		.jetpack-portfolio-type,
		.entry-content .entry-meta,
		.entry-footer .entry-meta,
		.page-title,
		table.em-calendar td.eventful a, 
		table.em-calendar td.eventful-today a,
		.widget a{
			color: ' . esc_attr( get_theme_mod( 'deejay_accent_color' ) ) . ';
		}

		.woocommerce span.onsale {
			background: ' . esc_attr( get_theme_mod( 'deejay_accent_color' ) ) . ';
		}

		.sticky:before,
		.sticky:after,
		.sticky > :first-child:before,
		.sticky > :first-child:after {
		   border-color:' . esc_attr( get_theme_mod( 'deejay_accent_color' ) ) . ';
		}

		.site-main #jp-relatedposts h3.jp-relatedposts-headline em:before 
		.site-main article div.sharedaddy h3.sd-title:before {
		    border-top: 2px solid ' . esc_attr( get_theme_mod( 'deejay_accent_color' ) ) . ';
		}

		.sharedaddy .sd-social-icon-text .sd-content ul li a.sd-button:focus,
		.sharedaddy .sd-social-icon-text .sd-content ul li a.sd-button:hover {
			border: 2px solid ' . esc_attr( get_theme_mod( 'deejay_accent_color' ) ) . ';
		}

		th,
		.em-calendar .days-names td,
		.em-calendar thead tr th,
		#wp-calendar thead tr th {
			border-bottom: 1px solid ' . esc_attr( get_theme_mod( 'deejay_accent_color' ) ) . ';
		}';
	} // End if().

	echo '</style>';
}
add_action( 'wp_head', 'deejay_custom_colors' );
