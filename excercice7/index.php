<?php
enum Role: string
{
    case Admin = "Vous etes l'administrateur du site";
    case Membre = "vous êtes membre du site";
    case Gestionnaire = "vous êtes gestionnaire du site";
    case Autre = "Bienvenue invité";
}

class User
{
    public string $name;
    public int $age;
    private Role $role;

    public function  __construct(string $name, int $age, Role $role)
    {
        $this->name = $name;
        $this->age = $age;
        $this->role = $role;
    }

    public function getRoleValue()
    {
        return $this->role->value;
    }
}

class UserFactory
{
    public static function getUser(string $name, int $age, Role $role)
    {
        if ($age < 18) return false;
        return new User($name, $age, $role);
    }
}

$junior = UserFactory::getUser('test', 18, Role::Admin)

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

</body>

</html>