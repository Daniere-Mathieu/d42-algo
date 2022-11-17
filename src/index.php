<?php
require_once('./utils/database.php');
require_once("./model/UserModel.php");
$pdo = (new Database())->getPDO();
$user = (new User())->getUserFromDatabase($pdo, 1);
var_dump((new User())->getUsersFromDatabase($pdo, 1, 5));

var_dump($user->firstname)
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form action="./controller/" method="post">
        <h2>Register</h2>
        <input type="text">
        <button type="submit">Envoyez</button>
    </form>
    <form action="./controller/" method="post">
        <h2>Login</h2>
        <input type="text" name="firstname">
        <button type="submit">Envoyez</button>
    </form>

</body>

</html>