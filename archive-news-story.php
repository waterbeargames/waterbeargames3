<?php
global $wp_query;

$posts_per_page = $wp_query->query_vars['posts_per_page'];
$found_posts = $wp_query->found_posts;
?>

<?php get_header(); ?>
	<main>
        <section>
            <div class="row">
                <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
                    <div class="wbg-area">
            		<?php
            			if (have_posts()) { ?>
                            <h2>News Stories</h2>
                            <h4><?php echo $found_posts ?> news stor<?php echo ($found_posts != 1 ? 'ies' : 'y'); ?></h4>
                            <?php
            				while (have_posts()) {
            					the_post();
                                get_template_part('loop-news-story');
                            }
                        
                            if ($found_posts > $posts_per_page) {
                                get_template_part('pagination');
                            }
                        } else { ?>
                            <h1>No results</h1>
                            <p>Sorry, no news stories found.</p>
                            <?php
                        }
                    ?>
                    </div>
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