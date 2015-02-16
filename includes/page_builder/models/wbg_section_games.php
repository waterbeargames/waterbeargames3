<?php
$wbgGames = new wbgSection;
$wbgGames->set_group_name('Games')
    ->set_group_name_slug('games')
    ->set_single_name('Game')
    ->set_single_name_slug('game')
    ->set_multiple(false)
    ->set_admin_column_classes('xs-span12')
    ->add_options(array(
        'post_num'          => array(
            'name'          => 'Number of Posts to Display',
            'input_type'    => 'select',
            'options'       => array(
                'All'       => 'all',
                '3'         => '3',
                '4'         => '4',
                '8'         => '8'
            )
        ),
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ));
?>