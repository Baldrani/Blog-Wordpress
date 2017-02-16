<?php
class Jqvmap_France_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('jqvmap_france', 'Carte de France', array('description' => 'Dispose une carte de France avec les chats disponibles.'));
    }

    public function widget($args, $instance)
    {
        echo 'widget newsletter';
    }
}
