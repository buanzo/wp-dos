<?php
/**
 * WP_DOS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_DOS
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wp_dos_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_dos_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP_DOS, use a find and replace
		 * to change 'wp_dos' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp_dos', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' 	=> esc_html__( 'Primary', 'wp_dos' ),
			)
		);

		

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wp_dos_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'wp_dos_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_dos_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_dos_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_dos_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_dos_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wp_dos' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp_dos' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wp_dos' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp_dos' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'wp_dos' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wp_dos' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'wp_dos' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wp_dos' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wp_dos_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_dos_scripts() {
	wp_enqueue_style( 'wp_dos-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'wp_dos-bootstrap-reboot', get_template_directory_uri() .'/css/bootstrap-reboot.css', array(), '4.4.1' );
	wp_enqueue_style( 'wp_dos-bootstrap', get_template_directory_uri() .'/css/bootstrap.css', array(), '4.4.1' );
	wp_enqueue_style( 'highlightjs', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/styles/base16/3024.min.css', array(), '11.2.0' );
	wp_enqueue_style( 'wp_dos-bootstrap-grid', get_template_directory_uri() .'/css/bootstrap-grid.css', array(), '4.4.1' );
	
	wp_style_add_data( 'wp_dos-style', 'rtl', 'replace' );

	wp_enqueue_script("jquery");

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_script('wp-bootstrap-starter-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js', array(), '', true );
    } else {
        wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/js/popper.min.js', array(), '', true );
    }

	wp_enqueue_script( 'wp_dos-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'highlightjs', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/highlight.min.js', array(), '11.2.0', true);
	wp_enqueue_script( 'highlightjs-line-numbers', '//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.8.0/highlightjs-line-numbers.min.js"', array(), '2.8.0', true);
	
	wp_enqueue_script( 'hotkeys', '//unpkg.com/hotkeys-js/dist/hotkeys.min.js', array(), '3.8.3', true);
	wp_enqueue_script( 'wp_dos-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array(), '4.4.1', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_dos_scripts' );

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

  /* btn btn-secondary my-sm-0 */
  function as_adapt_search_form( $form ) {
	$form = str_replace(
		'wp-block-search__button',
		'btn btn-secondary my-sm-0',
		$form
	);
	return $form;
}

// run the search form HTML output through the newly defined filter
add_filter( 'get_search_form', 'as_adapt_search_form' );

function add_addition_attribute_on_a($attributes, $item, $args){
	if(isset($args->add_a_attribute)){
		$attributes['data-index'] = $args->add_a_attribute;
	}
	return $attributes;
}

add_filter('nav_menu_link_attributes', 'add_addition_attribute_on_a', 1, 3);




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

