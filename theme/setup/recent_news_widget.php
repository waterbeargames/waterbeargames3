<?php

/*
 * Water Bear Games
 * Recent News Widget
 */

class WBG_Widget_Recent_News extends WP_Widget {
    public function __construct() {
        $widget_ops = array('classname' => 'widget_recent_news', 'description' => __("Your site&#8217;s most recent news stories.", 'water-bear-games'));
        parent::__construct('recent-news', __('Recent News Stories', 'water-bear-games'), $widget_ops);
        $this->alt_option_name = 'widget_recent_news';
    }

    /*
     * Outputs the content for the current Recent News widget instance.
     */
    public function widget($args, $instance) {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = (!empty($instance['title'])) ? $instance['title'] : __('Recent News', 'water-bear-games');
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $number = (!empty($instance['number'])) ? absint($instance['number']) : 5;
        if (!$number) $number = 5;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

        /*
         * Filter the arguments for the Recent News widget.
         */
        $r = new WP_Query(apply_filters('widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_type'           => 'news',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        )));

        if ($r->have_posts()) :
            echo $args['before_widget'];
            
            if ($title) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
            ?>
            <ul>
                <?php while ($r->have_posts()) : $r->the_post(); ?>
                <?php
                $news_meta = get_post_meta(get_the_ID(), 'wbg_news', true);
            
                $news_link = get_permalink(get_the_ID());
                $target = '';
                if (!empty($news_meta['link']) && empty($news_meta['local'])) {
                    $news_link = $news_meta['link'];
                    $target = ' target="_blank"';
                }
                ?>
                <li>
                    <a href="<?php echo $news_link; ?>"<?php echo $target; ?>><?php get_the_title() ? the_title() : the_ID(); ?></a>
                    <?php if ($show_date) : ?>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php echo $args['after_widget']; ?>
            <?php
            wp_reset_postdata();
        endif;
    }

    /*
     * Handles updating the settings for the current Recent News widget instance.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }

    /*
     * Outputs the settings form for the Recent News widget.
     */
    public function form($instance) {
        $title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number    = isset($instance['number']) ? absint($instance['number']) : 5;
        $show_date = isset($instance['show_date']) ? (bool) $instance['show_date'] : false;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'water-bear-games'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'water-bear-games'); ?></label>
        <input class="tiny-text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox"<?php checked($show_date); ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" />
        <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display post date?', 'water-bear-games'); ?></label></p>
        <?php
    }
}

// Register the Recent News widget
function register_recent_news_widget() {
    register_widget('WBG_Widget_Recent_News');
}
add_action('widgets_init', 'register_recent_news_widget');
