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
                    <h2>Date: <?php single_month_title(' '); ?></h2>
                    <hr />
            		<?php
            			if (have_posts()) {
            				while (have_posts()) {
            					the_post();
                                get_template_part('loop');
                            }
                        
                            if ($found_posts > $posts_per_page) {
                                get_template_part('pagination');
                            }
                        } else { ?>
                            <h1>No results</h1>
                            <p>Sorry, no posts found.</p>
                            <?php
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