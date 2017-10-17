<?php

namespace Cataluna\Model;

class AboutUs
{
    private $id;
    private $aboutUs;
    private $news;
    private $mail;
    private $tel;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Pizza
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAboutUs()
    {
        return $this->aboutUs;
    }

    /**
     * @param mixed $title
     * @return Pizza
     */
    public function setAboutUs($aboutUs)
    {
        $this->aboutUs = $aboutUs;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @param mixed $ingredients
     * @return Pizza
     */
    public function setNews($news)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $price
     * @return Pizza
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel()
    {
      return $this->tel;
    }

    public function setTel($tel)
    {
    $this->tel = $tel;

    return $this;
    }

}
