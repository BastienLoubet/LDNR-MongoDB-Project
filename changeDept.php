<?php
/*
recoit les donnees de maint.php pour faire les remplacements.
recoit $_GET['deptToChange'] pour identifier la region
recoit $_GET['newDeptRegionName'] pour changer le nom de la region


*/
require_once('./php/basic_functions.php');
require_once('./php/test_connect.php');

if( (!isset($_GET['deptToChange'])) || $_GET['deptToChange']=='' ){
    redirect_error('maint.php','Veuillez preciser le departement.','changeDeptErreur');
}

try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
    
}catch(Exception $e){
    redirect_error('maint.php',$e->getMessage(),'changeDeptErreur');
    exit();
}