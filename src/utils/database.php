<?php

class Database
{
    protected $pdo = null;
    private $dbUser = "Rihyette";
    private $dbDatabase = "classroom";
    private $dbPassword = "password";
    private $dbHost = "database";


    public function __construct()
    {
        if (is_null($this->pdo)) {

            $this->pdo = new PDO("mysql:dbname=" . $this->dbDatabase . ";host=" . $this->dbHost . ";", $this->dbUser, $this->dbPassword);
        }
    }
}
