<?php get_header('custom'); ?>
<section class="mb-md-5 pb-4 pt-3 content-area">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="col-12 py-md-5">
                        <h2><?php the_title(); ?></h2>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('', array(
                                    'class' => 'img-fluid text-center rounded-circle'));
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p class="pt-2"><?php the_content(); ?></p>
                    </div>
                    <!-- Post thumbnail -->
                <?php endwhile; ?>
            <?php endif; ?>
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

