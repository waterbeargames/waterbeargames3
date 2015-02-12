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
    
<section id="<?php echo $page_section->post_name; ?>" class="wbg-<?php echo $wbg_section_type; ?>"<?php echo (!empty($wbg_options['background_image']) ? ' style="background-image: url(' . $wbg_options['background_image'] . ');"' : ''); ?>>
    <?php if (!empty($wbg_options['title']) || !empty($wbg_options['main_content'])) : ?>
    <div class="row wbg-main-content">
        <div class="column xs-span12 md-span10 center">
            <div class="wbg-area">
                <?php
                if (!empty($wbg_options['title'])) {
                    echo '<div class="section-headline"><h2>' . $wbg_options['title'] . '</h2><hr />';
                }
            
                echo apply_filters('the_content', $wbg_options['main_content'])
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row wbg-<?php echo $wbg_section_type; ?>-content">
        <?php
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