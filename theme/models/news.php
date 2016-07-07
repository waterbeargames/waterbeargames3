<?php
$news = new PuzzleSection;
$news->set_group_name('News')
    ->set_group_name_slug('news')
    ->set_fixed_column_num(0)
    ->set_order(40)
    ->set_options(array(
        'headline'          => array(
            'name'          => 'Headline',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'text',
            'save_as'       => 'h2'
        ),
        'id'                => array(
            'name'          => 'Section ID',
            'width'         => 'xs-span12 sm-span6',
            'tip'           => '<strong>Use this for linking directly to a section. Lowercase letters, numbers, dashes, and underscores only.</strong> If left blank, the Section ID will be the headline lowercase with words separated by dashes (symbols will be deleted). If both the Section ID and headline are blank, the Section ID will be "section-n" where "n" is the place that the section is in on the page (e.g. the 4th section on the page will be "section-4").',
            'input_type'    => 'text'
        ),
        'padding_top'       => array(
            'name'          => 'Top Padding',
            'width'         => 'xs-span12 sm-span3',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
        ),
        'padding_bottom'    => array(
            'name'          => 'Bottom Padding',
            'width'         => 'xs-span12 sm-span3',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
        ),
        'text_color_scheme' => array(
            'name'          => 'Text Color Scheme',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Dark'      => 'dark',
                'Light'     => 'light'
            )
        ),
        'background_image'  => array(
            'name'          => 'Background Image',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'image'
        ),
        'background_color'        => array(
            'name'          => 'Background Color',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'White'                     => 'white',
                'Alternative Background'    => 'alternative',
                'Primary Color'             => 'primary',
                'Secondary Color'           => 'secondary'
            )
        ),
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 10,
            'save_as'       => 'content'
        )
    ));

$puzzle_pieces = new PuzzlePieces;
$puzzle_pieces->add_section($news);
?>