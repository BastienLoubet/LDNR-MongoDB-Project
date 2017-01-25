<?php
/*deconnect.php Pour la déconnexion. doit effacer le cookie et effacer les fichiers de session et rediriger vars une page soit auth.php soit accueil.php*/

session_start();
session_destroy();

//On redirige vers l'ecran de connection
header("Location: ./auth.php");