<?php

namespace Cataluna\Model;

class Events
{
    private $id;
    private $location;
    private $date;
    private $description;
    private $event_picture;
    private $event_title;

    /**
     * @return mixed
     */
    public function getEventTitle()
    {
        return $this->event_title;
    }

    /**
     * @param mixed $event_title
     * @return Events
     */
    public function setEventTitle($event_title)
    {
        $this->event_title = $event_title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Events
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     * @return Events
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Events
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Events
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEventPicture()
    {
        return $this->event_picture;
    }

    /**
     * @param mixed $event_picture
     * @return Events
     */
    public function setEventPicture($event_picture)
    {
        $this->event_picture = $event_picture;
        return $this;
    }


}
