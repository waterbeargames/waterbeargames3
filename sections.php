<?php

global $wbg_sections;

$args = array(
    'sort_column'   => 'menu_order',
    'sort_order'    => 'ASC',
    'child_of'      => $post->ID,
    'meta_key'      => '_wp_page_template',
    'meta_value'    => 'template-section.php'
);

$page_sections = get_pages($args);

foreach($page_sections as $page_section) :
    $c = 0;
    $wbg_options = get_post_meta($page_section->ID, 'wbg_options', true);
    $wbg_columns = get_post_meta($page_section->ID, 'wbg_columns', true);
    $wbg_columns_num = count($wbg_columns);
    $wbg_section_type = get_post_meta($page_section->ID, 'wbg_section_type', true);
    
    $style = '';
    
    if (!empty($wbg_options['background_image'])) {
        $style = ' style="background-image: url(' . $wbg_options['background_image'] . ');';
        
        if (!empty($wbg_options['background_position'])) {
            $style .= ' background-position: ' . $wbg_options['background_position'] . ';';
        }
        
        $style .= '"';
    }
    
    ?>
    
<section id="<?php echo $page_section->post_name; ?>" class="wbg-<?php echo $wbg_section_type; ?> <?php echo $wbg_options['background_color']?>-background <?php echo $wbg_options['text_color']; ?>-text"<?php echo $style; ?>>
    <div class="row wbg-main-content">
        <div class="column xs-span12 md-span10 center">
            <?php if (!empty($wbg_options['title'])) : ?>
            <div class="wbg-area section-headline">
                <h2><?php echo $wbg_options['title']; ?></h2>
                <hr />
            </div>
            <?php endif; ?>
            <?php if (!empty($wbg_options['main_content'])) : ?>
            <div class="wbg-area">
                <?php echo apply_filters('the_content', $wbg_options['main_content']); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row wbg-<?php echo $wbg_section_type; ?>-content">
        <?php
        if ($wbg_section_type == 'team-members') {
            $args = array(
                'orderby'           => 'menu_order',
                'order'             => 'ASC',
                'posts_per_page'    => -1,
                'post_type'         => 'team-member'
            );
            $members = get_posts($args);
            $members_num = count($members);
            
            foreach ($members as $member) {
                $team_member_atts = get_post_meta($member->ID, 'wbg_team_member', true);
                echo team_member_markup($c, $members_num, $member, $team_member_atts);
                $c++;
            }
        } elseif ($wbg_section_type == 'news') {
            $args = array(
                'orderby'           => 'date',
                'order'             => 'DESC',
                'posts_per_page'    => $wbg_options['posts_num'],
                'post_type'         => 'news-story'
            );
            $news_stories = get_posts($args);
            $news_stories_num = count($news_stories);

            foreach ($wbg_columns as $wbg_column) {
                echo news_story_featured_markup($c, $wbg_columns_num, $wbg_options, $wbg_column);
                $c++;
            }

            foreach ($news_stories as $story) {
                $news_story_atts = get_post_meta($story->ID, 'wbg_news_story', true);
                echo news_story_markup($c, $news_stories_num, $story, $news_story_atts);
                $c++;
            } ?>
            <div class="column xs-span8 md-span6 center wbg-news-view-all">
                <div class="wbg-area">
                    <p><a class="wbg-button wbg-large-button" href="/news-story">View All News Stories</a></p>
                </div>
            </div>
            <?php
        } elseif ($wbg_section_type == 'blog-posts') {
            $args = array(
                'orderby'           => 'date',
                'order'             => 'DESC',
                'posts_per_page'    => $wbg_options['posts_num'],
                'post_type'         => 'post'
            );
            $blog_posts = get_posts($args);
            $blog_posts_num = count($news_stories);
            
            foreach ($blog_posts as $blog_post) {
                echo blog_post_markup($c, $blog_posts_num, $blog_post, array());
                $c++;
            } ?>
            <div class="column xs-span8 md-span6 center wbg-blog-posts-view-all">
                <div class="wbg-area">
                    <p><a class="wbg-button wbg-large-button" href="/blog">View All Blog Posts</a></p>
                </div>
            </div>
            <?php
        } elseif ($wbg_columns) {
            foreach($wbg_columns as $wbg_column) {
                foreach($wbg_sections as $wbg_section) {
                    if ($wbg_section_type == $wbg_section->get_group_name_slug()) {
                        // $markup() - the specific function needed to output this section's
                        //             markup for the individual columns, created using
                        //             the single name slug and the suffix '_markup'
                        //
                        // These specific methods can be found in 'wbg_markup.php'.
                        $markup = $wbg_section->get_single_name_slug() . '_markup';
                        echo $markup($c, $wbg_columns_num, $wbg_options, $wbg_column);
                        $c++;
                    }
                }
            }
        }
        ?>
    </div>
    <?php
    if (current_user_can('manage_options')) {
        echo '<a class="wbg-edit-section-button" href="' . get_site_url() . '/wp-admin/post.php?post=' . $page_section->ID . '&action=edit"><i class="fa fa-pencil"></i> Edit</a>';
    }
    ?>
</section>
<?php
endforeach;
?>