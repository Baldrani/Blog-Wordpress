<?php

$str = file_get_contents('dist/maps/jquery.vmap.france.js');
$str = substr($str, 81, strlen($str));
$str = substr($str, 0, -4);
$json = json_decode($str,true);


// echo '<pre>' . print_r($json, true) . '</pre>';
foreach ($json as $key => $value) {
    $sth = $dbh->prepare('SELECT count(*) FROM `wp_postmeta` WHERE meta_key = `_departement` AND meta_value = \''.$key.'\');
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    $json[$key]['nb_cat'] = $result["count(*)"];
}

// echo '<pre>' . print_r($json, true) . '</pre>';

// echo json_encode($json);

$js_file = 'jQuery.fn.vectorMap(\'addMap\', \'france_fr\', {"width": 520, "height": 550, "paths":'.json_encode($json).'});';

echo $js_file;

file_put_contents('dist/maps/jquery.vmap.testfrance.js',$js_file);

$dbh = null;
