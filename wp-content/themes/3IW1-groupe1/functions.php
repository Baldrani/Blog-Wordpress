<?php
function theme_styles(){
    wp_enqueue_style('main_style',get_stylesheet_uri());
    wp_enqueue_style('boostrap-css', get_template_directory_uri().'/css/boostrap.min.css');
    wp_enqueue_style('boostrap-js', get_template_directory_uri().'/js/boostrap.min.js');
}

add_action('wp_equeue_scripts','theme_styles');

/* Menus */

function my_menus(){
    register_nav_menu('main_menu', 'Menu Principal');
    register_nav_menu('footer_menu', 'Menu Principal');
}

add_action('init', 'my_menus');


/* Zones de widgets */
function my_sidebars(){
    register_sidebar(array(
        'name' => 'Barre latérale',
        'id'   => 'sidebar-1',
        'description' =>'Cela apparait sur toutes les pages, pour l\'instant...'
    ));
}

add_action('widgets_init','my_sidebars');
