<?php
//header('Content-Type: text/html; charset=utf-8');

//FONCTIONS DE DEBUG 
//automatise la mise en forme du print_r
function bprint_r($str) {
    echo '<pre>'.print_r($str,true).'</pre>';
}

//cree un message dans un paragraphe
function say(string $str) {
    echo "<p>$str</p>\n";
}

//cree un message dans un paragraphe
function error(string $str) {
    echo "<p class=\"error\">$str</p>\n";
}

//FONCTIONS pour creer le html
//Pour imbrique des elements html entre eux sans risque de faire une erreur sur une balise fermante.
function html(string $bal,string $str,string $class='',string $sOptionSup=''){
    if($class == '') $classstr = '';
    else $classstr = "class='".htmlspecialchars($class)."'";
    return "<$bal $classstr $sOptionSup>".$str."</$bal>\n";
}

//
function make_nav_bar(){
    echo html('div','Ma barre de navigation','navbar');
}

//Cree le header standard de tout mes fichiers html
function make_html_start(string $title, string $cssfile) {
    echo '<!DOCTYPE html>
        <html><head>';
    echo "<title> $title </title>";
    echo '<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo "
        <link rel=\"stylesheet\" href=\"./css/style.css\">
        <link rel=\"stylesheet\" href=\"$cssfile\">
        </head><body>";
}

//ferme les balises ouverte par make_html_start
function make_html_end(){
    echo '</body></html>';
}