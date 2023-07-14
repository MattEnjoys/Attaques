-- On crée un base de donnée à la main, et on met le fichier sql dans importer dans la BDD du serveur local.

CREATE TABLE utilisateurs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom_utilisateur VARCHAR(50) NOT NULL,
  mot_de_passe VARCHAR(50) NOT NULL
);
INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe)
VALUES ('john', '123456');

INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe)
VALUES ('jane', '123456');

INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe)
VALUES ('jack', '123456');

INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe)
VALUES ('jim', '123456');