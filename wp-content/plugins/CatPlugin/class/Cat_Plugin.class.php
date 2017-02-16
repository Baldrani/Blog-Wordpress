<?php
class Cat_Plugin
{
    public function __construct()
    {
        include_once plugin_dir_path(__FILE__).'Jqvmap_France_Widget.class.php';
        new Jqvmap_France_Widget();
    }

}
