<?php

namespace Cataluna\Model;


class Pizza
{
    private $id;
    private $title;
    private $ingredients;
    private $price_1;
    private $price_2;
    private $category_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return AboutUs
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
     * @return AboutUs
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     * @return AboutUs
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
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
     * @return AboutUs
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
     * @return AboutUs
     */
    public function setPrice2($price_2)
    {
        $this->price_2 = $price_2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     * @return AboutUs
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }




}
