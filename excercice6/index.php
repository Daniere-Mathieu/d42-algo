<?php
$searchCharacter = "moi";
$line = "bonjour, c'est moi.\n T'es le bien venu sur mon site";
$newline = str_replace($searchCharacter, !empty($_GET["user"]) ? $_GET["user"] : "Théo", $line);

var_dump(substr_replace($line, !empty($_GET["user"]) ? $_GET["user"] : "Théo", strpos($line, $searchCharacter), strlen($searchCharacter)));
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="petit page qui un titre découper en deux , le titre affiche un nom personnaliser , la page comporte aussi un formulaire permetant de mettre a jour le title" />
    <title>excercice 6</title>
</head>

<body>
    <h1><?= nl2br($newline) ?></h1>
    <form action="./index.php" method="get">
        <input type="text" name="user">
        <button type="submit">changer le prénom</button>
    </form>
</body>

</html>