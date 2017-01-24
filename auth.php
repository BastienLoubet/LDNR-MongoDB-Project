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

say('Mon super message de debug !');
error('Mon super message d\'erreur !');



echo '<div class="connexion">';
echo '<form method=POST action="">';
echo '<fieldset>';
echo '<legend>Authentifiez-vous</legend>';
echo '<input type="text" name="identifiant" value=""';
echo '<input type="password" name="mot_de_passe" value=""';
echo '<input type="submit" name="Connexion" value="Connexion"';
echo '</fieldset>';
echo '</form>';
echo '</div>';

echo '<div class="inscription">';
echo '<form method=POST action="">';
echo '<fieldset>';
echo '<legend>Inscrivez-vous</legend>';
echo '<input type="text" name="identifiant" value=""';
echo '<input type="password" name="mot_de_passe" value=""';
echo '<input type="submit" name="Inscription" value="Inscription"';
echo '</fieldset>';
echo '</form>';
echo '</div>';

echo html('p','Voici un super parragraphe.');
echo html('div', html('p','Un truc dans un div'));


make_html_end();