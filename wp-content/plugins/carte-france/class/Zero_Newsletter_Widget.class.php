<?php
class Zero_Newsletter_Widget extends WP_Widget
{

    //function __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
    public function __construct(){
        parent::__construct('zero_newsletter', 'Newsletter', array('description' => 'Yolo'));
    }

    public function widget($args, $instance){
        echo 'widget newsletter';
    }
}
