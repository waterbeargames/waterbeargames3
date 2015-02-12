<?php
$wbgNews = new wbgSection;
$wbgNews->set_group_name('News')
    ->set_group_name_slug('news')
    ->set_single_name('Featured Story')
    ->set_single_name_slug('news_story_feature')
    ->set_multiple(true)
    ->set_admin_column_classes('xs-span12')
    ->set_markup_attr(array(
        'xs-span'           => array(
            'name'          => 'XS Width',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11',
                '12'        => '12'
            ),
            'selected'      => '12'
        ),
        'xs-left'           => array(
            'name'          => 'XS Left',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '0'         => '0',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11'
            )
        ),
        'xs-right'          => array(
            'name'          => 'XS Right',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '0'         => '0',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11'
            )
        ),
        'sm-span'           => array(
            'name'          => 'Sm Width',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11',
                '12'        => '12'
            )
        ),
        'sm-left'           => array(
            'name'          => 'Sm Left',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '0'         => '0',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11'
            )
        ),
        'sm-right'          => array(
            'name'          => 'Sm Right',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '0'         => '0',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11'
            )
        ),
        'md-span'           => array(
            'name'          => 'Md Width',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11',
                '12'        => '12'
            )
        ),
        'md-left'           => array(
            'name'          => 'Md Left',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '0'         => '0',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11'
            )
        ),
        'md-right'          => array(
            'name'          => 'Md Right',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '0'         => '0',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11'
            )
        ),
        'lg-span'           => array(
            'name'          => 'Lg Width',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11',
                '12'        => '12'
            )
        ),
        'lg-left'           => array(
            'name'          => 'Lg Left',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '0'         => '0',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11'
            )
        ),
        'lg-right'          => array(
            'name'          => 'Lg Right',
            'width'         => 'xs-span12 sm-span4 md-span2',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                '0'         => '0',
                '1'         => '1',
                '2'         => '2',
                '3'         => '3',
                '4'         => '4',
                '5'         => '5',
                '6'         => '6',
                '7'         => '7',
                '8'         => '8',
                '9'         => '9',
                '10'        => '10',
                '11'        => '11'
            )
        ),
        'center'            => array(
            'name'          => 'Center Column',
            'input_type'    => 'checkbox'
        ),
        'content'           => array(
            'name'          => 'Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ))
    ->set_options(array(
        'posts_num'         => array(
            'name'          => 'Number of Posts to Display',
            'width'         => 'xs-span6 xs-right6',
            'input_type'    => 'select',
            'options'       => array(
                'All'       => 'all',
                '4'         => '4',
                '8'         => '8'
            ),
            'selected'      => '4'
        ),
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ));
?>