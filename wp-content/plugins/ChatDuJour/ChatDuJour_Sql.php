<?php
include_once plugin_dir_path( __FILE__ ).'/ChatDuJour_Widget.php';

class ChatDuJour_Sql
{
    public function __construct()
    {
        add_action('widgets_init', function(){register_widget('ChatDuJour_Widget');});
        add_action('wp_loaded', array($this, "fetch_cat"));
    }

    public function fetch_cat()
    {
        global $wpdb;
        
    }

}
