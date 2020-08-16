<?php
/**
 * Deejay functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Deejay
 */

if ( ! function_exists( 'deejay_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function deejay_setup() {
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_editor_style( 'editor-style.css' ); /* Classic editor */
		add_theme_support( 'editor-styles' );

		if ( get_theme_mod( 'deejay_dark_mode' ) == true ) {
			add_theme_support( 'dark-editor-style' );
			add_editor_style( 'editor-style-dark.css' ); /* Classic editor */
		}

		add_theme_support(
			'custom-logo',
			array(
				'height'     => 150,
				'width'      => 200,
				'flex-width' => true,
				'unlink-homepage-logo' => true,
			)
		);

		add_theme_support( 'post-formats', array( 'video', 'audio' ) );

		register_nav_menus(
			array(
				'bar'    => esc_html__( 'Top Navigation Bar', 'deejay' ),
				'header' => esc_html__( 'Header Menu', 'deejay' ),
				'social' => esc_html__( 'Social Menu', 'deejay' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support(
			'custom-header',
			apply_filters(
				'deejay_custom_header_args',
				array(
					'default-image'      => '%s/images/remix.jpg',
					'default-text-color' => '#4ac6c9',
					'uploads'            => true,
					'flex-height'        => true,
					'flex-width'         => true,
					'width'              => 1900,
					'height'             => 860,
					'video'              => true,
				)
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'deejay_custom_background_args',
				array(
					'default-color' => '#0a0a0a',
				)
			)
		);

		register_default_headers(
			array(
				'remix' => array(
					'url'           => '%s/images/remix.jpg',
					'thumbnail_url' => '%s/images/remix.jpg',
					'description'   => __( 'Remix', 'deejay' ),
				),
			)
		);

		add_theme_support( 'woocommerce' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'infinite-scroll',
			array(
				'container' => 'main',
				'render'    => 'deejay_infinite_scroll_render',
				'footer'    => 'page',
			)
		);

		add_theme_support( 'jetpack-responsive-videos' );
		add_theme_support( 'jetpack-testimonial' );
		add_theme_support( 'jetpack-portfolio' );

		add_theme_support(
			'starter-content',
			array(
				'posts'     => array(
					'about',
					'contact',
					'blog',
					'news',
				),
				'nav_menus' => array(
					'bar'    => array(
						'name'  => __( 'Top Navigation Bar', 'deejay' ),
						'items' => array(
							'page_about',
							'page_blog',
							'page_contact',
						),
					),
					'header' => array(
						'name'  => __( 'Header Menu', 'deejay' ),
						'items' => array(
							'page_news',
							'page_about',
							'page_blog',
							'page_contact',
						),
					),
					'social' => array(
						'name'  => __( 'Social Menu', 'deejay' ),
						'items' => array(
							'link_facebook',
							'link_twitter',
							'link_instagram',
						),
					),
				),
			)
		);

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Deejay Purple', 'deejay' ),
					'slug'  => 'deejay-purple',
					'color' => '#b902c4',
				),
				array(
					'name'  => __( 'Deejay Turquoise', 'deejay' ),
					'slug'  => 'deejay-turquoise',
					'color' => '#4ac6c9',
				),
				array(
					'name'  => __( 'Deejay Dark Grey', 'deejay' ),
					'slug'  => 'deejay-darkgrey',
					'color' => '#111111',
				),
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'experimental-custom-spacing' );

		add_theme_support( 'custom-line-height' );

		add_theme_support( 'custom-units' );

	}
}  // End if().

add_action( 'after_setup_theme', 'deejay_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function deejay_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'deejay_content_width', 800 );
}
add_action( 'after_setup_theme', 'deejay_content_width', 0 );


if ( ! function_exists( 'deejay_widgets_init' ) ) {
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function deejay_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Front Page Widgets: Header', 'deejay' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'The header widget area is only visible on the front page and only has room for 3 widgets. The space is somewhat limited, so carefully select widgets that will fit inside the area. At 960px width, only the first header widget will be shown.', 'deejay' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="inner">',
				'after_widget'  => '</div></section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Front Page Widgets: Below the content', 'deejay' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html__( 'Widgets in this section will be shown on the front page below your content.', 'deejay' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widgets', 'deejay' ),
				'id'            => 'sidebar-3',
				'description'   => esc_html__( 'Widgets in this section will be shown in the footer of all your pages.', 'deejay' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Copyright', 'deejay' ),
				'id'            => 'sidebar-4',
				'description'   => esc_html__( 'Please place a single text widget with your copyright information here. It will then be shown in the footer.', 'deejay' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
	add_action( 'widgets_init', 'deejay_widgets_init' );
} // End if().

/**
 * Enqueue scripts and styles.
 */
function deejay_scripts() {
	wp_enqueue_style( 'deejay-style', get_stylesheet_uri() );
	wp_style_add_data( 'deejay-style', 'rtl', 'replace' );
	wp_enqueue_script( 'deejay-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'deejay-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'deejay_scripts' );


if ( ! function_exists( 'deejay_editor_assets' ) ) {
	/**
	 * Add styles and fonts for the block editor.
	 */
	function deejay_editor_assets() {
		wp_enqueue_style( 'deejay-editor', get_theme_file_uri( 'block-editor.css' ), false );
		if ( get_theme_mod( 'deejay_dark_mode' ) == true ) {
			wp_enqueue_style( 'deejay-editor-dark', get_theme_file_uri( 'block-editor-dark.css' ), false );
		}
		wp_enqueue_script( 'deejay-block-styles-script', get_theme_file_uri( '/js/block-styles.js' ), array( 'wp-blocks', 'wp-i18n' ) );
		wp_set_script_translations( 'deejay-block-styles-script', 'deejay' );
	}
	add_action( 'enqueue_block_editor_assets', 'deejay_editor_assets' );
}

if ( ! function_exists( 'deejay_block_styles' ) ) {
	/**
	 * Add custom block styles.
	 */
	function deejay_block_styles() {
		wp_enqueue_style( 'deejay-block-styles', get_theme_file_uri( '/inc/custom-block-styles.css' ), false );
	}
	add_action( 'enqueue_block_assets', 'deejay_block_styles' );
}

if ( ! function_exists( 'deejay_excerpt_length' ) ) {
	/**
	 * Updates the length of the excerpt.
	 */
	function deejay_excerpt_length( $length ) {
		if ( ! is_admin() ) {
			return 35;
		} else {
			return $length;
		}
	}
	add_filter( 'excerpt_length', 'deejay_excerpt_length', 999 );
}

if ( ! function_exists( 'deejay_excerpt_more' ) ) {
	/**
	 * Updates the excerpt_more text and includes a link to the post.
	 */
	function deejay_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			global $post;
			return '&hellip; <br><br><a class="more-link" href="' . esc_url( get_permalink( $post->ID ) ) . '">' .
			/* translators: %s: post title */
			sprintf( esc_html__( 'Continue Reading %s', 'deejay' ), get_the_title( $post->ID ) ) . '</a>';
		} else {
			return $more;
		}
	}
	add_filter( 'excerpt_more', 'deejay_excerpt_more' );
}

if ( ! function_exists( 'deejay_comments_pagination' ) ) {
	/**
	 * Because get_the_comments_pagination() only accepts one type (plain) I had to alter the function slightly to add the list type,
	 * so that the comment pagination could be styled in the same way as the post pagination.
	 * https://developer.wordpress.org/reference/functions/get_the_comments_pagination/
	 * Related ticket: https://core.trac.wordpress.org/ticket/39792
	 **/
	function deejay_comments_pagination( $args = array() ) {
		$navigation = '';
		$args       = wp_parse_args(
			$args,
			array(
				'screen_reader_text' => __( 'Comments navigation', 'deejay' ),
				'prev_text'          => _x( 'Previous', 'previous set of comments', 'deejay' ),
				'next_text'          => _x( 'Next', 'next set of comments', 'deejay' ),
				'type'               => 'list',
			)
		);
		$links      = paginate_comments_links( $args );
		if ( $links ) {
			$navigation = _navigation_markup( $links, 'comments-pagination', $args['screen_reader_text'] );
		}
	}
}

if ( ! function_exists( 'deejay_classes' ) ) {
	/**
	 * Adds extra classes to the body tag depening on feature.
	 */
	function deejay_classes( $classes ) {
		if ( has_header_image() || has_header_video() ) {
			$classes[] = 'has-header-media';
		}

		if ( has_nav_menu( 'header' ) ) {
			$classes[] = 'has-header-menu';
		}

		if ( get_theme_mod( 'deejay_footer_menu', false ) == true ) {
			$classes[] = 'has-footer-menu';
		}

		return $classes;
	}
	add_filter( 'body_class', 'deejay_classes' );
}


if ( class_exists( 'woocommerce' ) ) {
	/**
	 * Ensures that the WooCommerce pagination looks the same as the rest of the theme.
	 */
	function deejay_woocommerce_pagination() {
		the_posts_pagination( array( 'type' => 'list' ) );
	}
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination' );
	add_action( 'woocommerce_after_shop_loop', 'deejay_woocommerce_pagination', 10 );
}


if ( ! function_exists( 'deejay_move_share' ) ) {
	/**
	 * Remove the Jetpack likes and sharing_display filter so that we can resposition them to our post footer.
	 * Otherwise, they are displayed below the content, but above the page links ( wp_link_pages() ) if a post has multiple pages.
	 */
	function deejay_move_share() {
		if ( function_exists( 'sharing_display' ) ) {
			remove_filter( 'the_content', 'sharing_display', 19 );
			remove_filter( 'the_excerpt', 'sharing_display', 19 );
		}

		if ( class_exists( 'Jetpack_Likes' ) ) {
			remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
		}
	}
	add_action( 'loop_start', 'deejay_move_share' );
}


if ( ! function_exists( 'deejay_move_related_posts' ) ) {
	/**
	 * Remove the Jetpack related posts filter so that we can resposition them to our post footer.
	 */
	function deejay_move_related_posts() {
		if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
			$jprp     = Jetpack_RelatedPosts::init();
			$callback = array( $jprp, 'filter_add_target_to_dom' );
			remove_filter( 'the_content', $callback, 40 );
		}
	}
	add_filter( 'wp', 'deejay_move_related_posts', 20 );
}

if ( ! function_exists( 'deejay_menu_home' ) ) {
	/**
	 * Adds the Home menu item to the top navigation bar.
	 */
	function deejay_menu_home( $items, $args ) {
		if ( get_theme_mod( 'deejay_display_home', true ) == true ) {
			if ( 'bar' === $args->theme_location ) {
				$new_item    = array( '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html__( 'Home', 'deejay' ) . '</a></li>' );
				$items       = preg_replace( '/<\/li>\s<li/', '</li>,<li', $items );
				$array_items = explode( ',', $items );
				array_splice( $array_items, 0, 0, $new_item );
				$items = implode( '', $array_items );
			}
		}
		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'deejay_menu_home', 10, 2 );
}

if ( ! function_exists( 'deejay_page_menu_home' ) ) {
	/**
	 * Adds the Home menu item to the fallback menu.
	 */
	function deejay_page_menu_home( $args ) {
		if ( get_theme_mod( 'deejay_display_home', true ) == true ) {
			$args['show_home'] = true;
		}
		return $args;
	}
	add_filter( 'wp_page_menu_args', 'deejay_page_menu_home' );
}

if ( ! function_exists( 'deejay_header_menu_description' ) ) {
	/**
	 * Support for menu descriptions for the header menu.
	 */
	function deejay_header_menu_description( $item_output, $item, $depth, $args ) {
		if ( 'header' == $args->theme_location && $item->description ) {
			$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
		}
		return $item_output;
	}
	add_filter( 'walker_nav_menu_start_el', 'deejay_header_menu_description', 10, 4 );
}

if ( ! function_exists( 'deejay_search_form_modify' ) ) {
	/**
	 * Add a new class to help us change the submit button.
	 */
	function deejay_search_form_modify( $html ) {
		return str_replace(
			'<input type="submit" class="search-submit" value="Search" />',
			'<button type="submit" class="search-submit"><span class="screen-reader-text">' . esc_html__( 'Search', 'deejay' ) . '</span>' . deejay_get_svg( array( 'icon' => 'search' ) ) . '</button>',
			$html
		);
	}
	add_filter( 'get_search_form', 'deejay_search_form_modify' );
}


if ( ! function_exists( 'deejay_infinite_scroll_render' ) ) {
	/**
	 * Custom render function for Infinite Scroll.
	 */
	function deejay_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'content', get_post_format() );
		}
	}
}

