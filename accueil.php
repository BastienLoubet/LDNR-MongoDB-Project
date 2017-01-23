<?php
/*
présenter une page d'accueil accessible à tous et à partir de laquelle il est possible :
de visualiser les caractéristiques d'une ville par remplissage d'un formulaire présentant les champs suivants :
le nom de la ville (mention obligatoire),
le département ou se situe la ville (optionnel),
la région ou se situe la ville (optionnel),
un bouton de soumission du formulaire.
Dans le cas ou le critère de choix mène à plusieurs résultats (par exemple si l'on ne précise que le nom, et que plusieurs villes ont ce nom là) alors un second formulaire sera produit, celui-ci présentera pour chaque résultat de la recherche précédente une saisie de type radio-bouton accompagnée du nom du département dans le-quel se situe la ville (en France il est impossible d'avoir 2 noms de communes identiques au sein du même département).
les caractéristiques visualisées pour la ville sélectionnée seront :

son nom,
le nom de son département,
le nom de sa région,
son (ou ses) code postal (ou codes postaux),
sa latitude et sa longitude,
sa population,
et si vous en voulez d'avantage le dessin de la ville localisée dans son département (à l'aide du contour du département, des cordonnées de la ville et de l'aptitude à afficher du SVG dans le navigateur HTML5).
les champs absents ne seront pas remplis (par exemple dans le cas ou la population n'est pas renseignée)
LA PAGE DOIT CONTENIR UN LIEN VERS LA PAGE D ‘AUTHENTIFICATION (‘./auth.php’)
*/
