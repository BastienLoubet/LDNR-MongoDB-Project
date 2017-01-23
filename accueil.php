<?php
/*
présenter une page d'accueil accessible à tous et à partir de laquelle il est possible  de demander
de visualiser les caractéristiques d'une ville par remplissage d'un formulaire présentant les champs suivants :
le nom de la ville (mention obligatoire),<input ’nom’
le département ou se situe la ville (optionnel),<input name=’dept’
la région ou se situe la ville (optionnel),<input name=’region’
un bouton de soumission du formulaire.
*/ 

?>





    <html>
    <fieldset>
        <div class="frm">
            <form method="get" action="#">
                <input type="text" name="villes" placeholder="Villes"></input>
                <br>
                <input type="text" name="dept" placeholder="Département"></input>
                <br>
                <input type="text" name="region" placeholder="Région"></input>
                <br>
                <input class="Cnx" type="submit" name="Connexion"></input>
            </form>
        </div>
    </fieldset>


    </html>