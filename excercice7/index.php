<?php
enum Role: string
{
    case Admin = "Vous etes l'administrateur du site";
    case Membre = "vous êtes membre du site";
    case Gestionnaire = "vous êtes gestionnaire du site";
}

class User
{
    public string $name;
    public int $age;
    private Role|bool $role;

    public function  __construct(string $name, int $age, Role|bool $role)
    {
        $this->name = $name;
        $this->age = $age;
        $this->role = $role;
    }

    public function getRoleValue()
    {
        if (!$this->role) return "Bienvenue invité";
        return $this->role->value;
    }
}

class UserFactory
{
    public static function getUser(string $name, int $age, Role|bool $role = false)
    {
        if ($age < 18) return false;
        return new User($name, $age, $role);
    }
}

$junior = UserFactory::getUser('test', 18);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

    <h1><?= $junior->getRoleValue() ?> </h1>
</body>

</html>