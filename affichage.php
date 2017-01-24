<?php
//http://localhost/LDNR-MongoDB-Project/affichage.php?nomVille=paris&nomDept=var&nomRegion=occitanie&cp=75000&lat=45&lon=85&pop=360000 pour tester la page 
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http





//On cree le html
make_html_start('Template','./css/affichage.css');
function afficheparam(string $arg){
  if(isset($_GET[$arg])){
    $param=$_GET[$arg];
	echo "<span> $param</span>\n";
}  
    
}
make_nav_bar();

$cp=[];
echo"<div class='affichage'>";
$atab=['nomVille', 'codeDept','nomRegion','cp','lat','lon','pop'];
foreach($atab as $val){
    afficheparam($val);
}
echo"</div>";

make_html_end();