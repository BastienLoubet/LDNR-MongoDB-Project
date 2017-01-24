<?php
/*
verif.php Pour la connexion appelle par le fichiers. Créé le cookie et redirige vers maint.php ou redirige vers l’authentification.
*/
require_once('./php/basic_functions.php');
make_html_start("Page Verif",'./css/verif.css'); 


if (empty($_POST["identifiant"]) && empty($_POST["mot_de_passe"])){ 

    /*Renvoyer utilisateur vers auth.php*/
}
else {
    if ($_POST["identifiant"] && $_POST["mot_de_passe"]) {
        echo "Connexion";
    }
        else {
            echo "Erreur connexion";
        }
}
?>