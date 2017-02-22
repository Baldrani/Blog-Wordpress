<?php
include_once plugin_dir_path( __FILE__ ).'/Top5Chats_Widget.php';

class Top5Chats_Sql
{
    public function __construct()
    {
        add_action('widgets_init', function(){register_widget('Top5Chats_Widget');});
        //add_action('wp_loaded', array($this, "fetch_cat"));
    }

}
