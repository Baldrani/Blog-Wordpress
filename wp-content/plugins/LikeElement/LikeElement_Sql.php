<?php
include_once plugin_dir_path( __FILE__ ).'/LikeElement_Widget.php';

class LikeElement_Sql
{
    public function __construct()
    {
        add_action('widgets_init', function(){register_widget('LikeElement_Widget');});
        //add_action('wp_loaded', array($this, "fetch_cat"));
    }

    public static function install()
    {
        global $wpdb;
        echo("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}like_element (id INT AUTO_INCREMENT PRIMARY KEY, id_post INT, vote_value INT;");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}like_element (id INT AUTO_INCREMENT PRIMARY KEY, id_post INT, vote_value INT);");
    }
}
