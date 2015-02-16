<?php

$team_member = get_post_meta($post->ID, 'wbg_team_member', true);

?>

<?php get_header(); ?>
	<main>
        <section>
            <div class="row">
                <div class="column xs-span12">
            		<?php
            		if (have_posts()) {
            			while (have_posts()) {
            				the_post(); ?>
                            <div class="wbg-area section-headline">
                                <h1><?php the_title(); ?></h1>
                        
                                <?php if (!empty($team_member['title'])) : ?>
                                <h3><?php echo $team_member['title']; ?></h3>
                                <?php endif; ?>
                    
                                <hr />
                            </div>
                            <div class="wbg-area">
                                <?php the_content(); ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>