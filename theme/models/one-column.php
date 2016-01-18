<?php
$one_column = new PuzzleSection;
$one_column->set_group_name('One Column')
    ->set_group_name_slug('one-column')
    ->set_single_name('Column')
    ->set_fixed_column_num(1)
    ->set_admin_column_classes('xs-span12')
    ->set_order(10)
    ->set_markup_attr(array(
        'width'             => array(
            'name'          => 'Width',
            'width'         => 'xs-span12 sm-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Full Width'    => 'full',
                'Medium'        => 'medium',
                'Narrow'        => 'narrow'
            )
        ),
        'text_color_scheme' => array(
            'name'          => 'Text Color Scheme',
            'width'         => 'xs-span12 sm-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Dark'      => 'dark',
                'Light'     => 'light'
            )
        ),
        'background_color'  => array(
            'name'          => 'Background Color',
            'width'         => 'xs-span12 sm-span4',
            'input_type'    => 'select',
            'options'       => array(
                'None'                      => '',
                'White'                     => 'white',
                'Alternative Background'    => 'alternative',
                'Primary Color'             => 'primary',
                'Secondary Color'           => 'secondary',
                'Accent Color'              => 'accent'
            )
        ),
        'content'           => array(
            'name'          => 'Content',
            'input_type'    => 'textarea',
            'rows'          => 10,
            'save_as'       => 'content'
        )
    ))
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
        'align_items'       => array(
            'name'          => 'Position Content',
            'width'         => 'xs-span12 sm-span3',
            'input_type'    => 'select',
            'options'       => array(
                'Left'      => 'left',
                'Center'    => 'center',
                'Right'     => 'right'
            ),
            'selected'      => 'center'
        ),
        'padding_top'       => array(
            'name'          => 'Top Padding',
            'width'         => 'xs span12 sm-span3',
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
            'width'         => 'xs span12 sm-span3',
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
            'width'         => 'xs-span12 sm-span3',
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
        'overlay'           => array(
            'name'          => 'Overlay background color on background image',
            'input_type'    => 'checkbox'
        )
    ));

$puzzle_pieces = new PuzzlePieces;
$puzzle_pieces->add_section($one_column);
?>