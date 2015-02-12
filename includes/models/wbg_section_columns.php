<?php
$wbgColumns = new wbgSection;
$wbgColumns->set_group_name('Columns')
    ->set_group_name_slug('columns')
    ->set_single_name('Column')
    ->set_single_name_slug('column')
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
        'background_color'  => array(
            'name'          => 'Background Color',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Transparent'   => 'transparent',
                'White'         => 'white',
                'Gray'          => 'gray',
                'Light Blue'    => 'light-blue',
                'Blue'          => 'blue',
                'Black'         => 'black'
            )
        ),
        'text_color'        => array(
            'name'          => 'Override section text color',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                ''          => '',
                'Light'     => 'light',
                'Dark'      => 'dark'
            )
        ),
        'content'           => array(
            'name'          => 'Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ));
?>