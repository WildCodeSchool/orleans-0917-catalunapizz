<?php

namespace Cataluna\Model;

class EventsManager extends EntityManager
{

    /**
     * @return array
     */
    public function findAll()
    {
        $req = "SELECT * FROM events";
        $statement = $this->pdo->query($req);

        return $statement->fetchAll(\PDO::FETCH_CLASS, Events::class);
    }

    /**
     *   @return $pizzas
     */
    public function find(int $id)
    {
        $query = "SELECT * FROM events WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $events = $statement->fetchAll(\PDO::FETCH_CLASS, \Cataluna\Model\Events::class);
        return $events[0];
    }

    /**
     *   ajoute une pizza
     */
    public function insert(Events $event)
    {
        $query = "INSERT INTO events 
                  (event_title, date, description, event_picture) 
                  VALUES (:eventTitle, :date, :description, :eventPicture)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('eventTitle', $event->getEventTitle(), \PDO::PARAM_STR);
        $statement->bindValue('date', $event->getDate(), \PDO::PARAM_STR);
        $statement->bindValue('description', $event->getDescription(), \PDO::PARAM_STR);
        $statement->bindValue('eventPicture', $event->getEventPicture(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM events 
                  WHERE id =:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function update(Events $event)
    {
        $query = "UPDATE events SET event_title=:eventTitle, date=:date, description=:description, event_picture=:eventPicture
                  WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('eventTitle', $event->getEventTitle(), \PDO::PARAM_STR);
        $statement->bindValue('date', $event->getDate(), \PDO::PARAM_STR);
        $statement->bindValue('description', $event->getDescription(), \PDO::PARAM_STR);
        $statement->bindValue('eventPicture', $event->getEventPicture(), \PDO::PARAM_STR);
        $statement->bindValue('id', $event->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }

}
