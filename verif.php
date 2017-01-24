<?php
/*
verif.php Pour la connexion appelle par le fichiers. Créé le cookie et redirige vers maint.php ou redirige vers l’authentification.
*/
require_once('./php/basic_functions.php');
make_html_start("Page Verif",'./css/verif.css'); 

$user= "toto";
$pass="1234";

if (empty($_POST["user"]) && empty($_POST["pass"])){ 


        echo '<form method="post" action="#">';
    
        echo '<input type="text" name="user" placeholder="User"></input>';
        echo '<input type="text" name="pass" placeholder="Pass"></input>';
    
        echo '<input class="con" type="submit" name="Connexion"></input>';
    
        echo '</form>';
    

}
else {
    if ($_POST["user"] == $user && $_POST["pass"] == $pass) {
        echo "Connexion";
    }
        else {
            echo "Erreur connexion";
        }
}
?>