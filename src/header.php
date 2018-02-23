<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo get_bloginfo('name') ?></title>

    <!-- Styles and CSS -->
    <?php wp_head(); ?>
    <style>
        .header-bg {
            background: url("<?php echo get_theme_mod('header_background_image'); ?>");
            background-size: 350px;
            background-position: right -100px bottom;
            background-repeat: no-repeat;
        }
        @media screen and (min-width: 768px) {
            .header-bg {
                background-size: 600px;
            }
        }
        @media screen and (min-width: 992px) {
            .header-bg {
                background-size: 700px;
                background-position:  <?php echo get_theme_mod('header_background_position'); ?>;
            }
        }
        @media screen and (min-width: 1200px) {
            .header-bg{
                background-size: <?php echo get_theme_mod('header_background_size'); ?>;
                background-position:  <?php echo get_theme_mod('header_background_position'); ?>;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<header class="header-bg">
    <!-- Custom Logo -->
    <?php if (has_custom_logo()) : ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-4">
                <a href="<?php get_bloginfo('url'); ?>"><?php
                    $custom_logo_id = get_theme_mods();
                    $image = wp_get_attachment_image_src($custom_logo_id['custom_logo'], 'front-logo');
                    echo '<img src="' . $image[0] . '" class="company-logo" alt="company logo">'; ?></a>
            </div>
        </div>
    </div>
    <?php  endif;  ?>

    <nav class="navbar navbar-expand-md" role="navigation">
<!--        <a class="navbar-brand" href="--><?php //echo home_url(); ?><!--">--><?php //bloginfo('name'); ?><!--</a>-->
<!--        <div class="ml-auto">-->
<!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"-->
<!--                    aria-label="Toggle navigation">-->
<!--                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>-->
<!--            </button>-->
<!--        </div>-->
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php
        wp_nav_menu(array(
                'theme_location' => 'primary',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse justify-content-center',
                'container_id' => 'navbarNavDropdown',
                'menu_class' => 'navbar-nav hover-effect',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker())
        );
        ?>
    </nav>
    <?php
    $custom_logo_id = get_theme_mods();
    $image = wp_get_attachment_image_src($custom_logo_id['custom_logo'], 'full');
    ?>
    <div class="jumbotron jumbotron-fluid d-flex align-items-md-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo get_theme_mod('intro_header', 'I Am Steve'); ?></h1>
                    <p class="description"><?php bloginfo('description') ?></p>
                    <p><?php echo get_theme_mod('intro_text', 'Human. Friend. Daughter. Spinach. Photographer. Musician. Comedian. Developer. Food eater. Model. Tea. Fashion. Dj. Writer. Actor. Soup. Driver. Steve') ?></p>
                    <a class="btn btn-dark btn-lg" href="<?php echo get_theme_mod('intro_button_url', '#'); ?>"
                       role="button"><?php echo get_theme_mod('intro_button_text', 'Learn More About Me'); ?></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-navbar">
    <?php wp_nav_menu(array('theme_location' => 'mobile', 'menu_class' => 'd-flex justify-content-around')); ?>
</div>
