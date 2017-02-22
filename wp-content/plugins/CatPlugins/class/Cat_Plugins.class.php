<?php
include_once plugin_dir_path(__DIR__).'widgets/Jqvmap_France_Widget.class.php';
include_once plugin_dir_path( __DIR__ ).'widgets/Top5Chats_Widget.php';
include_once plugin_dir_path( __DIR__ ).'widgets/ChatDuJour_Widget.php';


class Cat_Plugins
{
    public function __construct()
    {
        add_action('widgets_init', function(){register_widget('Jqvmap_France_Widget');});
        add_action('widgets_init', function(){register_widget('Top5Chats_Widget');});
        add_action('widgets_init', function(){register_widget('ChatDuJour_Widget');});
    }

}
