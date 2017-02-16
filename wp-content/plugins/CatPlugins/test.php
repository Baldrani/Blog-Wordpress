<?php
// Good to use !!
$user = "root";
$pass = "root";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    // $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$str = file_get_contents('dist/maps/jquery.vmap.france.js');
$str = substr($str, 81, strlen($str));
$str = substr($str, 0, -4);
$json = json_decode($str,true);


// echo '<pre>' . print_r($json, true) . '</pre>';
foreach ($json as $key => $value) {
    $sth = $dbh->prepare('SELECT count(*) from cat where location = \''.$key.'\'');
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    $json[$key]['nb_cat'] = $result["count(*)"];
    // echo($key . ' => ' . $value[nb_cat]);
    // echo('<br />');
}

echo '<pre>' . print_r($json, true) . '</pre>';

// echo json_encode($json);

$js_file = 'jQuery.fn.vectorMap(\'addMap\', \'france_fr\', {"width": 520, "height": 550, "paths":'.json_encode($json).'});';

echo $js_file;

file_put_contents('dist/maps/jquery.vmap.testfrance.js',$js_file);

$dbh = null;
