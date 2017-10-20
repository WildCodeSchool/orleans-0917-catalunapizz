<?php

namespace Cataluna\Model;

class Location
{
    private $id;
    private $day;
    private $location_AM;
    private $hour_AM;
    private $location_PM;
    private $hour_PM;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getDay()
    {
        return $this->day;
    }


    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }


    public function getLocation_AM()
    {
        return $this->location_AM;
    }


    public function setLocation_AM($location_AM)
    {
        $this->location_AM = $location_AM;

        return $this;
    }


    public function getHour_AM()
    {
        return $this->hour_AM;
    }

    public function setHour_AM($hour_AM)
    {
        $this->hour_AM = $hour_AM;

        return $this;
    }

    public function getLocation_PM()
    {
        return $this->location_PM;
    }


    public function setLocation_PM($location_PM)
    {
        $this->location_PM = $location_PM;

        return $this;
    }


    public function getHour_PM()
    {
        return $this->hour_PM;
    }

    public function setHour_PM($hour_PM)
    {
        $this->hour_PM = $hour_PM;

        return $this;
    }
}
