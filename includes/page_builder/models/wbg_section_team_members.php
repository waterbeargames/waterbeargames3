<?php
$wbgTeamMembers = new wbgSection;
$wbgTeamMembers->set_group_name('Team Members')
    ->set_group_name_slug('team-members')
    ->set_single_name('Team Member')
    ->set_single_name_slug('team_member')
    ->set_multiple(false)
    ->set_admin_column_classes('xs-span12')
    ->add_options(array(
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ));
?>