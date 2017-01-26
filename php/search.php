<?php
/* La recherche pour l'autocompletion, retourne les 5 premieres villes qui match sous forme d'une chaine de charactere separer par '|'


*/
require_once('./basic_functions.php');
header('Content-type: text/plain');

if (isset($_POST['search'])){
    try{
        // les paramètres de connexion
        $dsn='mongodb://localhost:27017';
        // création de l'instance de connexion
        $mongo = new MongoDB\Driver\Manager($dsn);
        $name=$_POST['search'];
        $aRes=[];
        $i=0;
        $command = new MongoDB\Driver\Command([
            'find' => 'villes',
            'filter' => ['nom' => new MongoDB\BSON\Regex("^$name",'i')],
            'limit'=> 5
    ]);
        $cVilles= $mongo->executeCommand('geo_france', $command);
        foreach($cVilles as $dVille){
            $aRes[$i]=$dVille->nom;
            $i++;            
        }
        echo implode('|',$aRes);
    
    }catch(Exception $e){
        echo $e->getMessage();
        exit();
    }
}else{
    echo 'Aucun resultat';
}