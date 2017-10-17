<?php

namespace Cataluna\Model;

class AboutUsManager extends EntityManager
{

    public function findAll()
    {
        $req = "SELECT * FROM about_us";
        $statement = $this->pdo->query($req);

        return $statement->fetchAll(\PDO::FETCH_CLASS, AboutUs::class);
    }
}