/**
 * Theme information page.
 */
require get_template_directory() . '/inc/theme-info.php';

/**
 * Custom colors for this theme.
 */
require get_template_directory() . '/inc/colors.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/class-customize.php';

/**
 * Hybrid Media Grapper
 */
require get_template_directory() . '/inc/class-media-grabber.php';

/**
 * SVG icons
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Load custom widget files.
 */
require get_template_directory() . '/inc/recent-posts-widget.php';
require get_template_directory() . '/inc/recent-comments-widget.php';

/**
 * Block patterns.
 */
require get_template_directory() . '/inc/block-patterns.php';

/* We have added support for testimonials, but don't enable the widget unless Jetpack is installed. */
if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/inc/testimonial-widget.php';
}

if ( ! function_exists( 'deejay_customize_css' ) ) {
	/**
	 * CSS changes for the advanced mobile header, menu options and grid size options.
	 */
	function deejay_customize_css() {
		echo '<style type="text/css">';

		if ( get_theme_mod( 'deejay_advanced_header' ) ) {
			?>
			@media screen and (max-width: 960px) {
				.has-header-media .site-header .widget-area,
				.site-header .widget-area .widget,
				.site-header .widget-area .widget:first-child {
					display: none;
				}

				.advanced-header-widgets {
					display: block;
				}

				.has-header-media .site-header .header-navigation .menu-item a{
					background: rgba(0,0,0,0.6);
				}

				.has-header-media .site-branding {
					top: 4em;
				}

				.has-header-media .header-navigation{
					font-size: 1em;
				}
			}

			@media screen and (max-width: 782px) {
				.site-header {
					display: block;
					min-height: 345px;
				}

				.has-header-menu .site-header {
					min-height: 445px;
				}

				.responsive-site-title,
				.responsive-site-description {
					display: none;
				}

				.has-header-media .site-header .header-navigation .menu-item a {
					background: rgba(0,0,0,0.6);
				}

				.has-header-media .header-navigation {
					top: 16em;
				}

				.header-navigation a {
					padding: 8px;
				}

				.site-title {
					font-size: 2em;
				}
			}

			<?php
		}

		if ( is_front_page() && has_header_image() && ! has_header_video() ) {
			?>
			.home .site-header { 
				background: url(<?php header_image(); ?>) no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				min-height: <?php echo esc_attr( get_custom_header()->height ); ?>px;
				padding-top: 4em;
				overflow: hidden;
			}
			@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
				.home .site-header { background-attachment: scroll !important; }
			}
			<?php
		} elseif ( ! is_front_page() && has_header_image() ) {

			if ( get_theme_mod( 'deejay_header_bgcolor' ) ) {
				echo '.site-header{background:' . esc_attr( get_theme_mod( 'deejay_header_bgcolor' ) ) . ';}';
			} else {
				?>
				.site-header { 
					background: url(<?php header_image(); ?>) no-repeat center center fixed;
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
				}
				<?php
			}
		}

		if ( '2' === get_theme_mod( 'deejay_grid_size' ) ) {
			echo '.grid { width:48%; }';
			echo '@media screen and (max-width: 1200px) { .grid { width: 100%; }';
		} elseif ( '1' === get_theme_mod( 'deejay_grid_size' ) ) {
			echo '.grid { width: 100%; min-height: initial; }';
		}

		if ( get_theme_mod( 'deejay_sticky_menu', false ) == true ) {
			echo '.main-navigation{ position: fixed; }';
			echo '.site-header{ margin-top: 48px; }';
			// At 782px, we switch to the responsive site-title.
			echo '@media screen and (max-width: 782px) {
				.responsive-site-title { margin-top: 74px; }
			  }';

			echo '@media screen and (max-width: 600px) {
				.main-navigation { position: initial; } ';

			if ( get_theme_mod( 'deejay_advanced_header' ) ) {
				echo '.site-header{ margin-top: 0; }';
			}

			echo ' }';
		}

		if ( get_theme_mod( 'deejay_hide_priority_menu' ) ) {
			echo '@media screen and (max-width: 782px) {
				.main-navigation {
					background: none;
					box-shadow: none;
					position: absolute;
					top: 0;
				}

				.main-navigation.toggled {
					background:' . esc_attr( get_theme_mod( 'deejay_topbar_bgcolor', '#111111' ) ) .
				'}

				.responsive-site-title { margin-top: 74px; }

				.admin-bar .main-navigation { top: 46px; }

				.has-header-media .site-branding { top: 7.4em; }
				.has-header-media .header-navigation { top: 16em; }

				.main-navigation #top-bar-menu {
					display: none;
				}';

			if ( get_theme_mod( 'deejay_advanced_header' ) ) {
				echo '.site-header { margin-top: 0; }';
				echo '@media screen and (max-width: 782px) {
					.has-header-media .site-branding{ top: 5em; }
		   		}';
			}

			echo ' }';
		}

		if ( get_theme_mod( 'deejay_advanced_header' ) && has_custom_logo() ) {
			echo '
			@media screen and (max-width: 960px) {
				.wp-custom-logo.has-header-media .header-navigation {
					top: 15em;
				}
			}

			@media screen and (max-width: 782px) {
				a.custom-logo-link {
					margin: 0 5%;
				}

				.home.wp-custom-logo.has-header-media .custom-logo-link,
				.home.wp-custom-logo .custom-logo-link {
					margin-top: 0;
					position: absolute;
					top: 4em;
					left: 5%;
					margin: 0;
				}
			}

			@media screen and (max-width: 640px) {
				.has-header-media .site-header,
				.site-header {
					padding: 4em 2em 2em 2em;
					text-align: center;
				}

				.home.wp-custom-logo.has-header-media .custom-logo-link,
				.home.wp-custom-logo .custom-logo-link,
				.wp-custom-logo.has-header-media .custom-logo-link,
				a.custom-logo-link {
					display: block;
					margin: 0 auto;
					position: relative;
					top: initial;
					left: initial;
				}

				.wp-custom-logo.has-header-media .site-branding,
				.wp-custom-logo .site-branding {
					display: block;
					position: relative;
					top: initial;
					left: initial;
					margin: 2em auto 3em auto;
				}

				.wp-custom-logo.has-header-media .header-navigation,
				.wp-custom-logo .header-navigation {
					display: block;
					position: relative;
					top: initial;
					left: initial;
					margin: 2em auto 0 auto;
				}
			}
			';
		}

		if ( get_theme_mod( 'deejay_advanced_header', false ) === true && get_theme_mod( 'deejay_advanced_header_height', 455 ) ) {
			echo '
			@media screen and (max-width: 960px) {
				.home .site-header,
				.site-header {
					min-height: ' . esc_attr( get_theme_mod( 'deejay_advanced_header_height', 445 ) ) . 'px !important;
				}
			}';
		}

		if ( get_theme_mod( 'deejay_advanced_header', false ) === true && get_theme_mod( 'deejay_advanced_header_image_size', 'cover' ) ) {
			echo '
			@media screen and (max-width: 960px) {
				.home .site-header,
				.site-header {
					background-size: ' . esc_attr( get_theme_mod( 'deejay_advanced_header_image_size', 'cover' ) ) . ' !important;
				}
			}';
		}

		if ( get_theme_mod( 'deejay_advanced_header', false ) === true && get_theme_mod( 'deejay_advanced_header_image_position', 'center center' ) ) {
			echo '
			@media screen and (max-width: 960px) {
				.home .site-header,
				.site-header {
					background-position: ' . esc_attr( get_theme_mod( 'deejay_advanced_header_image_position', 'center center' ) ) . ' !important;
				}
			}';
		}

		echo '</style>';
	}

	add_action( 'wp_head', 'deejay_customize_css' );
}
