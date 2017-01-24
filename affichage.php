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
	  echo "<span class='res'> $arg</span>\n";
      echo"</div>";
}  
    
}
make_nav_bar();

$cp=[];

$atab=[[$_GET['nomVille'],'nom:'],
       [$_GET['nomDept'].' ('.$_GET['codeDept'].')','Département:'],
       [$_GET['nomRegion'],'Region:'],
       ['cp','code postal:'],
       ['lat','lattitude:'],
       ['lon','longitude:'],
       ['pop','population:']];
foreach($atab as $val){
    afficheparam($val[0],$val[1]);
}


make_html_end();