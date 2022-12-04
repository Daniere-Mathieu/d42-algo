<?php
// I create a line using \n which allows to make a line break and I use nl2br on the function to make it readable for html
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