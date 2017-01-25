<?php
/*deconnect.php Pour la déconnexion. doit effacer le cookie et effacer les fichiers de session et rediriger vars une page soit auth.php soit accueil.php*/

session_start();
session_destroy();

//On redirige vers l'ecran de connection
header("Location: ./auth.php");

//session_destroy() efface aussi les autres variables de session
/*=======
session_start();	
unset($_SESSION["sessid"]);
/*unset() détruit la ou les variables dont le nom a été passé en argument var.*/
/*une fois la variable de session détruite avec le unset(), on redirige l'utilisateur sur la page d'accueil*/ 
//header("Location: accueil.php");