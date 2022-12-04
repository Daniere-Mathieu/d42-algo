<?php

namespace controllers;

use \models\User;
use \pdo;
use utils\{Logger, Verification, FormatData, Redirect};

class UserController
{
    private User $model;
    private string $ip;

    public function __construct(string $ip)
    {
        // i create an instance of Course to query the database
        $this->model = new User();
        $this->ip = $ip;
    }

    /**
     * this method allow one user to log  
     * @param PDO $pdo PDO object use to query the user from database
     */
    public function login(PDO $pdo): void
    {
        try {
            if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args()) || Verification::arrayKeysExistAndNotEmpty(["id"], $_POST)) {
                Redirect::redirectAndDie('/404');
            }
            if (!$this->model->logUser($pdo, $_POST['id'])) {
                Redirect::redirectAndDie('/');
            };

            $_SESSION["logged"] = true;
            Logger::logAction($this->ip . 'log the user');
            Redirect::redirectAndDie('/user');
        } catch (\Throwable $th) {
            Logger::logError('fail to log for ip :' . $this->ip);
            throw $th;
        }
    }

    /**
     * this method allow one user to register  
     * @param PDO $pdo PDO object use to query the user from database
     */
    public function register(PDO $pdo): void
    {
        try {

            // if (!array_key_exists('avatar', $_FILES)) {
            //     die();
            // }

            // $type = explode('/', $_FILES['avatar']["type"]);
            // if ($type[0] !== 'image') {
            //     die();
            // }
            // move_uploaded_file($_FILES['avatar'], $id);


            $expectedFields = array('firstname', 'lastname', 'address', 'phoneNumber', 'trigram');
            Verification::arrayKeysExistAndNotEmpty($expectedFields, $_POST);
            $_POST['profilePicture'] = '.jpg';
            $_POST['role'] = 'Teacher';
            if (!$this->model->insert($pdo, $_POST)) {
                Redirect::redirectAndDie('/404');
            };
            $_SESSION["logged"] = true;
            Logger::logAction($this->ip . 'register the user');
            Redirect::redirectAndDie('/user');
        } catch (\Throwable $th) {
            Logger::logError('fail to register for ip:' . $this->ip);
            throw $th;
        }
    }

    /**
     * this method return all the User and the ListUser page  
     * @param PDO $pdo PDO object use to query the user from database
     * @param int $limit the limit of user display 
     */
    public function all(PDO $pdo, int $limit): void
    {
        try {
            if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) {
                Redirect::redirectAndDie('/404');
            }
            $paginationCount = $this->model->getPagination($pdo, $limit);
            $page =  Verification::arrayKeysExistAndNotEmpty(['page'], $_GET) ? $_GET['page'] : 1;
            $startId = ($page * $limit) - ($limit - 1);
            $res = $this->model->getAll($pdo, $startId, $limit);
            $res = FormatData::formatForDisplayGrid($res);
            require_once('views/listUser.php');
            Logger::logAction($this->ip . 'display the listUser page ' . $page);
        } catch (\Throwable $th) {
            Logger::logError('fail to get and display listUser page for ip :' . $this->ip);
            throw $th;
        }
    }

    /**
     * this method return the User and the detailUser page  
     * @param PDO $pdo PDO object use to query the user from database
     * @param int $id the User id 
     */
    public function detail(PDO $pdo, int $id): void
    {
        try {
            if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) {
                Redirect::redirectAndDie('/404');
            }

            $res = $this->model->get($pdo, $id);
            require_once('views/detailUser.php');
            Logger::logAction($this->ip . 'display the detail page for id :' . $id);
        } catch (\Throwable $th) {
            Logger::logError('fail to get and display detailUser page for ip:' . $this->ip);
            throw $th;
        }
    }
}
