<?php
session_start();

use \Autoload\Autoloader;

require_once('autoload/Autoload.php');

Autoloader::register();

use \utils\Verification;
use \controllers\UserController;
use \utils\Database;
use \utils\Logger;



$explodeURI = explode('/', $_SERVER["REQUEST_URI"]);

$firstParts = $explodeURI[1];

$lastParts = '';

if (count($explodeURI) >= 3)
    $lastParts = !Verification::verifyIfNotExistAndIsEmpty($explodeURI[2]) ? $explodeURI[2] : '';

$pdo = (new Database())->getPDO();

$ip = $_SERVER["REMOTE_ADDR"];

Logger::logAction($ip . 'request the server');

switch ($firstParts) {
    case 'user':
        $userController = new UserController($ip);
        switch ($lastParts) {
            case 'register':
                $userController->register($pdo);
                break;
            case 'login':
                $userController->login($pdo);
                break;
            case 'detail':
                if (!array_key_exists(3, $explodeURI) || Verification::verifyIfNotExistAndIsEmpty($explodeURI[3])) {
                    die();
                }
                $id = $explodeURI[3];
                $userController->detail($pdo, $id);
                break;
            default:
                $userController->all($pdo, 15);
        }
        break;
    case 'course':
        break;

    case '404':
        break;
    case '':
        break;
    default:
        // if (!$_SESSION["logged"])
        //require_once('views/index.php');
        //header('Location: /user/');
}
