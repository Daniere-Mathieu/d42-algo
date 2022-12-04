<?php

namespace controllers;

use \models\Course;
use \pdo;
use utils\{Logger, Verification, FormatData, Redirect};

class CourseController
{
    private Course $model;
    private string $ip;

    public function __construct(string $ip)
    {
        // i create an instance of Course to query the database
        $this->model = new Course();
        $this->ip = $ip;
    }

    /**
     * this method return all the Course and the listCourse page  
     * @param PDO $pdo PDO object use to query the course from database
     * @param int $limit the limit of course display 
     */
    public function all(PDO $pdo, int $limit): void
    {
        try {
            // i verify if all the function parameter doesn't exist  
            if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) {
                Redirect::redirectAndDie('/404');
            }
            $paginationCount = $this->model->getPagination($pdo, $limit);
            // i get the number of the page if she exist else i give the value of 1
            $page =  Verification::arrayKeysExistAndNotEmpty(['page'], $_GET) ? $_GET['page'] : 1;
            // i compute the value of the first id of the page 
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

    /**
     * this method return the Course and the detailsCourse page  
     * @param PDO $pdo PDO object use to query the course from database
     * @param int $id the id of the course display 
     */
    public function detail(PDO $pdo, int $id): void
    {
        try {
            if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) {
                Redirect::redirectAndDie('/404');
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
