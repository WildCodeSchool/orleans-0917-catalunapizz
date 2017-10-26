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


    public function getLocationAM()
    {
        return $this->location_AM;
    }


    public function setLocationAM($location_AM)
    {
        $this->location_AM = $location_AM;

        return $this;
    }


    public function getHourAM()
    {
        return $this->hour_AM;
    }

    public function setHourAM($hour_AM)
    {
        $this->hour_AM = $hour_AM;

        return $this;
    }

    public function getLocationPM()
    {
      return $this->location_PM;
    }


    public function setLocationPM($location_PM)
    {
        $this->location_PM = $location_PM;

        return $this;
    }


    public function getHourPM()
    {
        return $this->hour_PM;
    }

    public function setHourPM($hour_PM)
    {
        $this->hour_PM = $hour_PM;

        return $this;
    }
}
