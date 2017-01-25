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

echo '<div class="logo">';
echo '<img src="./img/newlog1.png" alt="carte" class="cart">';
echo '</div>';
function InputGenerator ($name="nom",$plholder="placeholder") {
    echo "<input type='text' class='rechrch' name=$name placeholder=$plholder><br>";
}
echo '<div class="recherche">';
echo '<fieldset>';
echo '<div class="rech">';
echo '<h1>';
echo 'Entrez le nom de la ville';
echo '</h1>';
echo '<form method="get" action="./replace.php">';
InputGenerator ("villes" , "Villes");
InputGenerator ("dept" , "Département");
InputGenerator ("region" , "Régions");
echo '<input class="submit" type="submit" name="maint" value=Remplacer>';
echo '</form>';
echo '</div>';
echo '</fieldset>';
echo '</div>';

if(isset($_GET['erreur'])){
    error($_GET['erreur']);
}

make_html_end();
//Les lignes suivante ne test que si la session a ete cree et pas si les identifiants ont ete verifier sur la base de donnees
	/*test si la personne est connecté ou non (false si elle n'est pas connecté)*/
//	if(isset( $_SESSION["sessid"]) == true)
//			{
				/*instrcution si la personne est connecté*/
//			}
//			else 
				/*si la personne n'est pas authentifié, on la redirige gentiement vers la page d'accueil*/
//			header("Location: accueil.php");
