# Exemples d'attaques:

## Les injection SQL:

    1 - On crée une BDD : pour l'exemple, je crée "injection_sql".

    2 - J'importe le fichier présent injection_sql.sql qui va ajouter la table utilisateurs, et quatre inserts fictifs.

    3 - La premiere partie de "exemple_injection_sql.php" est l'exemple non sécurisé, la deuxième partie est l'exemple sécurisé. Il faudra le commenter, pour comprendre l'acheminement de l'attaque.

    4 - A l'adresse suivante: http://localhost/PHP/Injections%20SQL/exemple_injection_sql.php, il faudra donc rajouter le code fournis dans l'exemple pour voir que tous les utilisateurs ont étés supprimés.

## Les failles XSS:

#### Contexte:

> Vous recevez un mail d'une de vos boutique en ligne préférée.
> A l'ouverture, vous avez donc le rendu front de "exemple_faille_xss.php".
> Au clique sur le liens de redirection, vous pensez être redirigé vers votre profil sur le site concerné, sauf que l'attaquant vous redirige la ou il souhaite.

#### Comment ça fonctionne:

> Tout se passe dans l'url, qui est au préalablement personnalisée, en amont, avec le prénom du destinataire, et dont vous ne pretez pas attention.

##### Exemple type:

    1 - A l'adresse suivante: http://localhost/PHP/Injections%20SQL/exemple_faille_xss.php?prenom=John.

    2 - Grâce à ce code mis à la place du prénom dans l'url:

`<script>
    window.location = 'https://www.google.fr';
</script>`

3 - Ce qui donne l'adresse url suivante:
`http://localhost/PHP/Injections%20SQL/exemple_faille_xss.php?prenom=<script>window.location = 'https://www.google.fr';</script>`

> L'attaquant peux rediriger l'utilisateur où il le souhaite.

> Pour l'exemple, ce sera sur www.google.fr, mais il pourrais très bien clonner la partie du site concerné, et faire croire à une redirection basique sur le site d'origine, alors qu'en fait il redirige sur un endroit spécifiquement choisis.

    4 - Pour se prémunir de cette attaque et faire en sorte que ce ne soit plus interpreté comme du HTML, il faudra rajouter la fonction "htmlentities()" et mettre en paramètre ce que l'on souhaite transformer, ce qui rendra le script non interpretable.

    5 - Voici le code corrigé:

`<h1>Joyeux anniversaire
        <?=htmlentities($_GET["prenom"]); ?>
    </h1>`

    6 - En résumé:

> Rendu front sans la fonction:

`Redirection vers le site, ou l'adresse url souhaitée.`

> Rendu front avec la fonction:

`Joyeux anniversaire <script> window.location = 'https://www.google.fr'; </script>`

> Le script n'est plus interprété.
