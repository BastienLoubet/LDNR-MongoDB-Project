//Cree deux utilisateurs un editeur en mode edit avec mot de passe toto et un administrateur en mode admin avec mot de passe titi
//
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