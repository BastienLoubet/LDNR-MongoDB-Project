<?php
header('Content-Type: text/html; charset=utf-8');

//automatise la mise en forme du print_r
function bprint_r($str) {
    echo '<pre>'.print_r($str,true).'</pre>';
}

//Cree le header standard de tout mes fichiers html
function make_html_start(string $title, string $cssfile='./css/style.css') {
    echo '<!DOCTYPE html>
        <html><head>';
    echo "<title> $title </title>";
    echo '<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo "
        <link rel=\"stylesheet\" href=\"$cssfile\">
        </head><body>";
}

//ferme les balises ouverte par make_html_start
function make_html_end(){
    echo '</body></html>';
}

//cree un message dans un paragraphe
function say(string $str) {
    echo "<p>$str</p>";
}

//Pour imbrique des elements html entre eux sans risque de faire une erreur sur une balise fermante.
function html(string $str,string $bal='p',string $class=''){
    if($class == '') $classstr = '';
    else $classstr = "class='".htmlspecialchars($class)."'";
    return "<$bal>".$str."</$bal>";
}