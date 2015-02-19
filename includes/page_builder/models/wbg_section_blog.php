<?php
$wbgBlog = new wbgSection;
$wbgBlog->set_group_name('Blog Posts')
    ->set_group_name_slug('blog-posts')
    ->set_single_name('Blog Post')
    ->set_single_name_slug('blog_post')
    ->set_multiple(false)
    ->set_admin_column_classes('xs-span12')
    ->add_options(array(
        'posts_num'         => array(
            'name'          => 'Number of Posts to Display',
            'width'         => 'xs-span6 xs-right6',
            'input_type'    => 'select',
            'options'       => array(
                'All'       => '-1',
                '4'         => '4',
                '8'         => '8'
            ),
            'selected'      => '8'
        ),
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ));
?>