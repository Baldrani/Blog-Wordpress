<?php
/*
Plugin Name: Chat du jour
Plugin URI: http://zero-plugin.com
Description: Afficher le chat populaire du jour.
Version: 0.1
Author: Guillaume Pham ngoc
Author URI: http://guillaumepn.free.fr
License: GPL2
*/

class ChatDuJour_Plugin {

    public function __construct()
    {
        include_once plugin_dir_path(__FILE__)."/page_title.php";
        new ChatDuJour_Page_Title();

        include_once plugin_dir_path(__FILE__)."/newsletter.php";
        new Zero_Newsletter();

        register_activation_hook(__FILE__, array("Zero_Newsletter", "install"));
        register_uninstall_hook(__FILE__, array("Zero_Newsletter", "uninstall"));
    }

}
new ChatDuJour_Plugin();
