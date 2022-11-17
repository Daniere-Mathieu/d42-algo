<?php

use \utils\Verification;

require_once('utils/verification.php');

$explodeURI = explode('/', $_SERVER["REQUEST_URI"]);

$firstParts = $explodeURI[1];

$lastParts = !Verification::verifyIfExistAndIsNotEmpty($explodeURI[2]) ? $explodeURI[2] : '';

switch ($firstParts) {
    case 'user':
        switch ($lastParts) {
            case 'register':
                break;
            case 'login':
                break;
            case 'details':
                break;
            default:
        }
        break;
    case 'course':
        break;

    default:
        require_once('./view/index.php');
}
