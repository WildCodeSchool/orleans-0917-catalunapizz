<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 02/11/17
 * Time: 09:45
 */

namespace Cataluna\Model;


class Drink
{
    private $id;
    private $title;
    private $price_1;
    private $price_2;
    private $picture;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Drink
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Drink
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice1()
    {
        return $this->price_1;
    }

    /**
     * @param mixed $price_1
     * @return Drink
     */
    public function setPrice1($price_1)
    {
        $this->price_1 = $price_1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice2()
    {
        return $this->price_2;
    }

    /**
     * @param mixed $price_2
     * @return Drink
     */
    public function setPrice2($price_2)
    {
        $this->price_2 = $price_2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     * @return Drink
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }


}