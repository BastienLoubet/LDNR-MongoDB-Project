<?php
/* La recherche pour l'autocompletion, retourne les 5 premieres villes qui match sous forme d'une chaine de charactere separer par '|'


*/
require_once('./basic_functions.php');
header('Content-type: text/plain');
//ligne de debug
//if(!isset($_POST['search'])) $_POST['search']='A';
if (isset($_POST['search']) && isset($_POST['collection'])){
    if($_POST['search']==''){
        echo '';
        exit();
    }
    try{
        // les paramètres de connexion
        $dsn='mongodb://localhost:27017';
        // création de l'instance de connexion
        $mongo = new MongoDB\Driver\Manager($dsn);
        $name=$_POST['search'];
        $collection = $_POST['collection'];
        $aRes=[];
        $i=0;
        $command = new MongoDB\Driver\Command([
            'distinct' => $collection,
            'key' => 'nom',
            'query' => ['nom' => new MongoDB\BSON\Regex("^$name",'i')]
        ]);
        $aVilles= ($mongo->executeCommand('geo_france', $command))->toArray();
        foreach($aVilles[0]->values as $sVille){
            $aRes[$i]=$sVille;
            $i++;
            if($i>5) break;    
        }
        echo implode('|',$aRes);
    
    }catch(Exception $e){
        echo $e->getMessage();
        exit();
    }
}else{
    echo 'Aucun resultat';
}