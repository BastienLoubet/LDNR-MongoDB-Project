<?php
/*
fonction de test de MONGODB

*/
require_once('./php/basic_functions.php');

make_html_start('TestMongoDB');

try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
    //Insert syntax:
    $command = new MongoDB\Driver\Command([
        'insert' => 'utilisateurs',
        'documents' =>[['id'=> 'Bastien','mdp'=> 'Loubet','profil'=>'admin']] ]);
    //$cursor = $mongo->executeCommand('geo_france', $command);
    //update syntax:
    $command = new MongoDB\Driver\Command([
        'update' => 'utilisateurs',
        'updates' => [['q'=> ['id'=>'Bastien'],
                       'u'=>['$set'=>['mdp'=>'yeah']],
                      'multi'=> true ]]
    ]);
    $cursor = $mongo->executeCommand('geo_france', $command);
    bprint_r($cursor);
    
}catch(Exception $e){
    echo $e->getMessage();
}

make_html_end();