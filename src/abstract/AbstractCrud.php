<?php

namespace abstract;

use \pdo;

abstract class AbstractCrud
{
    abstract public function get(PDO $pdo, int $id);

    abstract public function getAll(PDO $pdo, int $startID, int $limit = 15);

    abstract public function insert(PDO $pdo, array $value);

    abstract public function delete(PDO $pdo, int $id);
};
