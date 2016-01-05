<?php
$page_sections = get_post_meta($post->ID, 'puzzle_page_sections', true);

if (!empty($page_sections)) :
    $s = 0;
    
    foreach ($page_sections as $page_section) :
        $puzzle_options = $page_section['options'];
        $puzzle_columns = $page_section['columns'];
        $puzzle_columns_num = count($puzzle_columns);
        $puzzle_section_type = $page_section['type'];
    
        $main_content = (!empty($puzzle_options['main_content']) ? $puzzle_options['main_content'] : false);
    
        $background_color = (!empty($puzzle_options['background_color']) ? ' ' . $puzzle_options['background_color'] : '');
        $background_image = (!empty($puzzle_options['background_image']) ? ' ' . wp_get_attachment_url($puzzle_options['background_image']) : false);
        $text_color_scheme = (!empty($puzzle_options['text_color_scheme']) ? ' ' . $puzzle_options['text_color_scheme'] : '');
        $padding_top = (!empty($puzzle_options['padding_top']) ? ' ' . $puzzle_options['padding_top'] . '-padding-top' : '');
        $padding_bottom = (!empty($puzzle_options['padding_bottom']) ? ' ' . $puzzle_options['padding_bottom'] . '-padding-bottom' : '');
        $open_one_accordion_at_a_time = (!empty($puzzle_options['open_one_at_a_time']) ? ' puzzle-accordions-one-open' : '');
    
        $section_classes = $puzzle_section_type . $background_color . $text_color_scheme . $padding_top . $padding_bottom . $open_one_accordion_at_a_time;
        
        if (!empty($puzzle_options['id'])) {
            $section_id = $puzzle_options['id'];
        } elseif (!empty($puzzle_options['headline'])) {
            $section_id = to_slug($puzzle_options['headline']);
        } else {
            $section_id = 'section-' . ($s + 1);
        }
        ?>
    
        <section id="<?php echo $section_id; ?>" class="puzzle-<?php echo $section_classes; ?>"<?php echo ($background_image ? ' style="background-image: url(' . $background_image . ');"' : ''); ?>>
            <?php if (!empty($puzzle_options['overlay'])) : ?>
            <div class="puzzle-background-overlay <?php echo $background_color; ?>"></div>
            <?php endif; ?>
        
            <?php if (!empty($puzzle_options['headline'])) : ?>
            <div class="row puzzle-section-headline">
                <div class="column xs-span12">
                    <div class="column-inner">
                        <h2><?php echo $puzzle_options['headline']; ?></h2>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($main_content)) : ?>
            <div class="row puzzle-main-content">
                <div class="column xs-span12">
                    <div class="column-inner">
                        <?php echo apply_filters('the_content', $main_content); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
    
            <?php if (!empty($puzzle_columns)) : ?>
            <div class="row puzzle-<?php echo $puzzle_section_type; ?>-content">
                <?php
                $c = 0;
                $loop_file = 'theme/loops/' . $puzzle_section_type . '.php';
        
                foreach($puzzle_columns as $puzzle_column) {
                    include(locate_template($loop_file));
                    $c++;
                }
                ?>
            </div>
            <?php endif; ?>
        </section>
        <?php
        if ($puzzle_section_type == 'header' && $puzzle_columns_num > 1) :
            $owl_autoplay = (!empty($puzzle_options['speed']) ? $puzzle_options['speed'] : '10000');
            $owl_navigation = (!empty($puzzle_options['hide_arrows']) ? 'false' : 'true');
            $owl_pagination = (!empty($puzzle_options['hide_pagination']) ? 'false' : 'true');
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