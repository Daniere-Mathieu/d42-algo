<?php

namespace controllers;

use \models\User;
use \pdo;
use utils\Verification;

class UserController
{
    private User $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function login(PDO $pdo): void
    {
        if (!$this->model->logUser($pdo, 1)) {
            header('Location: /');
            die();
        };
        $_SESSION["logged"] = true;
        header('location : /user');
    }

    public function register(PDO $pdo): void
    {
        $expectedFields = array('firstname', 'lastname', 'address', 'phoneNumber', 'trigram');

        Verification::arrayKeysExist($expectedFields, $_POST);

        // if (!$this->model->registerUser($pdo, [])) {
        // header('Location: /');
        // die();
        // };
        $_SESSION["logged"] = true;
        //$_SESSION["register"] = true;
        // header('location : /user');
    }

    public function all(PDO $pdo): void
    {
        // if($_SESSION["register"]){
        // 
        // }
        // faut que je count le nombre d'élement total que j'ai et peut etre le mettre en variable global pour eviter de refresh trop souvent

        $page =  array_key_exists('page', $_GET) || !Verification::verifyIfExistAndIsNotEmpty($_GET['page']) ? $_GET['page'] : 1;
        $res = $this->model->getUsersFromDatabase($pdo, 1);
        require_once('views/listUser.php');
    }

    public function details(): void
    {
    }
}
