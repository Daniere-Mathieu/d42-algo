<?php

namespace models;

use \utils\{Verification, Crud, Roles};
use \PDO;


class User extends Crud
{
    public int $id;
    public string $firstname;
    public string $lastname;
    public string $profilePicture;
    public string $address;
    public string $phoneNumber;
    public string $trigram;
    public Roles|string $role;


    /**
     * this method allow to log for an user
     * @param PDO $pdo PDO object use to query the user from database
     * @param int $id the id of the user i need to find
     * @return bool return true if the user is log or false if param or users are missing
     */
    public function logUser(PDO $pdo, int $id): bool
    {
        if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) return false;
        $query = $pdo->prepare('SELECT * FROM user WHERE id >= :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return !$query->fetch() ? false : true;
    }
    /**
     * this method is use to insert in database on user
     * @param PDO $pdo PDO object use to insert the user in database
     * @param array $value array of value i need in my database [firstname, lastname, profilePicture,address,phoneNumber,trigram]
     * @return bool return true if the user has been register or false if param or users are missing
     */
    public function insert(PDO $pdo, array $value): bool
    {
        if (!Verification::verifyIfAllExistAndNotIsEmpty(func_get_args())) return false;
        $sqlRequest = 'INSERT INTO user (`firstname`, `lastname`, `profilePicture`,`address`,`phoneNumber`,`trigram`,`role`) VALUES (:firstname, :lastname, :profilePicture,:address,:phoneNumber,:trigram,:role)';
        $query = $pdo->prepare($sqlRequest);

        return $query->execute($value);
    }
}
