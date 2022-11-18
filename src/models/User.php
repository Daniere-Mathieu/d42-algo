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
        $res = $query->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . '\\User');
        return $res;
    }
    public function logUser(PDO $pdo, int $id): bool
    {
        $query = $pdo->prepare('SELECT * FROM user WHERE id >= :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return !$query->fetch() ? false : true;
    }
    public function registerUser(PDO $pdo, array $value): bool
    {
        $sqlRequest = 'INSERT INTO user (`firstname`, `lastname`, `profilePicture`,`address`,`phoneNumber`,`trigram`) VALUES (:firstname, :lastname, :profilePicture,:address,:phoneNumber,:trigram)';
        $query = $pdo->prepare($sqlRequest);
        $query->execute($value);
        return !$query->fetch() ? false : true;
    }

    private function countUser(PDO $pdo): int
    {
        $query = $pdo->prepare('SELECT COUNT(*) FROM user');
        $query->execute();
        return $query->fetch();
    }

    /**
     * this function is use to get the total of page avaiable
     * @param PDO $pdo PDO object use to query the count
     * @param int $limit limit of element display per page
     * @return int number of page
     */
    public function getPagination(PDO $pdo, int $limit): int|float
    {
        $count = $this->countUser($pdo);
        return ceil($count / $limit);
    }
}
