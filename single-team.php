<?php
get_header();
the_post();

$team_meta = get_post_meta($post->ID, 'wbg_team', true);
$team_images = array_filter($team_meta['images']);
?>
<main>
    <section>
        <div class="row">
            <div class="column xs-span12<?php echo (!empty($team_images) ? ' md-span7' : ''); ?>">
                <div class="column-inner">
                    <h2><?php echo get_the_title(); ?></h2>
                    <?php if (!empty($team_meta['title'])) : ?>
                    <h4><?php echo $team_meta['title']; ?></h4>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php if (!empty($team_images)) : ?>
            <div class="column xs-span12 md-span5 team-member-images">
                <div class="column-inner">
                <?php
                foreach ($team_images as $image) {
                    echo wp_get_attachment_image($image, 'full');
                }
                ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>