<?php
/**
 * SegersMat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SegersMat
 */

if ( ! function_exists( 'segersmat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function segersmat_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SegersMat, use a find and replace
		 * to change 'segersmat' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'segersmat', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'slider-img',1920,902,true ); // Size for main slider images
			add_image_size( 'gallery-img-thumb',270,200,true ); // Size for gallery thumbnails
			add_image_size( 'news-img-small',570,400,true ); // Size for news (small)
			add_image_size( 'news-img',648,400,true ); // Size for news
			add_image_size( 'page-header-img',1920,500,true ); // Size for news
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'mainmenu' => esc_html__( 'Huvudmeny', 'segersmat' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'segersmat_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function segersmat_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'segersmat_content_width', 648 );
}
add_action( 'after_setup_theme', 'segersmat_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function segersmat_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidofält', 'segersmat' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'Widgetfält för allmän sidopanel.', 'segersmat' ),
		'before_widget' => '<div id="%1$s" class="single-sidebar-widget %2$s wow fadeIn">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Bokningsformulär', 'segersmat' ),
		'id'            => 'booking-widgets',
		'description'   => esc_html__( 'Widgetfält för extra information under bokningsformulär. Ange max 2 widgets.', 'segersmat' ),
		'before_widget' => '<div id="%1$s" class="col-md-6 col-lg-6 col-sm-12 col-xs-12 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'segersmat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function segersmat_scripts() {
	// Enqueue Stylesheets
	wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'pogo-slider', get_template_directory_uri() . '/css/pogo-slider.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'segersmat-style', get_stylesheet_uri() );
	// Enqueue JavaScripts
	wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . 	'/js/vendor/modernizr-2.8.3.min.js', array('jquery'), '20190624' );
	wp_enqueue_script( 'jquery-easing-js', get_template_directory_uri() . 	'/js/vendor/jquery.easing.1.3.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . 	'/js/vendor/bootstrap.min.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'pogo-js', get_template_directory_uri() . 	'/js/jquery.pogo-slider.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . 	'/js/owl.carousel.min.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'mixitup-js', get_template_directory_uri() . 	'/js/jquery.mixitup.min.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'magnific-popup-js', get_template_directory_uri() . 	'/js/jquery.magnific-popup.min.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'waypoints-js', get_template_directory_uri() . 	'/js/waypoints.min.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'wow-js', get_template_directory_uri() . 	'/js/wow.min.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'sticky-js', get_template_directory_uri() . 	'/js/jquery.sticky.js', array('jquery'), '20190624', true );
	wp_enqueue_script( 'segersmat-js', get_template_directory_uri() . 	'/js/main.js', array('jquery'), '20190624', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'segersmat_scripts' );

/** -----------------------------------------------
* Enqueue custom admin CSS.
* ----------------------------------------------- */
function segersmat_load_custom_wp_admin_style() {
	wp_register_style( 'fontawesome-style-admin', get_template_directory_uri() . '/css/font-awesome.min.css', false, '20190624' );
  wp_register_style( 'sm_custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '20190624' );
  wp_enqueue_style( 'fontawesome-style-admin' );
	wp_enqueue_style( 'sm_custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'segersmat_load_custom_wp_admin_style' );


/** -----------------------------------------------
* Customize the login screen
* ----------------------------------------------- */
function segersmat_custom_login_logo() {
	$style = '<style type="text/css"> h1 a { background: transparent url(' . get_bloginfo('template_directory') . '/img/login-logo.png) no-repeat center top !important; padding-bottom:0!important; width:320px!important; height:74px!important;} #login { padding:4% 0 0!important; }</style>';
	echo $style;
}
add_action( 'login_head', 'segersmat_custom_login_logo' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
