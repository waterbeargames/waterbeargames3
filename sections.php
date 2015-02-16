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
    
    ?>
    
<section id="<?php echo $page_section->post_name; ?>" class="wbg-<?php echo $wbg_section_type; ?> <?php echo $wbg_options['background_color']?>-background <?php echo $wbg_options['text_color']; ?>-text"<?php echo (!empty($wbg_options['background_image']) ? ' style="background-image: url(' . $wbg_options['background_image'] . ');"' : ''); ?>>
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