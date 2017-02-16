<?php
class Jqvmap_France_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('jqvmap_france', 'Carte de France', array('description' => 'Dispose une carte de France avec les chats disponibles.'));
    }

    public function widget($args, $instance)
    {

        /* ~~~~ Change le fichier json en fonction des chats dispos ~~~~*/

        /* ~~~~ Display map ~~~ */
        //Js de base
        wp_register_script('jqvmap-js',plugins_url('jqvmap_france/jquery.vmap.js', __FILE__), array ('jquery'));
        wp_enqueue_script( 'jqvmap-js' );
        //Fichier json de la map
        wp_register_script('jqvmap-france',plugins_url('jqvmap_france/jquery.vmap.testfrance.js', __FILE__));
        wp_enqueue_script( 'jqvmap-france' );
        //Css de base
        wp_register_style('jqvmap-css',plugins_url('jqvmap_france/jqvmap.min.css', __FILE__));
        wp_enqueue_style( 'jqvmap-css' );

        echo '<div id=vmap style="height: 650px;"></div>';

        // $str = file_get_contents(plugin_dir_path(__DIR__).'dist/maps/jquery.vmap.france.js');
        // $str = substr($str, 81, strlen($str));
        // $str = substr($str, 0, -4);
        // $json = json_decode($str,true);
    }

    public function showMap(){

    }
}
