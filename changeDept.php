<?php
/*
recoit les donnees de maint.php pour faire les remplacements.
recoit $_GET['deptToChange'] pour identifier le departement
recoit $_GET['newDeptRegionName'] pour changer la region du departement departement
*/

require_once('./php/basic_functions.php');
require_once('./php/test_connect.php');

if( (!isset($_GET['deptToChange'])) || $_GET['deptToChange']=='' ){
    redirect_error('maint.php','Veuillez preciser le departement.','changeDeptErreur');
}
function my_query($filter, $option, $mongo,$dbs='geo_france.regions'){
    $query = new MongoDB\Driver\Query($filter,$option);
    return $mongo->executeQuery($dbs,$query);
try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
	$deptToChange = $_GET['deptToChange'];
	$newDeptRegionName = $_GET['newDeptRegionName'];
	$nomdept = my_query(['nom' => $deptToChange],[], $mongo,'geo_france.departements');
	$idregion  = my_query(['nom' => $newDeptRegionName],['_id'=>1], $mongo,'geo_france.regions');
	if(isset($idregion)){
		
		$command = new MongoDB\Driver\Command([
					   'update' => 'departements',
					   'updates' => [['q'=> ['_id_region'=>$deptToChange],
                       'u'=>['$set'=>['_id_region'=>$newDeptRegionName]],
                       'multi'=> true ]]  
					 ]);
		$cursor = $mongo->executeCommand('geo_france', $command);
	}
	else
	{
		redirect_error('maint.php',"Le département ou la région rentrée n'éxiste pas!!!",'changeDeptErreur');	
	}

    
}catch(Exception $e){
    redirect_error('maint.php',$e->getMessage(),'changeDeptErreur');
    exit();
}