<?php get_header('custom'); ?>

<section class="mb-md-5 pb-4 pt-3 content-area">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-12">
                    <?php
                    // Get image and change the size to thumbnail
                    $attachment_id = get_field('Thumbnail');
                    $size = 'custom-full'; // (thumbnail, medium, large, full or custom size)
                    $image = wp_get_attachment_image_src($attachment_id, $size);
                    ?>
                      <img src="<?php echo $image[0]; ?>"  class="img-fluid" alt="">
                    <!-- If using URL to display image-->
<!--                    <img src="--><?php //the_field('Thumbnail'); ?><!--" class="img-fluid" alt="">-->
                    <h4 class=" pb-3 pt-4 pt-md-5"><?php the_title(); ?></h4>
                </div>
                <div class="col-md-8">
                    <?php the_content(); ?>
                </div>
                <div class="col-md-4">
                    <p>
                    <span class="detail-container">
                        <!-- Client Name -->
                        <?php
                        $client = get_field_object('client_name');
                        $client_label = $client['label'];
                        $client_name = $client['value'];
                        ?>
                        <span class="detail-label">
                            <?php echo $client_label . " "; ?>
                        </span>
                        <span class="detail-name">
                            <?php echo $client_name; ?>
                        </span>
                    </span>
                    </p>
                    <p>
                    <span class="detail-container">
                        <!-- Client Name -->
                        <?php
                        $client = get_field_object('client_website');
                        $client_label = $client['label'];
                        $client_name = $client['value'];
                        ?>
                        <span class="detail-label">
                            <?php echo $client_label . " "; ?>
                        </span>
                        <span class="detail-name">
                            <a href="http://<?php echo $client_name; ?>"><?php echo $client_name; ?></a>
                        </span>
                    </span>
                    </p>
                    <p>
                    <span class="detail-container">
                        <!-- Client Name -->
                        <?php
                        $client = get_field_object('completion_date');
                        $client_label = $client['label'];
                        $client_name = $client['value'];
                        ?>
                        <span class="detail-label">
                            <?php echo $client_label . " "; ?>
                        </span>
                        <span class="detail-name">
                            <?php echo $client_name; ?>
                        </span>
                    </span>
                    </p>
                    <p>
                        <span class="detail-container">
                            <span class="detail-label">
                                Category
                            </span>
                            <span class="detail-name">
                                <?php
                                $category_id = get_cat_ID('products');
                                $categories = get_the_category($category_id);
                                foreach ($categories as $category) {
                                    echo $category->cat_name;
                                }
                                ?>
                            </span>
                        </span>

                    </p>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>


