<?php
include_once plugin_dir_path(__DIR__).'widgets/Jqvmap_France_Widget.class.php';

class Cat_Plugins
{
    public function __construct()
    {
        add_action('widgets_init', function(){register_widget('Jqvmap_France_Widget');});
    }

}
