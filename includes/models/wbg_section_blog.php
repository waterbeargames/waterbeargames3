<?php
$wbgBlog = new wbgSection;
$wbgBlog->set_group_name('Blog Posts')
    ->set_group_name_slug('blog-posts')
    ->set_single_name('Blog Post')
    ->set_single_name_slug('blog_post')
    ->set_multiple(false)
    ->set_admin_column_classes('xs-span12')
    ->set_markup_attr(array())
    ->set_options(array(
        'title'             => array(
            'name'          => 'Title',
            'input_type'    => 'text'
        ),
        'posts_num'         => array(
            'name'          => 'Number of Posts to Display',
            'width'         => 'xs-span6 xs-right6',
            'input_type'    => 'select',
            'options'       => array(
                'All'       => 'all',
                '4'         => '4',
                '8'         => '8'
            ),
            'selected'      => '8'
        ),
        'background_image'  => array(
            'name'          => 'Background Image',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'image'
        ),
        'background_color'  => array(
            'name'          => 'Background Color',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'White'         => 'white',
                'Gray'          => 'gray',
                'Light Blue'    => 'light-blue',
                'Blue'          => 'blue'
            )
        ),
        'text_color'        => array(
            'name'          => 'Text Color Scheme',
            'width'         => 'xs-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Light'     => 'light',
                'Dark'      => 'dark'
            )
        ),
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea'
        )
    ));
?>