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


require_once('./php/basic_functions.php');


if (empty($_POST["identifiant"]) || empty($_POST["mot_de_passe"])){ 

    /*Renvoyer utilisateur vers auth.php*/ 
	/*selon la doc php.net: Le deuxième type d'appel spécial est "Location:". 
	Non seulement il renvoie un en-tête au client, mais, en plus, il envoie un statut REDIRECT (302) au navigateur 
	tant qu'un code statut 201 ou 3xx n'a pas été envoyé.*/
	header("Location: ./auth.php?".http_build_query(["Erreur"=>"Login ou mot de passe manquant"]));
    
}
else {
    $cResult = my_query(["id"=> $_POST["identifiant"], "mdp"=> $_POST["mot_de_passe"]], [], $mongo);
    $tabResult = $cResult-> toArray();


    if (!empty($tabResult)) {
		session_start();
        $_SESSION['connect']=$tabResult[0]->profil;
        $_SESSION['last_connect']=time();
        /*Renvoyer utilisateur vers maint.php*/
		header("Location: ./maint.php");
    }
        else {
            //echo "Erreur connexion";
            header("Location: ./auth.php?".http_build_query(["Erreur"=>"Login ou mot de passe incorrect"]));
        }
}
?>