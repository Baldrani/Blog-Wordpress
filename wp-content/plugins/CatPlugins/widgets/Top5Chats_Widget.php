<?php
class Top5Chats_Widget extends WP_Widget
{
    public function __construct()
    {
        register_activation_hook(__FILE__, array("ChatDuJour_Sql", "install"));
        parent::__construct('top5chats_sql', 'Top 5 Chats', array('description' => 'Les 5 chats les plus populaires'));
    }

    public static function install()
    {
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}chat_du_jour (id INT AUTO_INCREMENT PRIMARY KEY, id_post INT, date_jour DATE NOT NULL DEFAULT CURDATE());");
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

        global $wpdb;

        $top5Chats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}post_views WHERE type = 4 ORDER BY count DESC LIMIT 5");
        //var_dump($top5Chats);
        foreach ($top5Chats as $chat) {
            //$chatInfo = $wpdb->get_results("select * from {$wpdb->prefix}posts where id = ".$chat->id);
            $chatInfo = get_post($chat->id);
            $chatUrl = get_permalink($chatInfo);
            echo "<p><a href=\"".$chatUrl."\">".$chatInfo->post_title."</a></p>";
        }

        echo $args['after_widget'];
    }
}
