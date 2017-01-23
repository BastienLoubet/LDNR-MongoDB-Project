<?php
/*
Si l'utilisateur souhaite une ville dont le nom existe en plusieurs endroits,
cette page affiche les choix disponibles pour ce nom de ville ainsi que le département et la région.
*/
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http





//On cree le html
make_html_start('Template','./css/template.css');

make_nav_bar();

say('Mon super message de debug !');
error('Mon super message d\'erreur !');

echo html('p','Voici un super parragraphe.');

//On commence le formulaire
echo "<form id='inscriptionForm' action='' method='post'>
    <fieldset>
    <legend>Formulaire</legend>";
//On construit les autre inputs
function make_input(string $type,string $name,string $label=''){
    if(isset($_POST[$name]) && $_POST[$name]!='') $val="value='".htmlspecialchars($_POST[$name])."'";
    else $val='';
    echo "<label class='firstCol'>
    <input type='$type' name='$name' $val";
    if ($label!='') echo " placeholder=$label";    
    echo "></label>
    <br>";
}
make_input('text','phone_number',"Numero de telephone");

echo "<input type='submit' name='B1' id='submit' value='Envoyer' >";
echo '</fieldset></form>';


make_html_end();