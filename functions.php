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
		add_image_size( 'deejay_thumb', 445, 300 );

		add_theme_support( 'custom-logo' );

		add_theme_support( 'jetpack-responsive-videos' );

		add_theme_support( 'post-formats', array( 'video' ) );

		register_nav_menus( array(
			'bar' => esc_html( 'Top Navigation Bar','deejay' ),
			'header' => esc_html__( 'Header Menu', 'deejay' ),
			'social' => esc_html__( 'Social Menu', 'deejay' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-header', apply_filters( 'deejay_custom_header_args', array(
			'default-image'          => '%s/images/remix.png',
			'default-text-color'     => '#4ac6c9',
			'uploads'                => true,
			'flex-height'            => true,
			'flex-width'             => true,
			'width'                  => 1900,
			'height'                 => 860,
			'video'					 => true,
			)
		) );

		add_theme_support( 'custom-background', apply_filters( 'deejay_custom_background_args', array( 
			'default-color' => '#0a0a0a',
			)
		) );

		register_default_headers( array(
			'remix' => array(
			'url'           => '%s/images/remix.png',
			'thumbnail_url' => '%s/images/remix.png',
			'description'   => __( 'Remix', 'deejay' ),
			),
		) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'starter-content', array(
			'posts' => array(
				'home',
				'about',
				'contact',
				'blog',
				'news',
			),
			'nav_menus' => array(
				'bar' => array(
					'name' => __( 'Top Navigation Bar', 'deejay' ),
					'items' => array(
						'page_home',
						'page_about',
						'page_blog',
						'page_contact',
					),
				),
				'header' => array(
					'name' => __( 'Header Menu', 'deejay' ),
					'items' => array(
						'page_news',
						'page_about',
						'page_blog',
						'page_contact',
					),
				),
				'social' => array(
					'name' => __( 'Social Menu', 'deejay' ),
					'items' => array(
						'link_facebook',
						'link_twitter',
						'link_instagram',
					),
				),
			),
		) );
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
	$GLOBALS['content_width'] = apply_filters( 'deejay_content_width', 640 );
}
add_action( 'after_setup_theme', 'deejay_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function deejay_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Widgets: Header', 'deejay' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets in this section will be shown in your header, below the site title. Please select up to 3 widgets that will fit inside your header. ','deejay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Widgets: Below the content', 'deejay' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Widgets in this section will be shown on the front page below your content. ','deejay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'deejay' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Widgets in this section will be shown in the footer of all your pages. ','deejay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Copyright', 'deejay' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Please place a single text widget with your copyright information here. It will then be shown in the footer.','deejay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'deejay_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function deejay_scripts() {
	wp_enqueue_style( 'deejay-style', get_stylesheet_uri() );
	wp_enqueue_script( 'deejay-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'deejay-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'deejay_scripts' );


function deejay_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'deejay_excerpt_length', 999 );

function deejay_excerpt_more( $more ) {
	global $post;
	return '&hellip; <br><br><a class="more-link" href="' . esc_url( get_permalink( $post->ID ) ) . '">' . 
	sprintf( esc_html__( 'Continue Reading %s', 'deejay' ), get_the_title( $post->ID ) ) . '</a>';
}
add_filter( 'excerpt_more', 'deejay_excerpt_more' );


if ( ! function_exists( 'deejay_comments_pagination' ) ) {
	/**
	 * Because get_the_comments_pagination() only accepts one type (plain) I had to alter the function slightly to add the list type,
	 * so that the comment pagination could be styled in the same way as the post pagination.
	 * https://developer.wordpress.org/reference/functions/get_the_comments_pagination/
	 **/
	function deejay_comments_pagination( $args = array() ) {
		$navigation = '';
		$args       = wp_parse_args( $args, array(
			'screen_reader_text' => __( 'Comments navigation', 'deejay' ),
			'prev_text'	=> _x( 'Previous', 'previous set of comments', 'deejay' ),
			'next_text'	=> _x( 'Next', 'next set of comments', 'deejay' ),
			'type' => 'list',
		) );
		$links = paginate_comments_links( $args );
		if ( $links ) {
			$navigation = _navigation_markup( $links, 'comments-pagination', $args['screen_reader_text'] );
		}
	}
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


function deejay_customize_css() {
	echo '<style type="text/css">';

	if ( ! display_header_text() ) {
		echo '.header-navigation{ float:left;}';
	}

	if ( get_theme_mod( 'deejay_footer_bgcolor' ) ) {
		echo '.site-footer{background:' . esc_attr( get_theme_mod( 'deejay_footer_bgcolor', '#222' ) ) . ';}';
	}

	if ( get_theme_mod( 'deejay_topbar_bgcolor' ) ) {
		echo '.main-navigation, .main-navigation ul ul li{background:' . esc_attr( get_theme_mod( 'deejay_topbar_bgcolor', '#222' ) ) . ';}';
		echo '@media screen and (max-width: 782px) { .main-navigation ul li{background:' . esc_attr( get_theme_mod( 'deejay_topbar_bgcolor', '#222' ) ) . ';} }';
	}

	if ( get_theme_mod( 'header_textcolor' ) ) {
	?>
		.site-title a{
			color: <?php echo esc_attr( get_theme_mod( 'header_textcolor' ) ); ?>;
		}
	<?php
	}
	if ( get_theme_mod( 'deejay_description_textcolor' ) ) {
	?>
		.site-description {
			color: <?php echo esc_attr( get_theme_mod( 'deejay_description_textcolor' ) ); ?>;
		}
	<?php
	}
	if ( has_header_image() && ! has_header_video() ) {
	?>
		.site-header{ 
			background: url(<?php header_image(); ?>) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			min-height: <?php echo esc_attr( get_custom_header()->height ); ?>px;
			padding-top:4em;
		}
	<?php
	}
	?>
<?php
	echo '</style>';
}
add_action( 'wp_head', 'deejay_customize_css' );
