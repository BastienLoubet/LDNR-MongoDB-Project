<?php
/*
de s'authentifier par remplissage d'un formulaire composé de deux champs :
un identifiant,
un mot de passe.
les identifiants et mots de passe seront prédéfinis dans une collection nommée users et chaque utilisateur aura également un profil prédéfini qui sera parmi les valeurs admin/edit.

Le maintien de l'authentification sera réalisé par le mécanisme des /cookies/session et en cas d'utilisateur authentifié il sera possible de se déconnecter par un lien dédié.

les utilisateurs non authentifiés seront redirigés vers la page d'accueil par une directive HTTP 303 (voir les redirections sur fr.wikipedia.org/wiki/Liste_des_codes_HTTP ainsi que la technique de redirection depuis PHP sur php.net/manual/fr/function.header.php
*/

/*
Fichier template
*/
require_once('./php/basic_functions.php');
//Avant d'envoyer le premier header http


//On cree le html
make_html_start('Authentification','./css/auth.css');
make_nav_bar();

$identifiant = "";

echo '<div class="recherche">'."\n";
echo '<form method=POST action="">'."\n";
echo '<fieldset class="fieldset">'."\n";
echo '<legend>Authentifiez-vous</legend>'."\n";
echo '<div class=auth_champs>'."\n";
echo '<label for="identifiant">identifiant</label>';
if(!empty($_POST['identifiant']))
{
    $identifiant = $_POST['identifiant'];
}
echo '<input type="text" name="identifiant" value="'.$identifiant.'"/>'."\n";
echo '<label for="mot_de_passe">Mot de passe</label>';
echo '<input type="password" name="mot_de_passe" value=""/>'."\n";
echo '</div>'."\n";
echo '<div class="auth_submit_zone">'."\n";
echo '<input class="submit auth__auth_submit" type="submit" name="Connexion" value="Connexion"/>'."\n";
echo '</div>'."\n";
echo '</fieldset>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";


make_html_end();