<?php
/*
Fichier template
*/
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http





//On cree le html
make_html_start('Template','./css/template.css');

make_nav_bar();

say('Mon super message de debug !');
error('Mon super message d\'erreur !');

echo html('p','Voici un super parragraphe.');
echo html('div', html('p','Un truc dans un div'));


make_html_end();