<?php
/*
recoit les donnees de maint.php pour faire les remplacements.
recoit $_GET['ville'], $_GET['dept'] et $_GET['region'] pour identifier la ville
recoit $_GET['pop'] et $_GET['cp'] pour changer la population et le code postal de la ville


*/
require_once('./php/basic_functions.php');
require_once('./php/test_connect.php');

try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
    
}(Exception $e){
    header("Location: ./maint.php?".http_build_query($_GET).'&changeVilleErreur='.urlencode('$e->getMessage()'));
    exit();
}