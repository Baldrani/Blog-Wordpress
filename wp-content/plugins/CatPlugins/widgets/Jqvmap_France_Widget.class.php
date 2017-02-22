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
        $str = file_get_contents(plugin_dir_path(__FILE__).'jqvmap_france/jquery.vmap.france.js');
        $str = substr($str, 81, strlen($str));
        $str = substr($str, 0, -4);
        $json = json_decode($str,true);

        global $wpdb;
        foreach ($json as $key => $value) {
            $result = $wpdb->get_var('SELECT count(*) FROM `wp_postmeta` WHERE meta_key = \'_departement\' AND meta_value = \''.$key.'\'');
            $json[$key]['nb_cat'] = $result;
        }
        $js_file = 'jQuery.fn.vectorMap(\'addMap\', \'france_fr\', {"width": 520, "height": 550, "paths":'.json_encode($json).'});';
        file_put_contents(plugin_dir_path(__FILE__).'jqvmap_france/jquery.vmap.testfrance.js',$js_file);

        /* ~~~~ Display map ~~~ */
        //Js de base
        wp_register_script('jqvmap-js',plugins_url('jqvmap_france/jquery.vmap.js', __FILE__));
        wp_enqueue_script( 'jqvmap-js' );
        //Fichier json de la map
        wp_register_script('jqvmap-france',plugins_url('jqvmap_france/jquery.vmap.testfrance.js', __FILE__));
        wp_enqueue_script( 'jqvmap-france' );
        //Css de base
        wp_register_style('jqvmap-css',plugins_url('jqvmap_france/jqvmap.min.css', __FILE__));
        wp_enqueue_style( 'jqvmap-css' );

        echo '<div id="vmap" style="height: 650px;"></div>';
    }

    public function showMap(){

    }
}
