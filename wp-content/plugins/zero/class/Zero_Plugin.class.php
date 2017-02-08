<?php
class Zero_Plugin
{
    function __construct()
    {
        // include_once plugin_dir_path(__FILE__).'Zero_Page_Title.class.php';
        // new Zero_Page_Title;

        include_once plugin_dir_path(__FILE__).'Zero_Newsletter.class.php';
        // var_dump ( plugin_dir_path(__FILE__).'Zero_Newsletter.class.php');
        new Zero_Newsletter;
    }
}

new Zero_Plugin();
