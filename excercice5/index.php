<?php
// je crée une ligne en utilisant \n qui permet de faire un retour a la ligne et j'utilise nl2br sur la fonction pour la rendre lisible pour l'html
$line = nl2br("bonjour, c'est moi.\n T'es le bien venu sur mon site");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="petit page qui un titre découper en deux" />
    <title>excercice 5</title>
</head>

<body>
    <h1><?= $line ?></h1>
</body>

</html>