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

    public function updateLocation(Location $location)
    {
        $query = "UPDATE planning
                  SET day = :day,
                      location_am = :locationAM,
                      hour_am = :hourAM,
                      location_pm = :locationPM,
                      hour_pm = :hourPM
                WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $location->getId(), \PDO::PARAM_INT);
        $statement->bindValue('day', $location->getDay(), \PDO::PARAM_STR);
        $statement->bindValue('locationAM', $location->getLocationAM(), \PDO::PARAM_STR);
        $statement->bindValue('hourAM', $location->getHourAM(), \PDO::PARAM_STR);
        $statement->bindValue('locationPM', $location->getLocationPM(), \PDO::PARAM_STR);
        $statement->bindValue('hourPM', $location->getHourPM(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function find(int $id)
    {
        $query = "SELECT * FROM planning WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $locations = $statement->fetchAll(\PDO::FETCH_CLASS, \Cataluna\Model\Location::class);
        return $locations[0];
    }
}
