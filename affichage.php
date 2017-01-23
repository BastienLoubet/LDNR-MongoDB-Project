<?php
/*
Fichier template
*/
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http





//On cree le html
make_html_start('Template','./css/template.css');

make_nav_bar();

$cp=[];
echo"<div class='affichage'>";
if(isset($_GET['nom'])){
    $nom=$_GET['nom'];
	echo "<span> $nom</span>\n";
}
if(isset($_GET['dept'])){
    $dtp=$_GET['dept'];
	echo" <span>$dtp</span>\n";
}
if(isset($_GET['region'])){
    $region=$_GET['region'];
	echo "<span>$region</span>\n";
}else 
{
    $region="";
}
if(isset($_GET['cp'])){
    $cp=$_GET['cp'];
foreach ($cp as $key) {
    echo "<span>$key<br /></span>\n";
}
}
if(isset($_GET['lat'])){
    $lat=$_GET['lat'];
	echo"<span> $lat</span>\n";
}
if(isset($_GET['lon'])){
    $lon=$_GET['lon'];
	echo "<span>$lon</span>\n";
}
if(isset($_GET['pop'])){
    $pop=$_GET['pop'];
	echo"<span> $pop</span>\n";
}
echo"</div>";

make_html_end();