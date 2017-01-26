<?php
//http://localhost/LDNR-MongoDB-Project/affichage.php?nomVille=paris&nomDept=var&nomRegion=occitanie&cp=75000&lat=45&lon=85&pop=360000 pour tester la page 
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http




//On cree le html
make_html_start('Template','./css/affichage.css');
function afficheparam(string $arg, string $label){
  if(isset($arg)){
      
      echo"<div class='affichage'>";
      echo "<span class='label'> $label</span>\n";
	  echo "<span class='res'> &nbsp;$arg&nbsp;</span>\n";
      echo"</div>";
}  
    
}
make_nav_bar();

$cp=[];

$atab=[[$_GET['nomVille'],'Nom'],
       [$_GET['nomDept'].' ('.$_GET['codeDept'].')','Département'],
       [$_GET['nomRegion'],'Region'],
       [$_GET['cp'],'Code postal'],
       [$_GET['lat'],'Lattitude'],
       [$_GET['lon'],'Longitude'],
       [$_GET['pop'],'Population']];
echo '<img src="./img/newlog1.png" alt="carte" class="logo">';
echo '<div class="recherche">';
echo"<div class='param'>";
foreach($atab as $val){
    afficheparam($val[0],$val[1]);
}
echo"</div>";
echo"</div>";

make_html_end();