<?php
/*
les caractéristiques visualisées pour la ville sélectionnée seront :

son <span class=’titre’>nom</span> , <span class=’aff’> $_GET[‘nom’]</span>
le nom de son département,$_GET[‘dept’]
le nom de sa région,$_GET[‘region’]
son (ou ses) code postal (ou codes postaux),$_GET[‘region’]
sa latitude et sa longitude,$_GET[‘lat’] et $_GET[‘lon’]
sa population,$_GET[‘pop’]
et si vous en voulez d'avantage le dessin de la ville localisée dans son département (à l'aide du contour du département, des cordonnées de la ville et de l'aptitude à afficher du SVG dans le navigateur HTML5).
les champs absents ne seront pas remplis (par exemple dans le cas ou la population n'est pas renseignée)
*/