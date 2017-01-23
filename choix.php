<?php
/*
Si l'utilisateur souhaite une ville dont le nom existe en plusieurs endroits,
cette page affiche les choix disponibles pour ce nom de ville ainsi que le département et la région.
Contient un liens pour revenir vers select.php avec les choix envoyer par select.php 
et fabrique le formulaire.
*/
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http


//On cree le html
make_html_start('Template','./css/template.css');

make_nav_bar();

say('Mon super message de debug !');
error('Mon super message d\'erreur !');

echo html('p','Voici un super parragraphe.');


make_html_end();