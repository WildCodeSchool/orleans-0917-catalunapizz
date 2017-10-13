<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 13/10/17
 * Time: 10:11
 */

namespace Cataluna\Model;


class EntityManager
{

    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USERNAME, PASSWORD, [
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        ]);

    }
}