<?php

namespace Cataluna\Model;


class PizzaManager extends EntityManager
{

    public function findAll()
    {
        $req = "SELECT * FROM pizza";
        $statement = $this->pdo->query($req);

        return $statement->fetchAll(\PDO::FETCH_CLASS, Pizza::class);
    }
}
