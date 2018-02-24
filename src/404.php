<?php get_header('custom'); ?>
<section class="mb-md-5 py-4 content-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="my-3">NOPE! That page doesn't exist</h3>
                <img src="<?php echo get_template_directory_uri() . '/img/404.jpg' ?>" alt="nope page not found" class="my-2 img-fluid">
                <p>Please use the navigation to continue to the real site.</p>
            </div>
        </div>
    </div>
</section>
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

