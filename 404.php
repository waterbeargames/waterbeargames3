<?php get_header(); ?>
<section>
    <div class="row">
        <div class="col xs-12">
            <div class="col-inner">
                <h1><?php _e('404', 'water-bear-games'); ?></h1>
                <h2><?php _e('Page not found!', 'water-bear-games'); ?></h2>
                <p><?php _e('We are sorry. We couldn\'t find the page you were looking for.', 'water-bear-games'); ?></p>
                <a class="wbg-button" href="<?php echo get_site_url(); ?>"><i class="fa fa-home"></i> <?php _e('Go Back Home', 'water-bear-games'); ?></a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>