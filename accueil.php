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
make_nav_bar();
echo '<div class="logo">';
echo '<img src="./img/newlog1.png" alt="carte" class="cart">';
echo '</div>';
echo '<div class="recherche">';
echo '<fieldset>';
echo '<legend>Rechercher une ville</legend>'."\n";
echo '<div class="rech">';
echo '<form method="get" action="./select.php">';


InputGeneratorAutocomplete('villes','Villes','resultsVilles','villes');
InputGeneratorAutocomplete('dept','Département','resultsDept','departements');
InputGeneratorAutocomplete('region','Régions','resultsRegion','regions');
echo '<input class="submit" type="submit" name="accueil" value=Rechercher>';

if(isset($_GET['erreur'])){
    error($_GET['erreur']);
}
echo '</form>';
echo '</div>';
echo '</fieldset>';
echo '</div>';

make_html_end();