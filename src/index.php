<?php
// this file is my entrypoint and is my router

// i start globally my session
session_start();

use \Autoload\Autoloader;

require_once('autoload/Autoload.php');

// i register my autoload
Autoloader::register();

use \controllers\{UserController, CourseController};
use \utils\{Database, Logger, Redirect, Role, Verification};



// i explode my url for mty router
$explodeURI = explode('/', $_SERVER["REQUEST_URI"]);

// i get the first part of my url like user or detail
$firstParts = $explodeURI[1];

$lastParts = '';

if (count($explodeURI) >= 3)
    // i get the last part of my url if she exists or an empty url
    $lastParts = !Verification::verifyIfNotExistAndIsEmpty($explodeURI[2]) ? $explodeURI[2] : '';
// i create a database instance
$pdo = (new Database())->getPDO();

// i get the ip that request me for the log
$ip = $_SERVER["REMOTE_ADDR"];

// i log the action
Logger::logAction($ip . 'request the server');

// i use the switch to make the router
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
                // i verify if my request got the id of the user else i die the script and move to the 404 page
                if (!array_key_exists(3, $explodeURI) || Verification::verifyIfNotExistAndIsEmpty($explodeURI[3])) {
                    Redirect::redirectAndDie('/404');
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
            case 'detail':
                // i verify if my request got the id of the user else i die the script and move to the 404 page
                if (!array_key_exists(3, $explodeURI) || Verification::verifyIfNotExistAndIsEmpty($explodeURI[3])) {
                    Redirect::redirectAndDie('/404');
                }
                $id = $explodeURI[3];
                $courseController->detail($pdo, $id);
                break;
            default:
                $courseController->all($pdo, 15);
        }
        break;
    case '':
        require_once('views/index.php');
        break;
    default:
        require_once('views/404.php');
}
