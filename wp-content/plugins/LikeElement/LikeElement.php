<?php
/*
Plugin Name: Like Element
Plugin URI: http://zero-plugin.com
Description: Permet de liker ou disliker un element.
Version: 0.1
Author: Sylvain Cabiati
Author URI: http://sylvain-cabiati.fr
License: GPL2
*/

class LikeElement_Plugin {

    public function __construct()
    {
        include_once plugin_dir_path(__FILE__)."/page_title.php";
        new LikeElement_Page_Title();

        include_once plugin_dir_path(__FILE__)."/LikeElement_Sql.php";
        new LikeElement_Sql();

        register_activation_hook(__FILE__, array("LikeElement_Sql", "install"));
    }

}
new LikeElement_Plugin();
