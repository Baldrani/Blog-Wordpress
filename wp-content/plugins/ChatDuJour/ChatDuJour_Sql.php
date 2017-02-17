<?php
include_once plugin_dir_path( __FILE__ ).'/ChatDuJour_Widget.php';

class ChatDuJour_Sql
{
    public function __construct()
    {
        add_action('widgets_init', function(){register_widget('ChatDuJour_Widget');});
        //add_action('wp_loaded', array($this, "fetch_cat"));
    }

    public static function install()
    {
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}chat_du_jour (id INT AUTO_INCREMENT PRIMARY KEY, id_post INT, date_jour DATE NOT NULL DEFAULT CURDATE());");
    }

    // public function fetch_cat()
    // {
    //     global $wpdb;
    //
    // }

}
