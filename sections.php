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
            <?php if (!empty($puzzle_options_data['overlay'])) : ?>
            <div class="puzzle-background-overlay <?php echo $background_color; ?>"></div>
            <?php endif; ?>
        
            <?php if (!empty($puzzle_options_data['headline'])) : ?>
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
            if ($puzzle_section_type == 'games') :
                include(locate_template('section-games-content.php'));
            elseif (!empty($puzzle_columns_data)) : ?>
            <div class="row puzzle-<?php echo $puzzle_section_type; ?>-content">
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
        if ($puzzle_section_type == 'header' && $puzzle_columns_num > 1) :
            $owl_autoplay = (!empty($puzzle_options_data['speed']) ? $puzzle_options_data['speed'] : '10000');
            $owl_navigation = (!empty($puzzle_options_data['hide_arrows']) ? 'false' : 'true');
            $owl_pagination = (!empty($puzzle_options_data['hide_pagination']) ? 'false' : 'true');
            ?>
            <script id="<?php echo $section_id; ?>-carousel-script">
            jQuery('#<?php echo $section_id; ?> .puzzle-header-content').owlCarousel({
                items: 1,
                singleItem: true,
                autoPlay: <?php echo $owl_autoplay; ?>,
                navigation: <?php echo $owl_navigation; ?>,
                navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                pagination: <?php echo $owl_pagination; ?>,
                transitionStyle: 'fade'
            });
            jQuery('#<?php echo $section_id; ?>-carousel-script').remove();
            </script>
        <?php
        endif;
        
        $s++;
    endforeach;
endif;
?>