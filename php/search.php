<?php
/* La recherche pour l'autocompletion, retourne les 5 premieres villes qui match sous forme d'une chaine de charactere separer par '|'


*/
require_once('./basic_functions.php');
//header('Content-type: text/plain');
if (!isset($_POST['search'])) $_POST['search']='A';
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
            'find' => 'utilisateurs',
            'filter' => ['nom' => new MongoDB\BSON\Regex("^$name",'i')],
            'limit'=> 5
    ]);
        $cVilles= $mongo->executeCommand('geo_france', $command);
        make_html_start('test');
        bprint_r($cVilles);
        foreach($cVilles as $dVille){
            $aRes[$i]=$dVille->nom;
            bprint_r($dVille);
            $i++;            
        }
        make_html_end();
        echo implode('|',$aRes);
    
    }catch(Exception $e){
        echo $e->getMessage();
        exit();
    }
}else{
    echo 'Aucun resultat';
}