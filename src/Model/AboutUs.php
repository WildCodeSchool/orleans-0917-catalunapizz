<?php

namespace Cataluna\Model;

class AboutUs
{
    private $id;
    private $about_us;
    private $news_picture;
    private $news_title;
    private $news;
    private $mail;
    private $tel;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getAboutUs()
    {
        return $this->about_us;
    }


    public function setAboutUs($about_us)
    {
        $this->about_us = $about_us;

        return $this;
    }

    public function getNewsPicture()
    {
        return $this->news_picture;
    }


    public function setNewsPicture($news_picture)
    {
        $this->news_picture = $news_picture;

        return $this;
    }

    public function getNewsTitle()
    {
        return $this->news_title;
    }


    public function setNewsTitle($news_title)
    {
        $this->news_title = $news_title;

        return $this;
    }


    public function getNews()
    {
        return $this->news;
    }


    public function setNews($news)
    {
        $this->news = $news;

        return $this;
    }


    public function getMail()
    {
        return $this->mail;
    }

    
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
