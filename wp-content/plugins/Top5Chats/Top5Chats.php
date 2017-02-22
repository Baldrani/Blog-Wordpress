<?php
/*
Plugin Name: Top 5 Chats
Plugin URI: http://google.fr
Description: Les 5 chats les plus populaires
Version: 0.1
Author: Guillaume Pham ngoc
Author URI: http://guillaumepn.free.fr
License: GPL2
*/

class Top5Chats_Plugin {

    public function __construct()
    {
        include_once plugin_dir_path(__FILE__)."/page_title.php";
        new Top5Chats_Page_Title();

        include_once plugin_dir_path(__FILE__)."/Top5Chats_Sql.php";
        new Top5Chats_Sql();

        //register_activation_hook(__FILE__, array("Top5Chats_Sql", "install"));
    }

}
new Top5Chats_Plugin();
