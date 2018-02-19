<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2/17/2018
 * Time: 11:22 PM
 */
get_header(); ?>
<section class="link-area">
    <div class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <?php if (dynamic_sidebar('sidebar-2')) : else : echo "Add a Widget to Link Area"; endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>

