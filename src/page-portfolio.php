<?php get_header('custom'); ?>
<section class="mb-md-5 py-4 content-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <?php $portfolio_pieces = new WP_Query(['post_type' => 'portfolio']); ?>
                    <?php if ($portfolio_pieces->have_posts()) : ?>
                        <?php while ($portfolio_pieces->have_posts()) : $portfolio_pieces->the_post(); ?>
                            <a class="col-sm-6 col-md-4" href="<?php the_permalink(); ?>">
                                <div class="card">
                                    <img src="<?php the_field('Thumbnail'); ?>" class="img-fluid" alt="">
                                    <h5 class="p-4"><?php the_title(); ?></h5>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


