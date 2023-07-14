<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Joyeux anniversaire
        <?= ($_GET["prenom"]); ?>
    </h1>
    <p>Nous vous offrons un bon d'achat d'une valeur de 10€ à valoir sur votre prochain achat !</p>
    <p>Pour en profiter immédiatement, retournez vite sur votre profil, la réduction s'appliquera automatiquement.</p>

    <!-- Lien de redirection vers Google -->
    <a
       href="http://localhost/PHP/Injections%20SQL/exemple_faille_xss.php?prenom=%3Cscript%3E%20window.location%20=%20%27https://www.google.fr%27;%20%3C/script%3E">Lien
        direct vers mon profil</a>
</body>

</html>