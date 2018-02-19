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
    //modernizr
    wp_enqueue_script("modernizr", "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js");
    //Popper required for bootstrap
    wp_enqueue_script("popper", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js", array( 'jquery'),1,true);
    //Bootstrap Js
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),1,true);
    //isotope for image sorting
    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), 1, true);
    //main js
    wp_enqueue_script("main-js", get_theme_file_uri( '/js/main.js' ), array( 'jquery'),1,true);

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
}

add_action('widgets_init', 'theme_widget_setup');
