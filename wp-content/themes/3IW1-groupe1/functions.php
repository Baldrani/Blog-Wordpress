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
    function header_widget() {
        register_sidebar(array(
            'name'          => 'Widget Header',
            'id'            => 'header-widget',
            'description'   => 'Un widget dans le header'
        ));
    }
    add_action('widgets_init', 'header_widget');

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
        $departement = get_post_meta($post->ID,'_departement',true);
      echo '<label for="dispo_meta">Indiquez la région où se trouve le chat :</label>
            <select name="departement">
                <option ' . selected( 'fr-01', $departement, false ) . ' value="fr-01">(01) Ain </option>
                <option ' . selected( 'fr-02', $departement, false ) . ' value="fr-02">(02) Aisne </option>
                <option ' . selected( 'fr-03', $departement, false ) . ' value="fr-03">(03) Allier </option>
                <option ' . selected( 'fr-04', $departement, false ) . ' value="fr-04">(04) Alpes de Haute Provence </option>
                <option ' . selected( 'fr-05', $departement, false ) . ' value="fr-05">(05) Hautes Alpes </option>
                <option ' . selected( 'fr-06', $departement, false ) . ' value="fr-06">(06) Alpes Maritimes </option>
                <option ' . selected( 'fr-07', $departement, false ) . ' value="fr-07">(07) Ardèche </option>
                <option ' . selected( 'fr-08', $departement, false ) . ' value="fr-08">(08) Ardennes </option>
                <option ' . selected( 'fr-09', $departement, false ) . ' value="fr-09">(09) Ariège </option>
                <option ' . selected( 'fr-10', $departement, false ) . ' value="fr-10">(10) Aube </option>
                <option ' . selected( 'fr-11', $departement, false ) . ' value="fr-11">(11) Aude </option>
                <option ' . selected( 'fr-12', $departement, false ) . ' value="fr-12">(12) Aveyron </option>
                <option ' . selected( 'fr-13', $departement, false ) . ' value="fr-13">(13) Bouches du Rhône </option>
                <option ' . selected( 'fr-14', $departement, false ) . ' value="fr-14">(14) Calvados </option>
                <option ' . selected( 'fr-15', $departement, false ) . ' value="fr-15">(15) Cantal </option>
                <option ' . selected( 'fr-16', $departement, false ) . ' value="fr-16">(16) Charente </option>
                <option ' . selected( 'fr-17', $departement, false ) . ' value="fr-17">(17) Charente Maritime </option>
                <option ' . selected( 'fr-18', $departement, false ) . ' value="fr-18">(18) Cher </option>
                <option ' . selected( 'fr-19', $departement, false ) . ' value="fr-19">(19) Corrèze </option>
                <option ' . selected( 'fr-2A', $departement, false ) . ' value="fr-2A">(2A) Corse du Sud </option>
                <option ' . selected( 'fr-2B', $departement, false ) . ' value="fr-2B">(2B) Haute-Corse </option>
                <option ' . selected( 'fr-21', $departement, false ) . ' value="fr-21">(21) Côte d\'Or </option>
                <option ' . selected( 'fr-22', $departement, false ) . ' value="fr-22">(22) Côtes d\'Armor </option>
                <option ' . selected( 'fr-23', $departement, false ) . ' value="fr-23">(23) Creuse </option>
                <option ' . selected( 'fr-24', $departement, false ) . ' value="fr-24">(24) Dordogne </option>
                <option ' . selected( 'fr-25', $departement, false ) . ' value="fr-25">(25) Doubs </option>
                <option ' . selected( 'fr-26', $departement, false ) . ' value="fr-26">(26) Drôme </option>
                <option ' . selected( 'fr-27', $departement, false ) . ' value="fr-27">(27) Eure </option>
                <option ' . selected( 'fr-28', $departement, false ) . ' value="fr-28">(28) Eure et Loir </option>
                <option ' . selected( 'fr-29', $departement, false ) . ' value="fr-29">(29) Finistère </option>
                <option ' . selected( 'fr-30', $departement, false ) . ' value="fr-30">(30) Gard </option>
                <option ' . selected( 'fr-31', $departement, false ) . ' value="fr-31">(31) Haute Garonne </option>
                <option ' . selected( 'fr-32', $departement, false ) . ' value="fr-32">(32) Gers </option>
                <option ' . selected( 'fr-33', $departement, false ) . ' value="fr-33">(33) Gironde </option>
                <option ' . selected( 'fr-34', $departement, false ) . ' value="fr-34">(34) Hérault </option>
                <option ' . selected( 'fr-35', $departement, false ) . ' value="fr-35">(35) Ille et Vilaine </option>
                <option ' . selected( 'fr-36', $departement, false ) . ' value="fr-36">(36) Indre </option>
                <option ' . selected( 'fr-37', $departement, false ) . ' value="fr-37">(37) Indre et Loire </option>
                <option ' . selected( 'fr-38', $departement, false ) . ' value="fr-38">(38) Isère </option>
                <option ' . selected( 'fr-39', $departement, false ) . ' value="fr-39">(39) Jura </option>
                <option ' . selected( 'fr-40', $departement, false ) . ' value="fr-40">(40) Landes </option>
                <option ' . selected( 'fr-41', $departement, false ) . ' value="fr-41">(41) Loir et Cher </option>
                <option ' . selected( 'fr-42', $departement, false ) . ' value="fr-42">(42) Loire </option>
                <option ' . selected( 'fr-43', $departement, false ) . ' value="fr-43">(43) Haute Loire </option>
                <option ' . selected( 'fr-44', $departement, false ) . ' value="fr-44">(44) Loire Atlantique </option>
                <option ' . selected( 'fr-45', $departement, false ) . ' value="fr-45">(45) Loiret </option>
                <option ' . selected( 'fr-46', $departement, false ) . ' value="fr-46">(46) Lot </option>
                <option ' . selected( 'fr-47', $departement, false ) . ' value="fr-47">(47) Lot et Garonne </option>
                <option ' . selected( 'fr-48', $departement, false ) . ' value="fr-48">(48) Lozère </option>
                <option ' . selected( 'fr-49', $departement, false ) . ' value="fr-49">(49) Maine et Loire </option>
                <option ' . selected( 'fr-50', $departement, false ) . ' value="fr-50">(50) Manche </option>
                <option ' . selected( 'fr-51', $departement, false ) . ' value="fr-51">(51) Marne </option>
                <option ' . selected( 'fr-52', $departement, false ) . ' value="fr-52">(52) Haute Marne </option>
                <option ' . selected( 'fr-53', $departement, false ) . ' value="fr-53">(53) Mayenne </option>
                <option ' . selected( 'fr-54', $departement, false ) . ' value="fr-54">(54) Meurthe et Moselle </option>
                <option ' . selected( 'fr-55', $departement, false ) . ' value="fr-55">(55) Meuse </option>
                <option ' . selected( 'fr-56', $departement, false ) . ' value="fr-56">(56) Morbihan </option>
                <option ' . selected( 'fr-57', $departement, false ) . ' value="fr-57">(57) Moselle </option>
                <option ' . selected( 'fr-58', $departement, false ) . ' value="fr-58">(58) Nièvre </option>
                <option ' . selected( 'fr-59', $departement, false ) . ' value="fr-59">(59) Nord </option>
                <option ' . selected( 'fr-60', $departement, false ) . ' value="fr-60">(60) Oise </option>
                <option ' . selected( 'fr-61', $departement, false ) . ' value="fr-61">(61) Orne </option>
                <option ' . selected( 'fr-62', $departement, false ) . ' value="fr-62">(62) Pas de Calais </option>
                <option ' . selected( 'fr-63', $departement, false ) . ' value="fr-63">(63) Puy de Dôme </option>
                <option ' . selected( 'fr-64', $departement, false ) . ' value="fr-64">(64) Pyrénées Atlantiques </option>
                <option ' . selected( 'fr-65', $departement, false ) . ' value="fr-65">(65) Hautes Pyrénées </option>
                <option ' . selected( 'fr-66', $departement, false ) . ' value="fr-66">(66) Pyrénées Orientales </option>
                <option ' . selected( 'fr-67', $departement, false ) . ' value="fr-67">(67) Bas Rhin </option>
                <option ' . selected( 'fr-68', $departement, false ) . ' value="fr-68">(68) Haut Rhin </option>
                <option ' . selected( 'fr-69', $departement, false ) . ' value="fr-69">(69) Rhône </option>
                <option ' . selected( 'fr-70', $departement, false ) . ' value="fr-70">(70) Haute Saône </option>
                <option ' . selected( 'fr-71', $departement, false ) . ' value="fr-71">(71) Saône et Loire </option>
                <option ' . selected( 'fr-72', $departement, false ) . ' value="fr-72">(72) Sarthe </option>
                <option ' . selected( 'fr-73', $departement, false ) . ' value="fr-73">(73) Savoie </option>
                <option ' . selected( 'fr-74', $departement, false ) . ' value="fr-74">(74) Haute Savoie </option>
                <option ' . selected( 'fr-75', $departement, false ) . ' value="fr-75">(75) Paris </option>
                <option ' . selected( 'fr-76', $departement, false ) . ' value="fr-76">(76) Seine Maritime </option>
                <option ' . selected( 'fr-77', $departement, false ) . ' value="fr-77">(77) Seine et Marne </option>
                <option ' . selected( 'fr-78', $departement, false ) . ' value="fr-78">(78) Yvelines </option>
                <option ' . selected( 'fr-79', $departement, false ) . ' value="fr-79">(79) Deux Sèvres </option>
                <option ' . selected( 'fr-80', $departement, false ) . ' value="fr-80">(80) Somme </option>
                <option ' . selected( 'fr-81', $departement, false ) . ' value="fr-81">(81) Tarn </option>
                <option ' . selected( 'fr-82', $departement, false ) . ' value="fr-82">(82) Tarn et Garonne </option>
                <option ' . selected( 'fr-83', $departement, false ) . ' value="fr-83">(83) Var </option>
                <option ' . selected( 'fr-84', $departement, false ) . ' value="fr-84">(84) Vaucluse </option>
                <option ' . selected( 'fr-85', $departement, false ) . ' value="fr-85">(85) Vendée </option>
                <option ' . selected( 'fr-86', $departement, false ) . ' value="fr-86">(86) Vienne </option>
                <option ' . selected( 'fr-87', $departement, false ) . ' value="fr-87">(87) Haute Vienne </option>
                <option ' . selected( 'fr-88', $departement, false ) . ' value="fr-88">(88) Vosges </option>
                <option ' . selected( 'fr-89', $departement, false ) . ' value="fr-89">(89) Yonne </option>
                <option ' . selected( 'fr-90', $departement, false ) . ' value="fr-90">(90) Territoire de Belfort </option>
                <option ' . selected( 'fr-91', $departement, false ) . ' value="fr-91">(91) Essonne </option>
                <option ' . selected( 'fr-92', $departement, false ) . ' value="fr-92">(92) Hauts de Seine </option>
                <option ' . selected( 'fr-93', $departement, false ) . ' value="fr-93">(93) Seine Saint Denis </option>
                <option ' . selected( 'fr-94', $departement, false ) . ' value="fr-94">(94) Val de Marne </option>
                <option ' . selected( 'fr-95', $departement, false ) . ' value="fr-95">(95) Val d\'Oise </option>
            </select>';
    }

    add_action('save_post','save_metaboxes');
    function save_metaboxes($post_ID){
        if(isset($_POST['departement'])){
            if(!empty(get_post_meta($post_ID,'_departement',true))){
                update_post_meta($post_ID, "_departement",  $_POST['departement']);
            } else {
                add_post_meta($post_ID, "_departement",  $_POST['departement'], true);
            }
        }
    }

    // J'utilise les hooks
    add_action( 'wp_ajax_my_action', 'my_action' );

    function my_action() {
    	global $wpdb;
        $vote = $_POST['vote'];
        if($_POST['upordown'] == 'up'){
            $vote = $vote + 1;
        }
        if($_POST['upordown'] == 'down'){
            $vote = $vote - 1;
        }
        $wpdb->update("{$wpdb->prefix}like_element",array("vote_value" => $vote),array("id_post" => $_POST['id']));
        echo $vote;
    	wp_die();
    }


    /*En-tete */
    add_theme_support('custom-header');

    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
    }
