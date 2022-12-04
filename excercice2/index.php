<?php
// I define my variables, in order to be able to use them in my html, I define them at the top to separate php and html as much as possible; 
$helloWorld = "Hello world";
$srcImage = './javascript-736400_960_720.png';
$altImage = "photo du logo javascript";
// I make a ternary in order to recover a variable in my get or to warn people that they can use the option;
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
  <!-- I call my variables in my html-->
  <h1><?= $helloWorld ?></h1>
  <p><?= $text ?></p>
  <img src="<?= $srcImage ?>" alt="<?= $altImage ?>" />
</body>

</html>