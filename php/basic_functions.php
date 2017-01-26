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
    
    echo '<ul class="topnav">';
    
    echo '<li>';
    echo'<a href="accueil.php">Accueil</a>';
    echo '</li>';
    echo '<li>';
    echo'<a href="doc.php">Documentation</a>';
    echo '</li>';
    if(session_status() == PHP_SESSION_ACTIVE){
        echo '<li>';
        echo'<a href="maint.php">Maintenance</a>';
        echo '</li>';
        echo '<li>';
        echo'<a href="deconnect.php">Déconnexion</a>';
        echo '</li>';
    }else{
        echo '<li>';
        echo'<a href="auth.php">Connexion</a>';
        echo '</li>';
    }
    echo '</ul>';
}

//Cree le header standard de tout mes fichiers html
function make_html_start(string $title, string $cssfile='') {
    echo "<!DOCTYPE html>\n
        <html>\n<head>\n";
    echo "<title> $title </title>\n";
    echo "<meta charset=\"UTF-8\">\n
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
    echo "<link rel=\"stylesheet\" href=\"./css/style.css\">\n";
    if ($cssfile !='') echo "<link rel=\"stylesheet\" href=\"$cssfile\">";
    echo "</head><body>\n";
}

//ferme les balises ouverte par make_html_start
function make_html_end(){
    echo '</body></html>';
}

//La creation des inputs et le chargement de leurs valeurs
function InputGenerator ($name="nom",$plholder="placeholder",$options='') {
    if(isset($_GET[$name])){
        $setValue = "value='".htmlspecialchars($_GET[$name])."'";
    }else {$setValue='';}
    echo "<div><input type='text' class='rechrch' name=$name placeholder='$plholder' $setValue $options></div>";
}

//Input generator avec autocompletion
function InputGeneratorAutocomplete(string $inputId,string $placeholder,string $divResultId,string $collectionName){
    InputGenerator ($inputId , $placeholder,"id='$inputId' autocomplete='off'");
    echo "<div id='$divResultId' class='results'></div>";
    echo "<script src='./php/autocompletion.php?inputId=$inputId&collectionName=$collectionName&divResultId=$divResultId'></script>";
}

//fonction d'erreur avec redirection et renvoi des parametres passe en get
function redirect_error(string $url,string $message,string $errorname='error'){
    header("Location: ./$url?".http_build_query($_GET)."&$errorname=".urlencode($message));
    exit();
}