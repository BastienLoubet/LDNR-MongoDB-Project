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
require_once('./php/test_connect.php');


make_html_start('Edition');


make_nav_bar();

echo '<div class="logo">';
echo '<img src="./img/newlog1.png" alt="carte" class="cart">';
echo '</div>';

echo '<div class="recherche">';
echo '<fieldset>';
echo '<div class="rech">';
echo '<h1>';
echo 'Formulaire de maintenance';
echo '</h1>';
echo '<form method="get" action="./changeVille.php">';
echo "<p>Ville a changer</p>\n";
InputGenerator ("ville" , "Ville");
InputGenerator ("dept" , "Département");
InputGenerator ("region" , "Régions");
echo "<p> entree a modifier </p>\n";
InputGenerator ("cp" , "Code postal");
InputGenerator ("pop" , "Population");
if(isset($_GET['changeVilleErreur'])){
    error($_GET['changeVilleErreur']);
}
echo '<input class="submit" type="submit" name="maint" value=Remplacer>';
echo '</form>';


if($_SESSION['connect']=='admin'){
    echo '<form method="get" action="./changeRegion.php">';
    echo "<p>Région à changer</p>\n";
    //InputGenerator ("regionToChange" , "Region");
    InputGeneratorAutocomplete('regionToChange',"Région",'resultsRegionA','regions');
    echo "<p> entrée à modifier </p>\n";
    InputGenerator ("newRegionName" , "Nouveau nom");
    echo '<input class="submit" type="submit" name="maint" value=Remplacer>';
    if(isset($_GET['changeRegionErreur'])){
        error($_GET['changeRegionErreur']);
    }
    echo '</form>';
}

if($_SESSION['connect']=='admin'){
    echo '<form method="get" action="./changeDept.php">';
    echo "<p>Département à changer</p>\n";
    //InputGenerator ("deptToChange" , "Region");
    InputGeneratorAutocomplete('deptToChange',"Département",'resultsDeptA','departements');
    echo "<p> entrée à modifier </p>\n";
    InputGeneratorAutocomplete('newDeptRegionName',"Région",'resultsRegionB','regions');
    //InputGenerator ("newDeptRegionName" , "Nouvelle region");
    echo '<input class="submit" type="submit" name="maint" value=Remplacer>';
    if(isset($_GET['changeDeptErreur'])){
        error($_GET['changeDeptErreur']);
    }
    echo '</form>';
}

echo '</div>';
echo '</fieldset>';
echo '</div>';

make_html_end();
