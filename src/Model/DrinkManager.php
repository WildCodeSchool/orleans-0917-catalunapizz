<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 02/11/17
 * Time: 09:45
 */

namespace Cataluna\Model;


class DrinkManager extends EntityManager
{
    public function findAll()
    {
        $req = "SELECT * FROM drink";
        $statement = $this->pdo->query($req);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \Cataluna\Model\Drink::class);
    }


    /**
     *   @return $drinks
     */
    public function find(int $id)
    {
        $query = "SELECT * FROM drink WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $drinks = $statement->fetchAll(\PDO::FETCH_CLASS, \Cataluna\Model\Drink::class);
        return $drinks[0];
    }

    /**
     *   ajoute une boisson
     */
    public function insert(Drink $drink)
    {
        $query = "INSERT INTO drink 
                  (title, price_1, price_2, picture) 
                  VALUES (:title, :price_1, :price_2, :picture)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $drink->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('price_1', $drink->getPrice1(), \PDO::PARAM_INT);
        $statement->bindValue('price_2', $drink->getPrice2(), \PDO::PARAM_INT);
        $statement->bindValue('picture', $drink->getPicture(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM drink 
                  WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function update(Drink $drink)
    {
        $query = "UPDATE drink SET title=:title, price_1=:price_1, price_2=:price_2, picture=:picture 
                  WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $drink->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('price_1', $drink->getPrice1(), \PDO::PARAM_INT);
        $statement->bindValue('price_2', $drink->getPrice2(), \PDO::PARAM_INT);
        $statement->bindValue('picture', $drink->getPicture(), \PDO::PARAM_INT);
        $statement->bindValue('id', $drink->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }
}