<?php
/*
recoit les donnees de maint.php pour faire les remplacements.
recoit $_GET['ville'], $_GET['dept'] et $_GET['region'] pour identifier la ville
recoit $_GET['pop'] et $_GET['cp'] pour changer la population et le code postal de la ville


*/
require_once('./php/basic_functions.php');
require_once('./php/test_connect.php');

if( (!isset($_GET['ville'])) || $_GET['ville']=='' ){
    redirect_error('maint.php','Veuillez preciser la ville.','changeVilleErreur');
}

try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
    
}catch(Exception $e){
    redirect_error('maint.php',$e->getMessage(),'changeVilleErreur');
    exit();
}