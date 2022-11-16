<?php
// j'initie mes variable "globales" en haut de mon document
$depot = [122, 143, 45, 28];
$withdraw = [12, 47, 60, 80];


enum Gender: string
{
    case Female = 'Madame';
    case Male = "Monsieur";
}

class Bank
{
    public string $user;
    public int|float $solde = 0;
    public int|float $debt = 150;
    public string $gender;
    /**
     * j'effectue la fonction construct afin de recuperer mon utilisateur
     */
    function __construct(Gender $gender)
    {
        $this->user = !empty($_GET["user"]) ? $_GET["user"] : "Théo";
        $this->gender = $gender->value;
    }
    /**
     * @param int|float $number valeur a soutraire au solde
     */
    public function addToSolde(int|float $number): void
    {
        $this->solde += $number;
    }

    /**
     * @param int|float $number valeur a soutraire au solde
     */
    public function removeToSolde(int|float $number): void
    {
        // je recupere la valeur du solde dans une variable afin de la réutiliser plus tard
        $originSolde = $this->solde;
        $this->solde -= $number;
        // je regarde si le solde est inférieur 0 et si c'est le cas j'ajoute une dette qui a pour valeur le solde négatif diviser par deux
        if ($this->solde <= 0) {
            $this->debt += (($number - $originSolde) / 2);
        }
    }
    /**
     * je crée une fonction qui va prendre toutes mles valeur du tableau , les additionné puis les diviser par le nombre d'élement du tableau
     * @param array $array tableau de nombre permettant de trouver la moyenne
     */
    public function getAverage(array $array): int|float
    {
        return array_sum($array) / count($array);
    }

    public function payDebtRent(): void
    {
        if ($this->solde <= 0) $this->debt *= 1.2;
        else {
            $debt = $this->debt;
            $this->removeToSolde($this->debt);
            $this->debt -= $debt;
        }
    }
}
$bank = new Bank(Gender::Female);
foreach ($depot as $value) {
    $bank->addToSolde($value);
}
foreach ($withdraw as $value) {
    $bank->removeToSolde($value);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="petit page qui divers élément bancaire comme le solde du compte , la dette , la moyenne des dépots et des retraits" />
    <title>excercice 4</title>
</head>

<body>
    <h1>Bonjour <?= $bank->gender ?> <?= $bank->user ?></h1>
    <p>Il vous reste <strong><?= $bank->solde ?>€</strong> sur votre compte</p>
    <p>Votre moyenne de dépot est de <strong><?= $bank->getAverage($depot) ?>€</strong></p>
    <p>Votre moyenne de retrait est de <strong><?= $bank->getAverage($withdraw) ?>€</strong></p>
    <?php if ($bank->debt > 0) { ?>
        <p>Vous avez <strong><?= $bank->debt ?>€</strong> de dette</p>
    <?php } ?>

</body>

</html>