<?php
/*
verification de connection hors verif.php
*/
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
}else {
    $_SESSION['last_connect'] = time();
}