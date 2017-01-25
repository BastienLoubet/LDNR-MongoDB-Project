<?php
/*
verif.php Pour la connexion appelle par le fichiers. Créé le cookie et redirige vers maint.php ou redirige vers l’authentification.
*/
    function my_query($filter, $option, $mongo,$dbs='geo_france.utilisateurs'){
    $query = new MongoDB\Driver\Query($filter,$option);
    return $mongo->executeQuery($dbs,$query);
}

function my_command($aCommand,$mongo,$dbName='geo_france'){
    $cmd = new MongoDB\Driver\Command($aCommand);
    return $mongo->executeCommand($dbName, $cmd);
}   

// les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
    //Si la requete vient de la page accueil.php

require_once('./php/basic_functions.php');

if (empty($_POST["identifiant"]) || empty($_POST["mot_de_passe"])){ 

    /*Renvoyer utilisateur vers auth.php*/
}
else {
    $cResult = my_query(["id"=> $_POST["identifiant"], "mdp"=> $_POST["mot_de_passe"]], [], $mongo);
    $tabResult = $cResult-> toArray();
    
    if ($_POST["identifiant"] == $identifiant && $_POST["mot_de_passe"] ==$mot_de_passe) {
        echo "Connexion";
        /*Renvoyer utilisateur vers maint.php*/
    }
        else {
            echo "Erreur connexion";
        }
}
?>