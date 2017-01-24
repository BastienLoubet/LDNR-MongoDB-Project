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
make_html_start("Page d'accueil",'./css/accueil.css'); 

function InputGenerator ($name="nom",$plholder="placeholder") {
    echo "<input type='text' name=$name placeholder=$plholder><br>";
}
echo '<div class="recherche">';
echo '<fieldset>';
echo '<form method="get" action="#">';
InputGenerator ("villes" , "Villes");
InputGenerator ("dept" , "Département");
InputGenerator ("region" , "Régions");
echo '<input class="Cnx" type="submit" name="Connexion">';
echo '</input>';
echo '</form>';
echo '</fieldset>';
echo '</div>';

?>