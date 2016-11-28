<?php
get_header();
the_post();
?>
<section>
    <div class="pz-row pz-section-headline">
        <div class="column xs-12">
            <div class="col-inner">
                <h2><?php echo get_the_title(); ?></h2>
            </div>
        </div>
    </div>
    <div class="pz-row">
        <div class="column xs-12">
            <div class="col-inner">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>