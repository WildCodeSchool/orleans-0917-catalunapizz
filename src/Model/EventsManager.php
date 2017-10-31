<?php

namespace Cataluna\Model;

class EventsManager extends EntityManager
{

    public function findAll()
    {
        $req = "SELECT * FROM events";
        $statement = $this->pdo->query($req);

        return $statement->fetchAll(\PDO::FETCH_CLASS, Events::class);
    }

}
