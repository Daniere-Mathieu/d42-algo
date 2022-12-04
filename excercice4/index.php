<?php
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
    public int|float $balance = 0;
    public int|float $debt = 150;
    public string $gender;
    /**
     * I perform the construct function to retrieve my user
     */
    function __construct(Gender $gender)
    {
        $this->user = !empty($_GET["user"]) ? $_GET["user"] : "Théo";
        $this->gender = $gender->value;
    }
    /**
     * @param int|float $number value to subtract from the balance
     */
    public function addTobalance(int|float $number): void
    {
        $this->balance += $number;
    }

    /**
     * @param int|float $number value to subtract from the balance
     */
    public function removeTobalance(int|float $number): void
    {
        // I retrieve the value of the balance in a variable in order to reuse it later
        $originbalance = $this->balance;
        $this->balance -= $number;
        // I check if the balance is less than 0 and if so I add a debt whose value is the negative balance divided by two
        if ($this->balance <= 0) {
            $this->debt += (($number - $originbalance) / 2);
        }
    }
    /**
     * I create a function that will take all the values ​​of the array, add them and then divide them by the number of elements in the array
     * @param array $array table of numbers to find the mean
     */
    public function getAverage(array $array): int|float
    {
        return array_sum($array) / count($array);
    }

    public function payDebtRent(): void
    {
        if ($this->balance <= 0) $this->debt *= 1.2;
        else {
            $debt = $this->debt;
            $this->removeTobalance($this->debt);
            $this->debt -= $debt;
        }
    }
}
$bank = new Bank(Gender::Female);
foreach ($depot as $value) {
    $bank->addTobalance($value);
}
foreach ($withdraw as $value) {
    $bank->removeTobalance($value);
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
    <p>Il vous reste <strong><?= $bank->balance ?>€</strong> sur votre compte</p>
    <p>Votre moyenne de dépot est de <strong><?= $bank->getAverage($depot) ?>€</strong></p>
    <p>Votre moyenne de retrait est de <strong><?= $bank->getAverage($withdraw) ?>€</strong></p>
    <?php if ($bank->debt > 0) { ?>
        <p>Vous avez <strong><?= $bank->debt ?>€</strong> de dette</p>
    <?php } ?>

</body>

</html>