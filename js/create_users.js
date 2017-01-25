//Cree deux utilisateurs un editeur en mode edit avec mot de passe toto et un administrateur en mode admin avec mot de passe titi
//faire "use geo_france;" et puis "load("D:/wamp64/www/projet/LDNR-MongoDB-Project/js/create_users.js");"
//use geo_france
db.utilisateurs.drop();

db.utilisateurs.insert({
   id: "editeur",
   mdp: "toto",
   profil: "edit"
});

db.utilisateurs.insert({
   id: "administrateur",
   mdp: "titi",
   profil: "admin"
});