<?php get_header(); ?>
	<main>
        <section>
            <div class="row">
                <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
            		<?php
            		if (have_posts()) {
            			while (have_posts()) {
            				the_post(); ?>

                            <div class="wbg-area">
                                <h1><?php the_title(); ?></h1>
                        
                                <?php if (get_post_type($post) == 'post') : ?>
                                <h4><?php the_time('F j, Y'); ?></h4>
                                <?php endif; ?>
                        
                                <?php
                                $categories = get_the_category();
                                if ($categories) : ?>
                                    <h6>Categories:
                                        <ul class="categories">
                                            <?php foreach ($categories as $c) : ?>
                                            <li class="cat-item"><a href="<?php echo get_category_link($c->term_id); ?>" title="View all posts in <?php echo $c->name; ?>"><?php echo $c->name; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </h6>
                                <?php endif; ?>
                    
                                <?php if (has_tag()) : ?>
                                <h6><?php the_tags(); ?></h6>
                                <?php endif;?>
                    
                                <hr />
                            </div>
                            
                            <div class="wbg-area">
                                <?php the_content(); ?>
                            </div>
                            
                            <?php if (comments_open()) : ?>
                            <div class="wbg-area">
                                <hr />
                                <?php comments_template(); ?>
                            </div>
                            <?php endif; ?>
                            
                            <?php
                        }
                    }
                    ?>
                </div>
                <?php
                if (is_active_sidebar('main-sidebar')) {
                    get_sidebar();
                }
                ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>