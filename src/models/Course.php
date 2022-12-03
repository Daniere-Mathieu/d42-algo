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


    public function getJoin(PDO $pdo, int $id)
    {
        if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) return false;
        $field = 'courseName,code,description,firstname,lastname,phoneNumber,address,trigram,course.profilePicture';
        $query = $pdo->prepare('SELECT ' . $field . '  FROM course INNER JOIN user ON course.userId = user.id WHERE course.id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public function insertCourse(PDO $pdo, array $value): bool
    {
        if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) return false;
        $sqlRequest = 'INSERT INTO course (``, ``, ``,``,``,``) VALUES (:, :, :,:,:,:)';
        $query = $pdo->prepare($sqlRequest);
        $query->execute($value);
        return !$query->fetch() ? false : true;
    }
}
