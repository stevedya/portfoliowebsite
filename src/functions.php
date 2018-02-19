<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2/17/2018
 * Time: 1:52 PM
 */

//Include the customizer
include (get_template_directory() . "/inc/customizer.php");
// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
//Bootstrap NavWalker
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/* ==========================================================================
  Register Theme Options
   ========================================================================== */
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'stevensteinwand' ),
    'mobile' => __('Mobile Icon Menu', 'stevensteinwand' ),
    'secondary' => __('Footer Menu', 'stevensteinwand' )
    //Make sure to put theme name on right
));
//Custom Logo
add_theme_support('custom-logo');
//menus?
add_theme_support('menus');
//post thumbnails
add_theme_support('post-thumbnails');

/* ==========================================================================
  Load Styles
   ========================================================================== */
function load_theme_styles()
{
    //fonts
    wp_enqueue_style('google_fonts', "https://fonts.googleapis.com/css?family=Poppins");
    // Font awesome
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js');
    //wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css');
    //bootstrap
    wp_enqueue_style('boostrap_framework', get_template_directory_uri() . "/css/bootstrap.min.css");
    //main style
    wp_enqueue_style("style", get_stylesheet_uri());
}

add_action("wp_enqueue_scripts", "load_theme_styles");

/* ==========================================================================
  Load Scripts
   ========================================================================== */
function load_js_scripts()
{
    wp_deregister_script('jQuery');
    //jquery
    wp_enqueue_script('jQuery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), null, true);
    //modernizr
    wp_enqueue_script("modernizr", "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js");
    //Popper required for bootstrap
    wp_enqueue_script("popper", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js", array( 'jQuery'),1,true);
    //Bootstrap Js
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jQuery' ),1,true);
    //Font Awesome

    //isotope for image sorting
    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jQuery'), 1, true);
    //main js
    wp_enqueue_script('main-js', get_template_directory_uri() .  '/js/main.js', array('jQuery'),1 ,true);
}

add_action("wp_enqueue_scripts", "load_js_scripts");

/* ==========================================================================
  Theme Widgets
   ========================================================================== */
function theme_widget_setup() {

    register_sidebar(
        array(
            'name'  => 'About Sidebar',
            'id'    => 'sidebar-1',
            'class' => 'sidebar-one',
            'description' => 'The About Sidebar',
            'before_widget' => '<div id="%1$s" class="sidebar-link widget %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h4 class="main-sidebar">',
            'after_title'   => "</h4>\n",
        )
    );
    register_sidebar(
        array(
            'name'  => 'Link Area',
            'id'    => 'sidebar-2',
            'class' => 'sidebar-link-area',
            'description' => 'The Link Area',
            'before_widget' => '<div id="%1$s" class="sidebar-link widget %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h4 class="link-sidebar">',
            'after_title'   => "</h4><hr>\n",
        )
    );
    register_sidebar(
        array(
            'name'  => 'Footer Social Media',
            'id'    => 'social-media',
            'class' => 'social-media',
            'description' => 'Footer Social Media',
            'before_widget' => '<div id="%1$s" class="sidebar-link widget %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h4 class="link-sidebar">',
            'after_title'   => "</h4>\n",
        )
    );
}

add_action('widgets_init', 'theme_widget_setup');

/* ==========================================================================
  Isotope Function - Written all by myself
   ========================================================================== */

function make_isotope_buttons() {
    $categories = get_categories();
    foreach ($categories as $category) {
        if ($category->slug != "uncategorized") {
            echo '<button class="btn btn-primary m-2 isotope-buttons" data-filter=".' . $category->slug. '">' . $category->name .'</button>';
        }
    }
}

function get_isotope_classes() {
    // get the category slug from the post object
    $categories = get_the_category();
    foreach ($categories as $category) {
        //added a space just in case multiple classes
        if($category->slug != 'uncategorized') {
            echo $category->slug . " ";
        }
    }
}

