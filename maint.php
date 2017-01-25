<?php
/*
Un utilisateur authentifié aura également accès à une page de maintenance décrite ci-après.

la page de maintenance permettra selon le profil :
aux utilisateurs authentifiés avec le profil edit :
de modifier les paramètres code postal et population,
aux utilisateurs authentifiés avec le profil admin :
de modifier tous les paramètres permis par l'application (on rajoute le nom des régions et l'appartenance des départements aux régions).
afin de simplifier l'opération de migration des régions en cours sur notre territoire national on pourrait aussi permettre à l'application d'effectuer la fusion de plusieurs régions par sélection de celles-ci via des check-box.
les utilisateurs non authentifiés seront redirigés vers la page d'accueil par une directive HTTP 303 (voir les redirections sur fr.wikipedia.org/wiki/Liste_des_codes_HTTP ainsi que la technique de redirection depuis PHP sur php.net/manual/fr/function.header.php
*/

require_once('./php/basic_functions.php');
require_once('./php/constants.php');

session_start();

//Si l'utilisateur n'est pas passer par verif.php cette variable n'est pas initialise
if(!isset($_SESSION['connect'])){
    header("Location: ./auth.php");
    exit();
}

//On verifie que l'utilisateur ne c'est pas connecte depuis trop longtemps
if(time() - $_SESSION('last_connect') < sessionTime ){
    header("Location: ./deconnect.php");
    exit();
}


make_html_start('Edition');

make_nav_bar();

make_html_end();