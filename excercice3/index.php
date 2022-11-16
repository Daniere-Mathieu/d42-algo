<?php

// je définie une variable constante qui est égale au diviseur du calcul
define("DIVIDER", 3);

// dans cette fonction je vais recuperer le reste de du nombre afin d'obtenir le nombre d'élément sur la derniere ligne
/** 
 * la fonction retourne le nombre d'element sur la dernier ligne
 * @param int $number nombre d'element passer pour toutes les lignes
 */
function returnLastLineNumber(int $number): int
{
    return $number % DIVIDER === 0 ? DIVIDER : $number % DIVIDER;
}


// dans cette fonction je vais diviser par 3 le nombre de ligne et l'arrondir au superieur pour avoir le nombre de ligne
/**
 * @param int $number nombre d'element passer pour toutes les lignes
 */
function returnAllLine(int $number): int
{
    return ceil($number / DIVIDER);
}
$arr = [3, 8, 144, 152];

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>excercice 3</title>
    <meta name="description" content="petit page qui contient une liste d'element indiquant le nombre de ligne max obtenue" />

</head>

<body>
    <?php
    // je crée une boucle foreach (simplification de for) et je calcul pour chaque élément de mon tableau les valeurs

    foreach ($arr as $value) {
        $allLine = returnAllLine($value);
        $lastLine = returnLastLineNumber($value);
        echo ("la page contiendra $allLine ligne et la derniere ligne contiendras $lastLine élement");
        echo ("<br>");
    } ?>
</body>

</html>