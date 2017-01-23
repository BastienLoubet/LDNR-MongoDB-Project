<?php
/*
de s'authentifier par remplissage d'un formulaire composé de deux champs :
un identifiant,
un mot de passe.
les identifiants et mots de passe seront prédéfinis dans une collection nommée users et chaque utilisateur aura également un profil prédéfini qui sera parmi les valeurs admin/edit.

Le maintien de l'authentification sera réalisé par le mécanisme des /cookies/session et en cas d'utilisateur authentifié il sera possible de se déconnecter par un lien dédié.

les utilisateurs non authentifiés seront redirigés vers la page d'accueil par une directive HTTP 303 (voir les redirections sur fr.wikipedia.org/wiki/Liste_des_codes_HTTP ainsi que la technique de redirection depuis PHP sur php.net/manual/fr/function.header.php
*/

