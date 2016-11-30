<?php
get_header();
the_post();

$team_meta = get_post_meta($post->ID, '_wbg_team', true);
$team_images = (!empty($team_meta['images']) ? array_filter($team_meta['images']) : '');
?>
<section>
    <div class="row">
        <div class="col xs-12<?php if (!empty($team_images)) echo ' md-7'; ?>">
            <div class="col-inner">
                <?php the_title('<h2>', '</h2>'); ?>
                
                <?php if (!empty($team_meta['title'])) : ?>
                <h4><?php echo $team_meta['title']; ?></h4>
                <?php endif; ?>
                
                <?php the_content(); ?>
            </div>
        </div>
        <?php if (!empty($team_images)) : ?>
        <div class="col xs-12 md-5 team-member-images">
            <div class="col-inner">
                <?php foreach ($team_images as $image) echo wp_get_attachment_image($image, 'full'); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>