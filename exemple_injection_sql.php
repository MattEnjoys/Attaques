<?php
/*
    - PDO nous permet de préparer, exécuter et récupérer des données.
    - La préparation de requête avec bindParam() nous permet de sécuriser nos requêtes.
*/
// Ci-dessous un exemple d’une requête non sécurisée
$pdo = new PDO('mysql:dbname=injsql;host=localhost;charset=utf8mb4', 'root', '');
// Récupération de la valeur de l'ID depuis la requête GET
$id = $_GET['id'];
// Préparation de la requête SQL avec la valeur de l'ID
$query = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = $id");
// Exécution de la requête SQL
$query->execute();
// Récupération de la première ligne de résultat
$result = $query->fetch(PDO::FETCH_ASSOC);
var_dump($result);

/*
    - Depuis l'adresse:
    http://localhost/PHP/Injections%20SQL/exemple_injection_sql.php
    un attaquant pourra injecter du code dans le paramètre d’url, par exemple, il peux rajouter :
?id=3;DELETE FROM utilisateurs;
    - Ce qui donnerais l'url suivante:
    http://localhost/PHP/Injections%20SQL/exemple_injection_sql.php?id=3;DELETE FROM utilisateurs;
    - La requête SQL suivante sera alors exécutée :
SELECT * FROM users WHERE id =58;DELETE FROM users;
    - Ce qui supprimera tous les utilisateurs présents en BDD.
*/

/*
    - Voici la bonne pratique:
*/

/*
// Ci-dessous un exemple d’une requête sécurisée
$pdo = new PDO('mysql:dbname=my_bdd;host=localhost;charset=utf8mb4', 'root', '');
// Récupération de la valeur de l'ID depuis la requête GET et conversion en entier
$id = (int) $_GET['id'];
// Préparation de la requête SQL avec un paramètre nommé
$query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
// Lier la valeur de l'ID en tant que paramètre
$query->bindParam(':id', $id);
// Exécution de la requête SQL
$query->execute();
// Récupération de la première ligne de résultat
$result = $query->fetch();
*/
?>