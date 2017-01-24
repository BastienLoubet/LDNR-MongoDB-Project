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
make_html_start('Template','./css/choix.css');

$param = NULL; //variable qui sera utilisée pour l'affichage des choix à l'utilisateur.
$test = true; //variable permettant de mettre le script en mode test. en production il faut remettre cette variable a false.

if(!empty($_GET)) //on vérifie si la variable est contient des informations.
{
    $param = $_GET;
}
else //si la variable $_GET est vide, on vérifie si le script est lancé en mode test.
{
    say('Test Mode!!');
    if($test) //Le mode de test consiste à initier la variable $param avec un jeu de test.
    {
        $param = [
            'ville1' => ['ville' => 'Paris', 'dept' => '75', 'region' => 'Ile-De-France' ],
            'ville2' => ['ville' => 'Marseilles', 'dept' => '13', 'region' => 'PACA' ],
            'ville3' => ['ville' => 'Toulouse', 'dept' => '31', 'region' => 'Midi-Pyrénées' ]
        ];
    }
}

//affichage du formulaire pour choisir la bonne ville.

echo '<form method="GET" action="./select.php">'."\n";
echo '<fieldset class="fieldset">'."\n";
echo '<legend>Choisissez une ville</legend>'."\n";

if(!empty($param))
{   
    
    foreach($param as $vals)
    {
        //echo "<div>"."\n";
        echo '<input class="submit" type="submit" name="choix_ville" value='.implode('_',$vals).'>'."\n"; //affichage des boutons radio la valeur est la concaténation des chaînes villes, département et région
        //echo implode(' - ',$vals); //affichage du texte
        //echo '</div>'."\n";
    }
           
}
else{
    error('la variable $param est vide.'); //affichage d'un message d'erreur si la variable $param ne contient aucune information
}
//echo '<input id="submit" type="submit" name="Valider" value="Valider"/>'."\n";
echo '</fieldset>'."\n";
echo '</form>'."\n";



make_html_end();