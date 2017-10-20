<?php

namespace Cataluna\Model;

class LocationManager extends EntityManager
{

    public function findAll()
    {
        $req = "SELECT * FROM planning";
        $statement = $this->pdo->query($req);

        return $statement->fetchAll(\PDO::FETCH_CLASS, Location::class);
    }
}
