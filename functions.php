<?php
/**
 * dmenta_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dmenta_theme
 */

/**
 * CONFIG
 */
require_once 'config.php';


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.1' );
}

if ( ! function_exists( 'dmenta_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function dmenta_theme_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on dmenta_theme, use a find and replace
         * to change 'dmenta_theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'dmenta_theme', get_template_directory() . '/languages' );

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
                'menu-1' => esc_html__( 'Primary', 'dmenta_theme' ),
            ),
            array(
                'menu-2' => esc_html__( 'Secondary', 'dmenta_theme' ),
            )
        );

        /**
         * Add bootstrap classes to individual menu list items
         */
        function filter_bootstrap_nav_menu_css_class($classes, $item, $args) {
          if (isset($args->bootstrap)) {
            $classes[] = 'nav-item';

            if (in_array('menu-item-has-children', $classes)) {
              $classes[] = 'dropdown';
            }

            if (in_array('dropdown-header', $classes)) {
              unset($classes[array_search('dropdown-header', $classes)]);
            }
          }
          return $classes;
        }
        add_filter('nav_menu_css_class', 'filter_bootstrap_nav_menu_css_class', 10, 3);

        /**
         * Add bootstrap attributes to individual link elements.
         */
        function filter_bootstrap_nav_menu_link_attributes($atts, $item, $args, $depth) {
          if (isset($args->bootstrap)) {
            if (!$atts['class']) {
              $atts['class'] = '';
            }

            if ($depth > 0) {
              if (in_array('dropdown-header', $item->classes)) {
                $atts['class'] = 'dropdown-header';
              } else {
                $atts['class'] .= 'dropdown-item';
              }

              if ($item->description) {
                $atts['class'] .= ' has-description';
              }
            } else {
              $atts['class'] .= 'nav-link';

              if (in_array('menu-item-has-children', $item->classes)) {
                $atts['class'] .= ' dropdown-toggle';
                $atts['role'] = 'button';
                $atts['data-toggle'] = 'dropdown';
                $atts['aria-haspopup'] = 'true';
                $atts['aria-expanded'] = 'false';
              }
            }
          }
          return $atts;
        }
        add_filter('nav_menu_link_attributes', 'filter_bootstrap_nav_menu_link_attributes', 10, 4);

        /**
         * Add bootstrap classes to dropdown menus.
         */
        function filter_bootstrap_nav_menu_submenu_css_class($classes, $args, $depth) {
          if (isset($args->bootstrap)) {
            $classes[] = 'dropdown-menu';
          }
          return $classes;
        }
        add_filter('nav_menu_submenu_css_class', 'filter_bootstrap_nav_menu_submenu_css_class', 10, 3);

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

        add_theme_support( 'post-formats', 
            array( 
                'aside', 
                'gallery',
                'link',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat'
            ) 
        );
        add_post_type_support( 'post', 'post-formats' );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action( 'after_setup_theme', 'dmenta_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dmenta_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'dmenta_theme' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'dmenta_theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'dmenta_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dmenta_theme_scripts() {
    $theme = wp_get_theme();
    
    wp_enqueue_style( $theme->get('TextDomain') . '-app' , get_template_directory_uri() . '/dist/css/app.css' , array() , $theme->get('Version') , 'all' );
    wp_enqueue_script( $theme->get('TextDomain') . '-app' , get_template_directory_uri() . '/dist/js/app.js' , array() , $theme->get('Version') , true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'dmenta_theme_scripts' );

/**
 * Title category
 */
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
