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

function my_query($filter, $option, $mongo,$dbs='geo_france.regions'){
    $query = new MongoDB\Driver\Query($filter,$option);
    return $mongo->executeQuery($dbs,$query);
}

try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
	$regionToChange = $_GET['regionToChange'];
	$newRegionName = $_GET['newRegionName'];
	$listRegion = my_query(['nom' => $regionToChange],[], $mongo,'geo_france.regions');
	 $Region=$listRegion->toArray()[0];
     $result = count($Region);
	 if($result = 1)
	 {
		  $bulk = new MongoDB\Driver\BulkWrite();
		  $bulk->update(['nom' => $newRegionName]);
           // envoi dans base de données
		  $result = $mgc->executeBulkWrite('geo_france'.'.'.'regions', $bulk);
	 }
	 else
	 {
		 echo"Erreur!!! Le nom de région ne c'est pas mis à jour";
	 }
}catch(Exception $e){
    redirect_error('maint.php',$e->getMessage(),'changeRegionErreur');
    exit();
}

