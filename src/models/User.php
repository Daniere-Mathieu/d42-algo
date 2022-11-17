<?php

namespace models;

use \utils\Verification;
use \PDO;

class User
{
    public int $id;
    public string $firstname;
    public string $lastname;
    public string $profilePicture;
    public string $address;
    public string $phoneNumber;
    public string $trigram;

    public function getUserFromDatabase(PDO $pdo, int $id): User
    {
        if (Verification::verifyIfExistAndIsNotEmpty($id) || Verification::verifyIfExistAndIsNotEmpty($pdo)) return false;
        $query = $pdo->prepare('SELECT * FROM user WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        $res = $query->fetchObject('User');
        return $res;
    }

    public function getUsersFromDatabase(PDO $pdo, int $startID, int $limit = 15): array
    {
        if (Verification::verifyIfExistAndIsNotEmpty($startID) || Verification::verifyIfExistAndIsNotEmpty($limit) || Verification::verifyIfExistAndIsNotEmpty($pdo)) return false;
        $query = $pdo->prepare('SELECT * FROM user WHERE id >= :startId LIMIT :limitValue;');
        $query->bindParam(':startId', $startID);
        $query->bindParam(':limitValue', $limit, PDO::PARAM_INT);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        return $res;
    }
    public function logUser(PDO $pdo, int $id)
    {
        $query = $pdo->prepare('SELECT * FROM user WHERE id >= :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return !$query->fetch() ? false : true;
    }
}
