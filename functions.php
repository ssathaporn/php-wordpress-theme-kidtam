<?php
/**
 * kidtam functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kidtam
 */

if ( ! function_exists( 'kidtam_setup' ) ) :

define('THEME_PATH', get_template_directory_uri());
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kidtam_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kidtam, use a find and replace
	 * to change 'kidtam' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kidtam', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	// add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'kidtam' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kidtam_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'kidtam_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kidtam_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kidtam_content_width', 640 );
}
add_action( 'after_setup_theme', 'kidtam_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kidtam_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kidtam' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kidtam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar2', 'kidtam' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'kidtam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Adsence', 'kidtam' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'kidtam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kidtam_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kidtam_scripts() {
	wp_enqueue_style( 'kidtam-style', get_stylesheet_uri() );

	// wp_enqueue_style( 'main-font', "https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin");
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri()."/bower_components/bootstrap/dist/css/bootstrap.min.css");
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri()."/bower_components/font-awesome/css/font-awesome.min.css");
	wp_enqueue_style( 'main-style', get_template_directory_uri()."/assets/css/main.css");

	wp_enqueue_script( 'kidtam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kidtam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kidtam_scripts' );


// Issues with sharing posts on Facebook: http://www.passwordincorrect.com/issue-with-sharing-wordpress-posts-to-facebook/
// Add this chunck of code in your functions.php or anywhere else in your theme files.
// Register action for post status transitions
add_action( 'transition_post_status' , 'purge_future_post', 10, 3);
// Check if the new transition is publish, for correctness you could check if $old_status == 'pending', but I want that every post (which is published) is cached again (just to be sure). 
function purge_future_post( $new_status, $old_status, $post ) {
    if($new_status == 'publish') {
        purge_facebook_cache($post);
    }
}
// Ping Facebook to recache the URL.
function purge_facebook_cache($post_id) {
    $url = get_permalink($post_id);
    // $fb_graph_url = "https://graph.facebook.com/?id=". urlencode($url) ."&scrape=true";
    // $result = wp_remote_post($fb_graph_url);


    wp_remote_post(
    'https://graph.facebook.com/',
	    [
	        'body' => [
	            'id' => $url,
	            'scrape' => 'true',
	            'access_token'  => '251182568588046' . '|' . '4b74d6f60bcf6120ab3a92e5bc4df292',
	        ]
	    ]
	);
}

function custom_number_format($n) {
    // first strip any formatting;
        $n = (0+str_replace(",","",$n));
        
        // is this a number?
        if(!is_numeric($n)) return false;
        
        // now filter it;
        if($n>1000000000000) return round(($n/1000000000000),1).'T';
        else if($n>1000000000) return round(($n/1000000000),1).'B';
        else if($n>1000000) return round(($n/1000000),1).'M';
        else if($n>1000) return round(($n/1000),1).'K';
        
        return number_format($n);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
