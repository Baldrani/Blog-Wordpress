<?php
/*
Plugin Name: Zero plugin
Plugin URI: http://zero-plugin.com
Description: Un plugin d'introduction pour le développement sous WordPress
Version: 0.1
Author: Guillaume
Author URI: http://votre-site.com
License: GPL2
*/

class Zero_Plugin {

    public function __construct()
    {
        include_once plugin_dir_path(__FILE__)."/page_title.php";
        new Zero_Page_Title();

        include_once plugin_dir_path(__FILE__)."/newsletter.php";
        new Zero_Newsletter();

        register_activation_hook(__FILE__, array("Zero_Newsletter", "install"));
        register_uninstall_hook(__FILE__, array("Zero_Newsletter", "uninstall"));
    }

}
new Zero_Plugin();
