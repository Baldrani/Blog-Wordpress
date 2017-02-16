<?php
class Jqvmap_France_Widget extends WP_Widget {
    public function __construct()
    {
        parent::__construct('Jqvmap_France', 'Jqvmap France', array('description' => 'Affiche une carte de la france avec les chats disponibles'));
    }

    public function widget($args, $instance)
    {
        echo 'widget newsletter';
    }

}
