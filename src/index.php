<?php
session_start();

use \Autoload\Autoloader;

require_once('autoload/Autoload.php');

use \utils\Verification;
use \controllers\UserController;
use utils\Database;


Autoloader::register();

$explodeURI = explode('/', $_SERVER["REQUEST_URI"]);

$firstParts = $explodeURI[1];

$lastParts = '';

if (count($explodeURI) >= 3)
    $lastParts = !Verification::verifyIfExistAndIsNotEmpty($explodeURI[2]) ? $explodeURI[2] : '';
$pdo = (new Database())->getPDO();


switch ($firstParts) {
    case 'user':
        $userController = new UserController();
        switch ($lastParts) {
            case 'register':
                $userController->register($pdo);
                break;
            case 'login':
                $userController->login($pdo);
                break;
            case 'details':
                break;
            default:
                $userController->all($pdo);
        }
        break;
    case 'course':
        break;

    default:
        // if (!$_SESSION["logged"])
        require_once('views/index.php');
        //header('Location: /user/');
}
