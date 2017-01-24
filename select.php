<?php
/*
‘ header("Location: http://www.example.com/");‘
http_build_query() pour passer des variables en get sur une url
Effectue la requête sur la base de donnée et redirige vers accueil.php si la requête ne retourne aucun résultat.
Si elle trouve un seul résultat redirige vers affichage.php
Si plusieurs résultats redirige vers choix.php
*/
//http://localhost/projet/LDNR-MongoDB-Project/select.php?submit=accueil&nom=Paris


require_once('./php/basic_functions.php');

function my_query($filter, $option, $mongo,$dbs='geo_france.villes'){
    $query = new MongoDB\Driver\Query($filter,$option);
    return $mongo->executeQuery($dbs,$query);
}

function my_command($aCommand,$mongo,$dbName='geo_france'){
    $cmd = new MongoDB\Driver\Command($aCommand);
    return $mongo->executeCommand($dbName, $cmd);
}   

//fonction pour filtrer les variables
function get_var(&$toget){
    if (isset($toget)) return $toget;
    return '';
}


//fonction de debug
function make_html(string $str){
    make_html_start('Test','./template.css');
    say($str);
    make_html_end();
    exit();
}
function make_bprint(&$obj){
    make_html_start('Test','./template.css');
    bprint_r($obj);
    make_html_end();
    exit();
}

//renvoie un tableau avec la region et le departement de toute les villes qui ont le nom $name une par ligne
function mongoSearch($name,$mongo){
    $aRes=[];
    $i=0;
    $cVilles= my_query(['nom' => $name],[], $mongo,'geo_france.villes');
    foreach($cVilles as $dVille){
        $cDept = my_query(['_id' => $dVille->_id_dept],[], $mongo,'geo_france.departements');
        $dDept=$cDept->toArray()[0];
        $cRegion = my_query(['_id' => $dDept->_id_region],[], $mongo,'geo_france.regions');
        $dRegion = $cRegion->toArray()[0];
        $aRes[$i] = ['nomVille' => $dVille->nom,
                'nomDept' => $dDept->nom,
                'nomRegion' => $dRegion->nom,
                'cp' => $dVille->cp,
                'lon' => $dVille->lon,
                'lat' => $dVille->lat,
                'pop' => $dVille->pop,
                'codeDept'=> $dDept->code
               ];
        $i++;
    }
    return $aRes;
}


try{
    // les paramètres de connexion
    $dsn='mongodb://localhost:27017';
    // création de l'instance de connexion
    $mongo = new MongoDB\Driver\Manager($dsn);
    //Si la requete vient de la page accueil.php
    $bTest=false;
    if(isset($_GET['accueil'])){
        //On prend les parametres dont on a besoin
        $name = get_var($_GET['villes']);
        $dept = get_var($_GET['dept']);
        $region = get_var($_GET['region']);
        $bTest=true;
    }
    if(isset($_GET['choix'])){
        //On prend les parametres dont on a besoin
        $aVar = explode('_',$_GET['choix_ville']);
        $name = get_var($aVar[0]);
        $dept = get_var($aVar[1]);
        $region = get_var($aVar[2]);
        //make_bprint($aVar[2]);
        $bTest=true;
    }
    
    //Si la requete vient de nul part
    if (!$bTest) {
        header("Location: ./accueil.php");
        exit();
    }
    
    
    if($name == ''){
        //renvoie un message d'erreur
        header("Location: ./accueil.php?erreur=".urlencode('Le nom doit être renseigné !'));
        exit();
    }

    $aVilles = mongoSearch($name,$mongo);
    if($dept != ''){
        foreach($aVilles as $key => $aVal){
            if($aVal['nomDept'] != $dept){
                unset($aVilles[$key]);
            }
        }
    }
    if($region != ''){
        foreach($aVilles as $key => $aVal){
            if($aVal['nomRegion'] != $region){
                unset($aVilles[$key]);
            }
        }
    }
    if(count($aVilles)==0 || count($aVilles)==false){
        header("Location: ./accueil.php?".http_build_query($_GET).urlencode('&erreur=La requete ne retourne pas de resultats'));
        exit();
    }
    if(count($aVilles)==1){
        reset($aVilles);//curseur au debut
        header("Location: ./affichage.php?".http_build_query(current($aVilles)));
        exit();
    }
    if(count($aVilles)>1){
        header("Location: ./choix.php?".http_build_query($aVilles));
        exit();
    }
    make_html_start('Test','./css/template.css');
    say('Pas rediriger !');
    make_html_end();

}catch (Exception $e){
    echo "Exception intercepte: ".$e->getMessage();
}
