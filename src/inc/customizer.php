<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 12/18/2017
 * Time: 1:54 PM
 */

function custom_settings($wp_customize)
{
    // Header image
    $wp_customize->add_section('header_section', array(
        'title' => 'Header Options',
        'description' => 'Options for custom header background',
        'priority' => 30
    ));
    //Background image
    $wp_customize->add_setting('header_background_image', array(
        'default' => get_stylesheet_directory_uri() . "/img/steven.jpg",
        'type' => 'theme_mod'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_background_image', array(
        'label' => 'Header Background Image',
        'section' => 'header_section',
        'settings' => 'header_background_image',
        'priority' => 1
    )));

    $wp_customize->add_setting('header_background_size', array(
        'default' => _x('850px', 'stevensteinwand'),
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('header_background_size', array(
        'label' => __('background size in pixels css property', 'stevensteinwand'),
        'section' => 'header_section',
        'type' => 'text',
        'priority' => 2
    ));
    $wp_customize->add_setting('header_background_position', array(
        'default' => _x('right 15% bottom', 'stevensteinwand'),
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('header_background_position', array(
        'label' => __('Background Position', 'stevensteinwand'),
        'section' => 'header_section',
        'type' => 'text',
        'priority' => 3
    ));
    //Intro Header
    $wp_customize->add_setting('intro_header', array(
        'default' => _x('I Am Steve', 'stevensteinwand'),
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('intro_header', array(
        'label' => __('Intro Heading', 'stevensteinwand'),
        'section' => 'header_section',
        'type' => 'text',
        'priority' => 4
    ));

    //Intro Text
    $wp_customize->add_setting('intro_text', array(
        'default' => _x('Human. Friend. Daughter. Spinach. Photographer. Musician. Comedian. Developer. Food eater. Model. Tea. Fashion. Dj. Writer. Actor. Soup. Driver. Steve', 'stevensteinwand'),
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('intro_text', array(
        'label' => __('Intro Text', 'stevensteinwand'),
        'section' => 'header_section',
        'type' => 'textarea',
        'priority' => 5
    ));

    //Button Url
    $wp_customize->add_setting('intro_button_url', array(
        'default' => _x('#', 'stevensteinwand'),
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control('intro_button_url', array(
        'label' => __('Button Url', 'stevensteinwand'),
        'section' => 'header_section',
        'type' => 'text',
        'priority' => 6
    ));

    //Button Text
    $wp_customize->add_setting('intro_button_text', array(
        'default' => _x('Contact Us', 'stevensteinwand'),
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control('intro_button_text', array(
        'label' => __('Button Text', 'stevensteinwand'),
        'section' => 'header_section',
        'type' => 'text',
        'priority' => 7
    ));

}

add_action('customize_register', 'custom_settings');

function customizer_css()
{ ?>
    <style type="text/css">

    </style>

<?php }

add_action('wp_head', 'customizer_css');

?>