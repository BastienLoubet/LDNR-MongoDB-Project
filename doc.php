<?php
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http





//On cree le html
make_html_start('Documentation','./css/affichage.css');

make_nav_bar();

echo "<div class='recherche'> <img src='./img/Map_City_Search.svg'> </div>\n";
echo "<div class='res'>";
echo '
Voici le schema de navigation de notre site. Il est divise en deux parties: Une centré sur le select.php pour afficher les informations des villes et une centré sur maint.php pour effectuer les opérations de maintenances.
';
echo"</div>";

echo "<div class='res'>";
echo "Choses qui reste à faire:";
echo html('ul',html('li','Finir changeVille.php.',"listdoc").html('li','Pas de check-box pour la fusion des regions sur la page de maintenance.',"listdoc").html('li','pas de dessin de la carte des départements.',"listdoc"));
echo"</div>";

make_html_end();