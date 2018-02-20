<?php get_header('custom'); ?>

<section class="mb-md-5 pb-4 content-area">
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
                            <div class="portfolio-card">
                                <?php
                                // Get image and change the size to thumbnail
                                $attachment_id = get_field('Thumbnail');
                                $size = 'medium_large'; // (thumbnail, medium, large, full or custom size)
                                $image = wp_get_attachment_image_src($attachment_id, $size);
                                ?>
                                <img src="<?php echo $image[0]; ?>"  class="img-fluid portfolio-thumb" alt="">
                                <!--<img src="--><?php //the_field('Thumbnail'); ?><!--" class="img-fluid portfolio-thumb" alt="">-->
                                <!-- Overlay doesn't appear on mobile -->
                                <div class="portfolio-overlay">
                                    <div class="align-self-center text-center">
                                        <p>
                                        <span class="detail-container">
                                            <span class="overlay-detail-label">
                                                Project
                                            </span>
                                            <span class="overlay-detail-name">
                                                <?php the_title(); ?>
                                            </span>
                                        </span>
                                        </p>
                                        <p>
                                        <span class="detail-container">
                                            <span class="overlay-detail-label">
                                                Category
                                            </span>
                                            <span class="overlay-detail-name">
                                                <?php
                                                $categories = get_the_category();
                                                foreach ($categories as $category) {
                                                    //added a space just in case multiple classes
                                                    echo $category->name;
                                                }
                                                ?>
                                            </span>
                                        </span>
                                        </p>
                                        <p class="overlay-link-label">More Info</p>
                                    </div>
                                </div>
                                <div class="mobile-portfolio-overlay">
                                    <span class="detail-container">
                                        <span class="overlay-detail-name">
                                            <?php
                                            $categories = get_the_category();
                                            foreach ($categories as $category) {
                                                //added a space just in case multiple classes
                                                echo $category->name;
                                            }
                                            ?>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


