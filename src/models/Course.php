<?php

namespace models;

use \utils\{Verification, Crud};
use \PDO;


class Course extends Crud
{
    public int $id;
    public int $userId;
    public string $code;
    public string $courseName;
    public string $profilePicture;
    public string $description;


    /**
     * this method return the value store in database of a specific course and the data about the user who own the course
     * @param PDO $pdo PDO object use to query the course from database
     * @param int $id the id of the course i want to get 
     * @return array|false the Course and user information
     */
    public function getJoin(PDO $pdo, int $id): array|false
    {
        if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) return false;
        $field = 'courseName,code,description,firstname,lastname,phoneNumber,address,trigram,course.profilePicture';
        $query = $pdo->prepare('SELECT ' . $field . '  FROM course INNER JOIN user ON course.userId = user.id WHERE course.id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }
}
