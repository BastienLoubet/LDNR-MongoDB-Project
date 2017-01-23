<?php
/*
<<<<<<< HEAD
Si l'utilisateur souhaite une ville dont le nom existe en plusieurs endroits,
cette page affiche les choix disponibles pour ce nom de ville ainsi que le département et la région.
=======
>>>>>>> origin/master
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
    <fieldset>
function make_input(string $type,string $name,string $label=''){
    if(isset($_POST[$name]) && $_POST[$name]!='') $val="value='".htmlspecialchars($_POST[$name])."'";

make_html_end();