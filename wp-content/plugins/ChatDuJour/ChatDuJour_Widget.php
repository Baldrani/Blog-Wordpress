<?php
class ChatDuJour_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('chatdujour_sql', 'Chat du jour', array('description' => 'Afficher un chat aléatoire'));
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"     value="<?php echo  $title; ?>" />
        </p>
        <?php
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo $args['before_title'];
        echo apply_filters('widget_title', $instance['title']);
        echo $args['after_title'];
        $post = get_post(1);
        $url = get_permalink($post);
        echo "<p><a href=\"".$url."\">".$post->post_title."</a></p>";
        echo $args['after_widget'];
    }
}
