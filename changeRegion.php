<?php
/*
recoit les donnees de maint.php pour faire les remplacements.
recoit $_GET['regionToChange'] pour identifier la region
recoit $_GET['newRegionName'] pour changer le nom de la region


*/
require_once('./php/basic_functions.php');
require_once('./php/test_connect.php');

try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
    
}(Exception $e){
    header("Location: ./maint.php?".http_build_query($_GET).'&changeRegionErreur='.urlencode('$e->getMessage()'));
    exit();
}