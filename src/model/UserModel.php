<?php
class User
{
    public int $id;
    public string $firstname;
    public string $lastname;
    public string $profilePicture;
    public string $address;
    public string $phoneNumber;
    public string $trigram;

    public function getUserFromDatabase($id, PDO $pdo): User
    {
        $verif = new Verification();
        if ($verif->verifyIfExistAndIsNotEmpty($id) || $verif->verifyIfExistAndIsNotEmpty($pdo)) return false;
        $query = $pdo->prepare('SELECT * FROM user WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute($id);
        $res = $query->fetchObject('User');
        // $users = $pdo->query('SELECT name FROM users')->fetchAll(PDO::FETCH_CLASS, 'User');
        return $res;
    }
}
