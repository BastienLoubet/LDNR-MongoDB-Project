<?php
/*
recoit les donnees de maint.php pour faire les remplacements.
recoit $_GET['regionToChange'] pour identifier la region
recoit $_GET['newRegionName'] pour changer le nom de la region


*/
require_once('./php/basic_functions.php');
require_once('./php/test_connect.php');

if( (!isset($_GET['regionToChange'])) || $_GET['regionToChange']=='' ){
    redirect_error('maint.php','Veuillez preciser la region.','changeRegionErreur');
}

try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
    
}(Exception $e){
    redirect_error('maint.php',$e->getMessage(),'changeRegionErreur');
    exit();
}