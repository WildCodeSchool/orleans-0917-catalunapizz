<?php

namespace Cataluna\Model;


class PizzaManager extends EntityManager
{
    /**
    *   @return $statement
    */
    public function findAll()
    {
        $req = "SELECT * FROM pizza";
        $statement = $this->pdo->query($req);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \Cataluna\Model\Pizza::class);
    }


    /**
    *   @return $pizzas
    */
    public function find(int $id)
    {
        $query = "SELECT * FROM pizza WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $pizzas = $statement->fetchAll(\PDO::FETCH_CLASS, \Cataluna\Model\Pizza::class);
        return $pizzas[0];
    }

    /**
    *   ajoute une pizza
    */
    public function insert(Pizza $pizza)
    {
        $query = "INSERT INTO pizza 
                  (title, ingredients, price_1, price_2, category_id) 
                  VALUES (:title, :ingredients, :price_1, :price_2, :category)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $pizza->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('ingredients', $pizza->getIngredients(), \PDO::PARAM_STR);
        $statement->bindValue('price_1', $pizza->getPrice1(), \PDO::PARAM_INT);
        $statement->bindValue('price_2', $pizza->getPrice2(), \PDO::PARAM_INT);
        $statement->bindValue('category', $pizza->getCategoryId(), \PDO::PARAM_INT);
        $statement->execute();
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM pizza 
                  WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function update(int $id)
    {
        $query = "UPDATE pizza SET title = :title, 
            ingredients = :ingredients, 
            price_1 = :price_1,  
            price_2 = :price_2,  
            category = :category,  
            WHERE id = :id";
            $statement = $pdo->prepare($query);                                  
            $statement->bindParam(':title', $_POST['title'], PDO::PARAM_STR);       
            $statement->bindParam(':ingredients', $_POST['$ingredients'], PDO::PARAM_STR);    
            $statement->bindParam(':price_1', $_POST['price_1'], PDO::PARAM_INT);  
            $statement->bindParam(':price_2', $_POST['price_2'], PDO::PARAM_INT); 
            $statement->bindParam(':category', $_POST['category'], PDO::PARAM_INT);   
            $statement->execute(); 
    }
}
