<?php
/**
 * Shop Petaluma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shop_Petaluma
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'shop_petaluma_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shop_petaluma_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Shop Petaluma, use a find and replace
		 * to change 'shop-petaluma' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shop-petaluma', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() 
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'shop-petaluma' ),
				'menu-footer' => esc_html__( 'Footer Menu', 'shop-petaluma' ),
				// 'menu-social' => esc_html__( 'Social Icons', 'shop-petaluma' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'shop_petaluma_custom_background_args',
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
add_action( 'after_setup_theme', 'shop_petaluma_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shop_petaluma_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'shop_petaluma_content_width', 640 );
}
add_action( 'after_setup_theme', 'shop_petaluma_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shop_petaluma_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shop-petaluma' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shop-petaluma' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shop_petaluma_widgets_init' );


/**
 * Remove width and height from featured images. ============================================================
 */
 
function remove_thumbnail_width_height( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5 );


/**
 * Pull excerpt from ACF textarea field ====================================================================
 https://codepad.co/snippet/how-to-pull-excerpt-from-advanced-custom-field
 */
function advanced_custom_field_excerpt() {
	global $post;
	$text = get_field('merchant_description');
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 29; // number of words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

/**
 * Register custom query vars
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function spet_register_query_vars( $vars ) {
    $vars[] .= 'spetcat';
    $vars[] .= 'zone';
    return $vars;
}
add_filter( 'query_vars', 'spet_register_query_vars' );



/**
 * Enqueue scripts and styles.
 */
function shop_petaluma_scripts() {
	wp_enqueue_style( 'shop-petaluma-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'shop-petaluma-style', 'rtl', 'replace' );

		/* bootstrap framework */
	wp_enqueue_style( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );

	/* font awesome */
	wp_enqueue_script( 'fontaw', 'https://use.fontawesome.com/b7c96a27ca.js', array(), '20151215', true );

		/* custom css */
	wp_enqueue_style( 'project-style', get_template_directory_uri() . '/css/main.css' );

	/* google font */
	wp_enqueue_style( 'gfont', '//fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Noto+Serif:400,400i,700,700i' );

	wp_enqueue_script( 'shop-petaluma-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'shop-petaluma-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shop_petaluma_scripts' );

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
 *  ======= Custom taxonomies. =============
 */
require get_template_directory() . '/inc/taxonomies.php';


/**
 *  ======= Custom post types. =============
 */
require get_template_directory() . '/inc/post-types.php';


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

