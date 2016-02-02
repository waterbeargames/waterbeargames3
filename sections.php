<?php
$page_sections = get_post_meta($post->ID, 'puzzle_page_sections', true);

if (!empty($page_sections)) :
    $s = 0;
    
    foreach ($page_sections as $page_section) :
        $puzzle_options_data = $page_section['options'];
        $puzzle_columns_data = (!empty($page_section['columns']) ? $page_section['columns'] : false);
        $puzzle_columns_num = count($puzzle_columns_data);
        $puzzle_section_type = $page_section['type'];
    
        $main_content = (!empty($puzzle_options_data['main_content']) ? $puzzle_options_data['main_content'] : false);
        $background_image = (!empty($puzzle_options_data['background_image']) ? ' ' . wp_get_attachment_url($puzzle_options_data['background_image']) : false);
        
        if (!empty($puzzle_options_data['id'])) {
            $section_id = $puzzle_options_data['id'];
        } elseif (!empty($puzzle_options_data['headline'])) {
            $section_id = to_slug($puzzle_options_data['headline']);
        } else {
            $section_id = 'section-' . ($s + 1);
        }
        ?>
        <section id="<?php echo $section_id; ?>" class="<?php echo section_classes($page_section); ?>"<?php echo ($background_image ? ' style="background-image: url(' . $background_image . ');"' : ''); ?>>
            <?php if (!empty($puzzle_options_data['background_bear'])) : ?>
            <div class="background-bear-container">
                <div class="background-bear">
                    <?php insert_svg(get_template_directory() . '/assets/images/bear.svg')?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($puzzle_options_data['overlay'])) : ?>
            <div class="puzzle-background-overlay <?php echo $background_color; ?>"></div>
            <?php endif; ?>
        
            <?php if (!empty($puzzle_options_data['headline']) && $puzzle_section_type != 'two-column') : ?>
            <div class="row puzzle-section-headline">
                <div class="column xs-span12">
                    <div class="column-inner">
                        <h2><?php echo $puzzle_options_data['headline']; ?></h2>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($main_content)) : ?>
            <div class="row puzzle-main-content">
                <div class="column xs-span12 md-span9 md-center">
                    <div class="column-inner">
                        <?php echo apply_filters('the_content', $main_content); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
    
            <?php
            $special_sections = array('blog', 'games', 'news', 'team');
            
            if (in_array($puzzle_section_type, $special_sections)) :
                include(locate_template('section-' . $puzzle_section_type . '-content.php'));
            elseif (!empty($puzzle_columns_data)) : ?>
            <div class="row puzzle-columns-content">
                <?php
                $c = 0;
                $loop_file = 'theme/loops/' . $puzzle_section_type . '.php';
        
                foreach($puzzle_columns_data as $puzzle_column) {
                    include(locate_template($loop_file));
                    $c++;
                }
                ?>
            </div>
            <?php endif; ?>
        </section>
        <?php
        $s++;
    endforeach;
endif;
?>