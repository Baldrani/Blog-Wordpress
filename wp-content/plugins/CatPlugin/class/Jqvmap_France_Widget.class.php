<?php
class Jqvmap_France_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('zero_newsletter', 'Newsletter', array('description' => 'Un formulaire d\'inscription à la newsletter.'));
    }

    public function widget($args, $instance)
    {
        echo 'widget newsletter';
    }
}
