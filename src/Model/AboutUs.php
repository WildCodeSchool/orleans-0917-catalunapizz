<?php

namespace Cataluna\Model;

class AboutUs
{
    private $id;
    private $about_us_title;
    private $about_us;
    private $news_picture;
    private $bloc_news_title;
    private $news_title;
    private $news;
    private $mail;
    private $tel;
    private $img1_carrousel;
    private $img2_carrousel;
    private $img3_carrousel;

    /**
     * @return mixed
     */
    public function getImg1Carrousel()
    {
        return $this->img1_carrousel;
    }

    /**
     * @param mixed $img1_carrousel
     * @return AboutUs
     */
    public function setImg1Carrousel($img1_carrousel)
    {
        $this->img1_carrousel = $img1_carrousel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImg2Carrousel()
    {
        return $this->img2_carrousel;
    }

    /**
     * @param mixed $img2_carrousel
     * @return AboutUs
     */
    public function setImg2Carrousel($img2_carrousel)
    {
        $this->img2_carrousel = $img2_carrousel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImg3Carrousel()
    {
        return $this->img3_carrousel;
    }

    /**
     * @param mixed $img3_carrousel
     * @return AboutUs
     */
    public function setImg3Carrousel($img3_carrousel)
    {
        $this->img3_carrousel = $img3_carrousel;
        return $this;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getAboutUsTitle()
    {
        return $this->about_us_title;
    }

    public function setAboutUsTitle($about_us_title)
    {
        $this->about_us_title = $about_us_title;

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

    public function getBlocNewsTitle()
    {
        return $this->bloc_news_title;
    }

    public function setBlocNewsTitle($bloc_news_title)
    {
        $this->bloc_news_title = $bloc_news_title;

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
