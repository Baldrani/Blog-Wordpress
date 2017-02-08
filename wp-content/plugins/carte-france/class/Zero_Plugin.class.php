<?php
include_once plugin_dir_path(__FILE__).'Zero_Newsletter_Widget.class.php';

class Zero_Plugin
{
    public function __construct()
    {
        // include_once plugin_dir_path(__FILE__).'Zero_Page_Title.class.php';
        // new Zero_Page_title();
        add_action('widgets_init', function(){register_widget('Zero_Newsletter_Widget');});
    }
}
