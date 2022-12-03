<?php

namespace controllers;

use \models\Course;
use \pdo;
use utils\{Logger, Verification, FormatData};

class CourseController
{
    private Course $model;
    private string $ip;

    public function __construct(string $ip)
    {
        $this->model = new Course();
        $this->ip = $ip;
    }

    public function login(PDO $pdo): void
    {
        try {
            if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) {
                header('Location: /404');
                die();
            }
            if (!$this->model->logUser($pdo, 1)) {
                header('Location: /');
                die();
            };
            echo 'pass';

            $_SESSION["logged"] = true;
            Logger::logAction($this->ip . 'log the user');
            header('Location : /user');
        } catch (\Throwable $th) {
            Logger::logError('fail to log for ip :' . $this->ip);
            throw $th;
        }
    }

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
            if (!$this->model->insert($pdo, $_POST)) {
                header('Location: /');
                die();
            };
            $_SESSION["logged"] = true;
            $_SESSION["register"] = true;
            Logger::logAction($this->ip . 'register the user');
            header('Location : /user');
            die();
        } catch (\Throwable $th) {
            Logger::logError('fail to register for ip:' . $this->ip);
            throw $th;
        }
    }

    public function all(PDO $pdo, int $limit): void
    {
        try {
            if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) {
                header('Location: /404');
                die();
            }
            // if($_SESSION["register"]){
            // 
            // }
            // faut que je count le nombre d'élement total que j'ai et peut etre le mettre en variable global pour eviter de refresh trop souvent
            $paginationCount = $this->model->getPagination($pdo, $limit);
            $page =  Verification::arrayKeysExistAndNotEmpty(['page'], $_GET) ? $_GET['page'] : 1;
            $startId = ($page * $limit) - ($limit - 1);
            $res = $this->model->getAll($pdo, $startId, $limit);
            $res = FormatData::formatForDisplayGrid($res);

            require_once('views/listCourse.php');
            Logger::logAction($this->ip . 'display the listUser page ' . $page);
        } catch (\Throwable $th) {
            Logger::logError('fail to get and display listUser page for ip :' . $this->ip);
            throw $th;
        }
    }

    public function detail(PDO $pdo, int $id): void
    {
        try {
            if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) {
                header('Location: /404');
                die();
            }

            $res = $this->model->getJoin($pdo, $id);
            require_once('views/detailCourse.php');
            Logger::logAction($this->ip . 'display the detail page for id :' . $id);
        } catch (\Throwable $th) {
            Logger::logError('fail to get and display detailUser page for ip:' . $this->ip);
            throw $th;
        }
    }
}
