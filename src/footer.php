<section class="social-media">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <?php if (dynamic_sidebar('social-media')) : else : echo "Add a Widget to Link Area"; endif; ?>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="col-12 pb-1 pt-3 text-center">
        <p>&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?> </p>
    </div>
</footer>
<!-- Javascript Import -->
<?php wp_footer(); ?>
</body>
</html>