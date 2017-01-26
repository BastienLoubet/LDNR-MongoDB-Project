<?php
/*
recoit les donnees de maint.php pour faire les remplacements.
recoit $_GET['regionToChange'] pour identifier la region
recoit $_GET['newRegionName'] pour changer le nom de la region
url de test: http://localhost/LDNR-MongoDB-Project/changeRegion.php?regionToChange=Bretagne&newRegionName=Bretagnes

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
	 $aRegion=$listRegion->toArray();
     $result = count($aRegion);
	 if($result == 1)
	 {
		 $command = new MongoDB\Driver\Command([
					   'update' => 'regions',
					   'updates' => [['q'=> ['nom'=>$regionToChange],
                       'u'=>['$set'=>['nom'=>$newRegionName]],
                       'multi'=> true ]]  
					 ]);
		$cursor = $mongo->executeCommand('geo_france', $command);
		redirect_error('maint.php',"La région $regionToChange s'appelle maintenant $newRegionName",'changeRegionErreur');
	 }
	 else
	 {
		redirect_error('maint.php',"Erreur!!! La région que vous essayé de modifier n'éxiste pas!!!",'changeRegionErreur');
	 }
}catch(Exception $e){
    redirect_error('maint.php',$e->getMessage(),'changeRegionErreur');
    exit();
}

