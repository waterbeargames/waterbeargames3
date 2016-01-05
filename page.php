<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        get_header();
        ?>
        <main>
            <section>
                <div class="row puzzle-section-headline">
                    <div class="column xs-span12">
                        <div class="column-inner">
                            <h2><?php echo get_the_title(); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="column xs-span12">
                        <div class="column-inner">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php
        get_footer();
    endwhile;
endif;
?>