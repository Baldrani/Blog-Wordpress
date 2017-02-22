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

    add_action('add_meta_boxes','initialisation_metaboxes');
    function initialisation_metaboxes(){
        add_meta_box('id_ma_meta', 'Région du chat', 'departement_meta', 'post', 'side', 'high');
    }
    function departement_meta($post){
      // on récupère la valeur actuelle pour la mettre dans le champ
      echo '<label for="dispo_meta">Indiquez la région où se trouve le chat :</label>
            <select name="departement">
                <option value="fr-01">(01) Ain </option>
                <option value="fr-02">(02) Aisne </option>
                <option value="fr-03">(03) Allier </option>
                <option value="fr-04">(04) Alpes de Haute Provence </option>
                <option value="fr-05">(05) Hautes Alpes </option>
                <option value="fr-06">(06) Alpes Maritimes </option>
                <option value="fr-07">(07) Ardèche </option>
                <option value="fr-08">(08) Ardennes </option>
                <option value="fr-09">(09) Ariège </option>
                <option value="fr-10">(10) Aube </option>
                <option value="fr-11">(11) Aude </option>
                <option value="fr-12">(12) Aveyron </option>
                <option value="fr-13">(13) Bouches du Rhône </option>
                <option value="fr-14">(14) Calvados </option>
                <option value="fr-15">(15) Cantal </option>
                <option value="fr-16">(16) Charente </option>
                <option value="fr-17">(17) Charente Maritime </option>
                <option value="fr-18">(18) Cher </option>
                <option value="fr-19">(19) Corrèze </option>
                <option value="fr-2A">(2A) Corse du Sud </option>
                <option value="fr-2B">(2B) Haute-Corse </option>
                <option value="fr-21">(21) Côte d\'Or </option>
                <option value="fr-22">(22) Côtes d\'Armor </option>
                <option value="fr-23">(23) Creuse </option>
                <option value="fr-24">(24) Dordogne </option>
                <option value="fr-25">(25) Doubs </option>
                <option value="fr-26">(26) Drôme </option>
                <option value="fr-27">(27) Eure </option>
                <option value="fr-28">(28) Eure et Loir </option>
                <option value="fr-29">(29) Finistère </option>
                <option value="fr-30">(30) Gard </option>
                <option value="fr-31">(31) Haute Garonne </option>
                <option value="fr-32">(32) Gers </option>
                <option value="fr-33">(33) Gironde </option>
                <option value="fr-34">(34) Hérault </option>
                <option value="fr-35">(35) Ille et Vilaine </option>
                <option value="fr-36">(36) Indre </option>
                <option value="fr-37">(37) Indre et Loire </option>
                <option value="fr-38">(38) Isère </option>
                <option value="fr-39">(39) Jura </option>
                <option value="fr-40">(40) Landes </option>
                <option value="fr-41">(41) Loir et Cher </option>
                <option value="fr-42">(42) Loire </option>
                <option value="fr-43">(43) Haute Loire </option>
                <option value="fr-44">(44) Loire Atlantique </option>
                <option value="fr-45">(45) Loiret </option>
                <option value="fr-46">(46) Lot </option>
                <option value="fr-47">(47) Lot et Garonne </option>
                <option value="fr-48">(48) Lozère </option>
                <option value="fr-49">(49) Maine et Loire </option>
                <option value="fr-50">(50) Manche </option>
                <option value="fr-51">(51) Marne </option>
                <option value="fr-52">(52) Haute Marne </option>
                <option value="fr-53">(53) Mayenne </option>
                <option value="fr-54">(54) Meurthe et Moselle </option>
                <option value="fr-55">(55) Meuse </option>
                <option value="fr-56">(56) Morbihan </option>
                <option value="fr-57">(57) Moselle </option>
                <option value="fr-58">(58) Nièvre </option>
                <option value="fr-59">(59) Nord </option>
                <option value="fr-60">(60) Oise </option>
                <option value="fr-61">(61) Orne </option>
                <option value="fr-62">(62) Pas de Calais </option>
                <option value="fr-63">(63) Puy de Dôme </option>
                <option value="fr-64">(64) Pyrénées Atlantiques </option>
                <option value="fr-65">(65) Hautes Pyrénées </option>
                <option value="fr-66">(66) Pyrénées Orientales </option>
                <option value="fr-67">(67) Bas Rhin </option>
                <option value="fr-68">(68) Haut Rhin </option>
                <option value="fr-69">(69) Rhône </option>
                <option value="fr-70">(70) Haute Saône </option>
                <option value="fr-71">(71) Saône et Loire </option>
                <option value="fr-72">(72) Sarthe </option>
                <option value="fr-73">(73) Savoie </option>
                <option value="fr-74">(74) Haute Savoie </option>
                <option value="fr-75">(75) Paris </option>
                <option value="fr-76">(76) Seine Maritime </option>
                <option value="fr-77">(77) Seine et Marne </option>
                <option value="fr-78">(78) Yvelines </option>
                <option value="fr-79">(79) Deux Sèvres </option>
                <option value="fr-80">(80) Somme </option>
                <option value="fr-81">(81) Tarn </option>
                <option value="fr-82">(82) Tarn et Garonne </option>
                <option value="fr-83">(83) Var </option>
                <option value="fr-84">(84) Vaucluse </option>
                <option value="fr-85">(85) Vendée </option>
                <option value="fr-86">(86) Vienne </option>
                <option value="fr-87">(87) Haute Vienne </option>
                <option value="fr-88">(88) Vosges </option>
                <option value="fr-89">(89) Yonne </option>
                <option value="fr-90">(90) Territoire de Belfort </option>
                <option value="fr-91">(91) Essonne </option>
                <option value="fr-92">(92) Hauts de Seine </option>
                <option value="fr-93">(93) Seine Saint Denis </option>
                <option value="fr-94">(94) Val de Marne </option>
                <option value="fr-95">(95) Val d\'Oise </option>
            </select>';
    }

    add_action('save_post','save_metaboxes');
    function save_metaboxes($post_ID){
        // var_dump($_POST['departement']);
        add_post_meta($post_ID, "_departement", "fr-01", true);
    }


    /*En-tete */
    add_theme_support('custom-header');

    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
    }
