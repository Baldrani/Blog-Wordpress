<?php

class Top5Chats_Page_Title {

    public function __construct()
    {
        add_filter('wp_title', array($this, 'modify_page_title'), 20);
    }

    public function modify_page_title($title)
    {
        return $title . ' | Top 5 Chats' ;
    }

}
