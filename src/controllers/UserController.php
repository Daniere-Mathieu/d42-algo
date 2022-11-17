<?php

namespace controllers;

use \models\User;
use \pdo;


class UserController
{
    private User $model;
    public function __construct()
    {
        $this->model = new User();
    }
    public function login(PDO $pdo)
    {
        if (!$this->model->logUser($pdo, 1)) {
            header('Location: /');
            die();
        };
        $_SESSION["logged"] = true;
        require_once('views/listUser.php');
    }
    public function register()
    {
    }
    public function all()
    {
    }
    public function details()
    {
    }
}
