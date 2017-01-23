<?php
/*
Si l'utilisateur souhaite une ville dont le nom existe en plusieurs endroits,
cette page affiche les choix disponibles pour ce nom de ville ainsi que le département et la région.
Contient un liens pour revenir vers select.php avec les choix envoyer par select.php 
et fabrique le formulaire.
*/
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http

//On cree le html
make_html_start('Template','./css/template.css');

say('Mon super message de debug !');
error('Mon super message d\'erreur !');
$param = NULL;
$test = true;
if(isset($_GET[]))
{
    $param = $_GET;
}
else
{
    if($test)
    {
        $param = [
            ville1 => [ville => 'Paris', dept => '75', region => 'Ile-De-France' ],
            ville2 => [ville => 'Paris', dept => '75', region => 'Ile-De-France' ],
            ville3 => [ville => 'Paris', dept => '75', region => 'Ile-De-France' ]
        ];
    }
}

echo '<form method="GET" action="">';
echo '<fieldset>';
echo '<legend>Choisissez une ville''</legend>';
if(!$test)
{   
    foreach($param as $vals)
    {
        foreach(vals as $key => $val)
        {
            echo '<label>ville: '.$val;
            echo '<input type="radio" name="choix_ville" value='.$val.'>';
            echo '</label>';
        }
    }       
}
else{
    error('la variable $_GET n\'existe pas.');
}
echo '</fieldset>';
echo '</form>';



make_html_end();

