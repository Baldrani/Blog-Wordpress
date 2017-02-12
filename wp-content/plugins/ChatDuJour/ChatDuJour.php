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

        include_once plugin_dir_path(__FILE__)."/ChatDuJour_Sql.php";
        new ChatDuJour_Sql();

        register_activation_hook(__FILE__, array("ChatDuJour_Sql", "install"));
    }

}
new ChatDuJour_Plugin();
