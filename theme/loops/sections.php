<?php
$page_sections = (new PuzzlePageBuilder)->sections_data();
$puzzle_sections = (new PuzzleSections)->sections();

if (!empty($page_sections)) :
    foreach ($page_sections as $s => $page_section) :
        $puzzle_section_type = $page_section['type'];
        
        /*
         * If this section type is not valid (likely because the user removed
         * this section type but its data was still in the database), skip it.
         */
        if (!array_key_exists($puzzle_section_type, $puzzle_sections)) continue;
        
        $puzzle_options_data = $page_section['options'];
        $puzzle_columns_data = (!empty($page_section['columns']) ? $page_section['columns'] : false);
        $puzzle_columns_num = count($puzzle_columns_data);
        
        $section_id = ppb_section_id($s, $page_section);
        
        $background_image = (!empty($puzzle_options_data['background_image']) ? ' ' . wp_get_attachment_url($puzzle_options_data['background_image']) : false);
        ?>
        
        <section id="<?php echo $section_id; ?>" class="<?php echo wbg_section_classes($page_section); ?>"<?php if ($background_image) echo ' style="background-image: url(' . $background_image . ');"'; ?>>
            <?php if (!empty($puzzle_options_data['background_bear'])) : ?>
            <div class="background-bear-container">
                <div class="background-bear">
                    <?php insert_svg(get_template_directory() . '/assets/images/bear.svg')?>
                </div>
            </div>
            <?php endif; ?>
        
            <?php if (!empty($puzzle_options_data['headline']) && $puzzle_section_type != 'two-column') : ?>
            <div class="row pz-section-headline">
                <div class="col xs-12">
                    <div class="col-inner">
                        <h2><?php echo esc_html($puzzle_options_data['headline']); ?></h2>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($main_content)) : ?>
            <div class="row pz-main-content">
                <div class="col xs-12 md-9 md-center">
                    <div class="col-inner">
                        <?php echo ppb_format_content($puzzle_options_data['main_content']); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
    
            <?php
            $special_sections = array('blog', 'games', 'news', 'team');
            
            if (in_array($puzzle_section_type, $special_sections)) :
                include(locate_template('theme/partials/section-' . $puzzle_section_type . '-content.php'));
            elseif (!empty($puzzle_columns_data)) : ?>
            <div class="row pz-columns-content">
                <?php
                foreach ($puzzle_columns_data as $c => $puzzle_column) {
                    include(ppb_locate_template($puzzle_section_type));
                }
                ?>
            </div>
            <?php endif; ?>
        </section>
        <?php
    endforeach;
endif;
?>