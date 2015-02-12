<?php

/*
 * Section Class
 */

class wbgSection {
    // String: the user-friendly name of the section
    // e.g. 'Team Members'
    private $group_name;
    function set_group_name($new_group_name) {
        $this->group_name = $new_group_name;
        return $this;
    }
    function get_group_name() {
        return $this->group_name;
    }
    
    // String: the slug of the section name
    // Only needs to be CSS friendly, so it can have dashes, letters, numbers, and underscores.
    // e.g. 'team-members'
    private $group_name_slug;
    function set_group_name_slug($new_group_name_slug) {
        $this->group_name_slug = $new_group_name_slug;
        return $this;
    }
    function get_group_name_slug() {
        return $this->group_name_slug;
    }
    
    // String: the user-friendly name of a single column in the section
    // e.g. 'Team Member'
    private $single_name;
    function set_single_name($new_single_name) {
        $this->single_name = $new_single_name;
        return $this;
    }
    function get_single_name() {
        return $this->single_name;
    }
    
    // String: the slug of a single column in the section
    // This MUST be php safe, so only letters, numbers, and underscores.
    // e.g. 'team_member'
    private $single_name_slug;
    function set_single_name_slug($new_single_name_slug) {
        $this->single_name_slug = $new_single_name_slug;
        return $this;
    }
    function get_single_name_slug() {
        return $this->single_name_slug;
    }
    
    // Boolean: whether or not the section has multiple sub-sections
    private $multiple;
    function set_multiple($new_multiple) {
        $this->multiple = $new_multiple;
        return $this;
    }
    function has_multiple() {
        return $this->multiple;
    }
    
    // String: the width of the columns in the admin view
    private $admin_column_classes;
    function set_admin_column_classes($new_admin_column_classes) {
        $this->admin_column_classes = $new_admin_column_classes;
        return $this;
    }
    function get_admin_column_classes() {
        return $this->admin_column_classes;
    }
    
    // Array: multidimensional array of the unique attributes of the section,
    //        needed for admin fields and front-end markup
    //
    // Available input types: text, textarea, checkbox, select, icon, image, and hidden.
    private $markup_attr;
    function set_markup_attr($new_markup_attr) {
        $this->markup_attr = $new_markup_attr;
        return $this;
    }
    function get_markup_attr() {
        return $this->markup_attr;
    }
    
    // Array: multidimensional array of the section options
    // Setting this variable is optional. Use if a section needs more options.
    //
    // Available input types: text, textarea, checkbox, select, icon, image, and hidden.
    private $options;
    function set_options($new_options) {
        $this->options = $new_options;
        return $this;
    }
    function get_options() {
        return $this->options;
    }
    
    // Function: returns the markup for fields
    //
    // $array - the array that the field is being saved to
    // $attrs - the fields to loop through
    // $input_name_prefix - the prefix for the name attribute in the input field
    private function fields_markup($array, $attrs, $input_name_prefix) {
        $output = '';
            
        foreach($attrs as $key => $attr) {
            $input_name = $input_name_prefix . '[' . $key . ']';
            $input_width = (isset($attr['width']) ? $attr['width'] : 'xs-span12');
            
            $output .= '<div class="column ' . $input_width . ($attr['input_type'] == 'icon' ? ' wbg-icon-preview' : '') . '">';
            
            if (!isset($array[$key])) {
                $array[$key] = '';
            }
        
            if ($attr['input_type'] == 'textarea') {
                $output .= $attr['name'] . '<br />';
                $output .= '<textarea name="' . $input_name . '" rows="' . $attr['rows'] . '">' . $array[$key] . '</textarea><br />';
                $output .= '<a class="button open-editor-button" href="#">Open Editor</a>';
            } elseif ($attr['input_type'] == 'checkbox') {
                $output .= '<input type="checkbox" name="' . $input_name . '"' . ($array[$key] == 'on' ? ' checked' : '') . '> ' . $attr['name'];
            } elseif ($attr['input_type'] == 'select') {
                $output .= $attr['name'] . '<br />';
                $output .= '<select name="' . $input_name . '">';
                foreach ($attr['options'] as $option_key => $option) {
                    $output .= '<option value="' . $option . '"' . ($array[$key] == $option || ($array[$key] == '' && isset($attr['selected']) && $attr['selected'] == $option) ? ' selected' : '') . '>' . $option_key . '</option>';
                }
                $output .= '</select>';
            } elseif ($attr['input_type'] == 'icon') {
                $icon_value = ($array[$key] != '' ? $array[$key] : 'fa fa-star');
            
                $output .= $attr['name'] . '<br />';
                $output .= '<i class="' . $icon_value . '"></i><br />';
                $output .= '<input name="' . $input_name . '" type="hidden" value="' . $icon_value . '" readonly />';
                $output .= '<a class="button wbg-add-fa-icon" href="#">Choose Icon</a>';
            } elseif ($attr['input_type'] == 'image') {
                $image = $array[$key];
            
                if ($array[$key] == '') {
                    $image = get_template_directory_uri() . '/images/clear-pixel.gif';
                }

                $output .= $attr['name'] . '<br />';
                $output .= '<img src="' . $image . '" /><br />';
                $output .= '<input name="' . $input_name . '" type="hidden" value="' . $image . '" readonly />';
                $output .= '<a href="#" class="wbg_add_image_button button" data-editor="content" title="Add Image">Add Image</a>';
                $output .= '<a href="#" class="wbg_remove_image_button button">Remove Image</a>';
            } else {
                $output .= $attr['name'] . '<br />';
                $output .= '<input name="' . $input_name . '" value="' . $array[$key] . '" type="' . $attr['input_type'] . '"' . (isset($attr['placeholder']) ? ' placeholder="' . $attr['placeholder'] . '"' : '') . ' />';
            }
            
            $output .= '</div>';
        }
        
        return $output;
    }
    
    // Function: returns the admin markup for a section's column
    //
    // $c - the counter keeping track of what column the columns loop is in
    // $wbg_column - the array containing the column's data
    function admin_column_markup($c, $wbg_column = array('show' => 'show')) {
        $output = '<div class="column ' . $this->get_admin_column_classes() . '">';

        if ($this->has_multiple()) {
            $output .= '<h3 class="wbg-column-menu"><i class="fa fa-chevron-' . ($wbg_column['show'] != 'hide' ? 'down' : 'up') . ' wbg-column-collapse"></i><i class="fa fa-close wbg-remove-section"></i><input name="wbg_columns[' . $c . '][show]" type="hidden" value="' . ($wbg_column['show'] != 'hide' ? 'show' : 'hide') . '"></input></h3>';
        }
    
        $output .= '<h4>' . $this->get_single_name() . '</h4>';
    
        if ($this->has_multiple()) {
            $output .= '<div class="wbg-column-content' . ($wbg_column['show'] == 'show' ? ' show' : '') . '">';
        }
        
        $output .= $this->fields_markup($wbg_column, $this->get_markup_attr(), 'wbg_columns[' . $c . ']');
    
        if ($this->has_multiple()) {
            $output .= '</div>';
        }
    
        $output .= '</div>';
    
        return $output;
    }
    
    // Function: returns the admin markup for a section's options
    //
    // $wbg_options - the array containing the secttion's options data
    function options_markup($wbg_options = array()) {
        $output = $this->fields_markup($wbg_options, $this->get_options(), 'wbg_options');
        return $output;
    }
}

?>