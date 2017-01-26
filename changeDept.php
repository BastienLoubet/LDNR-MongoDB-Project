<?php
/*
recoit les donnees de maint.php pour faire les remplacements.
recoit $_GET['deptToChange'] pour identifier le departement
recoit $_GET['newDeptRegionName'] pour changer la region du departement departement
 http://localhost/LDNR-MongoDB-Project/changeDept.php?deptToChange=Var&newDeptRegionName=Bretagnes
*/

require_once('./php/basic_functions.php');
require_once('./php/test_connect.php');

if( (!isset($_GET['deptToChange'])) || $_GET['deptToChange']=='' ){
    redirect_error('maint.php','Veuillez preciser le departement.','changeDeptErreur');
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
	$deptToChange = $_GET['deptToChange'];
	$newDeptRegionName = $_GET['newDeptRegionName'];
	$cRegion  = my_query(['nom' => $newDeptRegionName],[], $mongo,'geo_france.regions');
  
	$idregion = $cRegion->toArray()[0]->_id;
	
	if(isset($idregion)){
		
		$command = new MongoDB\Driver\Command([
					   'update' => 'departements',
					   'updates' => [['q'=> ['nom'=>$deptToChange],
                       'u'=>['$set'=>['_id_region'=>$idregion]],
                       'multi'=> true ]]  
					 ]);
		$cursor = $mongo->executeCommand('geo_france', $command);
		
		 /* make_html_start('test');
		  bprint_r($cursor);
	      make_html_end();
		  exit();*/
		  redirect_error('maint.php',"Le département du $deptToChange est bien en $newDeptRegionName",'changeDeptErreur');
	}
	else
	{
		redirect_error('maint.php',"Le département ou la région rentrée n'éxiste pas!!!",'changeDeptErreur');	
	}

    
}catch(Exception $e){
    redirect_error('maint.php',$e->getMessage(),'changeDeptErreur');
    exit();
}