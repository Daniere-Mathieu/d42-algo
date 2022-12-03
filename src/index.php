<?php
session_start();

use \Autoload\Autoloader;

require_once('autoload/Autoload.php');

Autoloader::register();

use \controllers\{UserController, CourseController};
use \utils\{Database, Logger, Role, Verification};



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
                    header('Location: /404');

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
        $courseController = new CourseController($ip);
        switch ($lastParts) {
            case 'register':
                $courseController->register($pdo);
                break;
            case 'detail':
                if (!array_key_exists(3, $explodeURI) || Verification::verifyIfNotExistAndIsEmpty($explodeURI[3])) {
                    header('Location: /404');
                    die();
                }
                $id = $explodeURI[3];
                $courseController->detail($pdo, $id);
                break;
            default:
                $courseController->all($pdo, 15);
        }
        break;

    case '404':
        require_once('views/404.php');
        break;
    case '':
        require_once('views/index.php');
        break;
    default:
        require_once('views/404.php');
}
