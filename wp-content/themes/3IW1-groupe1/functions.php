<?php
    function theme_styles()
    {
        wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css');
        wp_enqueue_style('main_style', get_stylesheet_uri());

        wp_enqueue_style('font-awesome', get_template_directory_uri().'/fonts/font-awesome/css/font-awesome.min.css');
        wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array ('jquery'));

    }
    add_action('wp_enqueue_scripts', 'theme_styles');

    /* Menus */
    function my_menus()
    {
        register_nav_menu('main_menu', 'Menu principal');
        register_nav_menu('footer_menu', 'Menu du pied de page');
    }
    add_action('init', 'my_menus');

    /* Zone de widgets */
    function my_sidebars()
    {
        register_sidebar(array(
            'name'          => 'Barre latérale',
            'id'            => 'sidebar-1',
            'description'   => 'Cela apparait sur toutes les pages.'
        ));
    }
    add_action('widgets_init', 'my_sidebars');

    /* Jqvmap */
    function jqvmap()
    {
        register_sidebar(array(
            'name'        => 'Barre Jquery Vector Map',
            'id'          => 'jqvmap',
            'description' => 'Affiche la carte de france avec la disponaibilité des chats'
        ));
    }
    add_action('widgets_init', 'jqvmap');


    /* jqvmqp */
    // add_action('widgets_init', function(){register_widget('carte-france');});


    /*En-tete */
    add_theme_support('custom-header');

    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
    }
