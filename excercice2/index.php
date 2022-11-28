<?php
// je definie mes variables , afin de pouvoir les utiliser dans mon html , je les définie en haut pour séparer au maximun php et html; 
$helloWorld = "Hello world";
$srcImage = './javascript-736400_960_720.png';
$altImage = "photo du logo javascript";
// je fais une ternaire afin de recuperer une variable dans mon get ou prevenir les gens qu'il peuvent utiliser l'option ;
$text = !empty($_GET["describle"]) ? $_GET["describle"] : 'mettez un ?describle=valeur pour inserez une valeur custom';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="petit page qui contient un hello world , ainsi qu'un balise p mis en rouge et un logo de js" />
  <title>Exercice 2</title>
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <!-- j'apelle mes variables dadns mon html -->
  <h1><?= $helloWorld ?></h1>
  <p><?= $text ?></p>
  <img src="<?= $srcImage ?>" alt="<?= $altImage ?>" />
</body>

</html>