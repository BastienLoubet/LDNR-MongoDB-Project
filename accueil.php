<?php
/*
présenter une page d'accueil accessible à tous et à partir de laquelle il est possible  de demander
de visualiser les caractéristiques d'une ville par remplissage d'un formulaire présentant les champs suivants :
le nom de la ville (mention obligatoire),<input ’nom’
le département ou se situe la ville (optionnel),<input name=’dept’
la région ou se situe la ville (optionnel),<input name=’region’
un bouton de soumission du formulaire.
*/ 
require_once('./php/basic_functions.php');
make_nav_bar();
make_html_start("Page d'accueil",'./css/accueil.css'); 
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
echo '<form method="get" action="./select.php">';
InputGenerator ("villes" , "Villes");
InputGenerator ("dept" , "Département");
InputGenerator ("region" , "Régions");
echo '<input class="submit" type="submit" name="accueil" value=Rechercher>';
echo '</input>';
echo '</form>';
echo '</div>';
echo '<div class="ctfr">';
echo '<img src="france.png" alt="carte" class="carte">';
echo '</div>';
echo '</fieldset>';
echo '</div>';

?>