<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2/17/2018
 * Time: 10:25 PM
 */?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo get_bloginfo('name') ?></title>

<!-- Styles and CSS -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$custom_logo_id = get_theme_mods();
$image = wp_get_attachment_image_src($custom_logo_id['custom_logo'], 'full');
?>
<header>
    <div class="ml-auto">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fas fa-bars"></i></span>
        </button>
    </div>
    <nav class="navbar navbar-expand-md" role="navigation">
        <!--        <a class="navbar-brand" href="--><?php //echo home_url(); ?><!--">--><?php //bloginfo('name'); ?><!--</a>-->


        <!-- Brand and toggle get grouped for better mobile display -->
        <?php
        wp_nav_menu(array(
                'theme_location' => 'primary',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse justify-content-center',
                'container_id' => 'navbarNavDropdown',
                'menu_class' => 'navbar-nav',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker())
        );
        ?>
    </nav>
</header>
