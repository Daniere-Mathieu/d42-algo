<?php
//require_once('../utils/verification.php');
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
        // $verif = new Verification();
        //if ($verif->verifyIfExistAndIsNotEmpty($id) || $verif->verifyIfExistAndIsNotEmpty($pdo)) return false;
        $query = $pdo->prepare('SELECT * FROM user WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        $res = $query->fetchObject('User');
        // $users = $pdo->query('SELECT name FROM users')->fetchAll(PDO::FETCH_CLASS, 'User');
        return $res;
    }

    public function getUsersFromDatabase(PDO $pdo, int $startID, int $limit = 15): array
    {
        // $verif = new Verification();
        //if ($verif->verifyIfExistAndIsNotEmpty($id) || $verif->verifyIfExistAndIsNotEmpty($pdo)) return false;
        $query = $pdo->prepare('SELECT * FROM user WHERE id >= :startId LIMIT :limitValue;');
        $query->bindParam(':startId', $startID);
        $query->bindParam(':limitValue', $limit, PDO::PARAM_INT);
        $query->execute();
        //$res = $query->fetchObject('User');
        $res = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        return $res;
    }
}
