<?php

// I define a constant variable which is equal to the divisor of the calculation
define("DIVIDER", 3);

// in this function I will retrieve the rest of the number in order to obtain the number of elements on the last line
/** 
 * the function returns the number of elements on the last line
 * @param int $number number of elements to pass for all rows
 */
function returnLastLineNumber(int $number): int
{
    return $number % DIVIDER === 0 ? DIVIDER : $number % DIVIDER;
}


// in this function I will divide by 3 the number of lines and round it up to get the number of lines
/**
 * @param int $number number of elements to pass for all rows
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
    // I create a foreach loop (simplification of for) and I calculate for each element of my array the values
    foreach ($arr as $value) {
        $allLine = returnAllLine($value);
        $lastLine = returnLastLineNumber($value);
        echo ("la page contiendra $allLine ligne et la derniere ligne contiendras $lastLine élement");
        echo ("<br>");
    } ?>
</body>

</html>