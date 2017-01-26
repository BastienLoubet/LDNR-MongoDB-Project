<?php
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http





//On cree le html
make_html_start('Documentation','./css/affichage.css');

make_nav_bar();

echo "<div class='recherche'> <img src='./img/map_city_search.svg'> </div>\n";
echo "<span class='res'>";
echo '
Voici le schema de navigation de notre site. Il est divise en deux parties: Une centre sur le select.php pour afficher les informations des villes et une centre sur maint.php pour effectuer les operations de maintenances.
';
echo"</span>";


make_html_end();