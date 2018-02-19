<?php get_header('custom'); ?>

<section class="mb-md-5 py-4 content-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                    <hr>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <div class="py-4 button-group filter-button-group text-center">
                    <button class="btn btn-primary m-2 isotope-buttons" data-filter="*">show all</button>
                <?php make_isotope_buttons(); //made in functions.php ?>
                </div>
                <div class="grid">
                    <?php $portfolio_pieces = new WP_Query(['post_type' => 'portfolio']); ?>
                    <?php if ($portfolio_pieces->have_posts()) : while ($portfolio_pieces->have_posts()) : $portfolio_pieces->the_post(); ?>
                        <a class="grid-item <?php get_isotope_classes(); //made in functions ?>" href="<?php the_permalink(); ?>">
                            <div class="card">
                                <img src="<?php the_field('Thumbnail'); ?>" class="img-fluid" alt="">
<!--                                <h5 class="p-4">--><?php //the_title(); ?><!--</h5>-->
                            </div>
                        </a>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


