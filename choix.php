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

say('Mon super message de debug !');
error('Mon super message d\'erreur !');
$param = NULL;
$test = true;
$res = NULL;

if(!empty($_GET))
{
    $param = $_GET;
}
else
{
    say('Test Mode!!');
    if($test)
    {
        $param = [
            'ville1' => ['ville' => 'Paris', 'dept' => '75', 'region' => 'Ile-De-France' ],
            'ville2' => ['ville' => 'Marseilles', 'dept' => '13', 'region' => 'PACA' ],
            'ville3' => ['ville' => 'Toulouse', 'dept' => '31', 'region' => 'Midi-Pyrénées' ]
        ];
    }
}

echo '<form method="GET" action="">'."\n";
echo '<fieldset>'."\n";
echo '<legend>Choisissez une ville</legend>'."\n";

if(!empty($param))
{   
    
    foreach($param as $vals)
    {
        echo '<p>'."\n";
        echo '<input type="radio" name="choix_ville" value='.implode('_',$vals).'>'."\n";
        echo implode(' - ',$vals);
        echo '</label>'."\n";
        echo '</p>'."\n";
    }
           
}
else{
    error('la variable $param est vide.');
}
echo '<input type="submit" name="Valider"/>'."\n";
echo '</fieldset>'."\n";
echo '</form>'."\n";



make_html_end();

