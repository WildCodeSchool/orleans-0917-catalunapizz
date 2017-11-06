<?php

namespace Cataluna\Model;

class AboutUsManager extends EntityManager
{

    public function findAll()
    {
        $req = "SELECT * FROM about_us";
        $statement = $this->pdo->query($req);

        return $statement->fetchAll(\PDO::FETCH_CLASS, AboutUs::class);
    }

    public function findFirst()
    {
        $req = "SELECT * FROM about_us
                  LIMIT 0,1";
        $statement = $this->pdo->query($req);
        $statement->setFetchMode(\PDO::FETCH_CLASS, AboutUs::class);

        return $statement->fetch();
    }

    /**
     *   met a jours les nouveauté
     */
    public function updateAboutUs(AboutUs $aboutUs)
    {
        $query = "UPDATE about_us   
                  SET about_us_title = :aboutUsTitle,
                      about_us = :aboutUs,
                      bloc_news_title = :blocNewsTitle,
                      news_title = :newsTitle,
                      news = :news,
                      news_picture = :newsPicture,
                      mail = :mail,
                      tel = :tel";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('aboutUsTitle', $aboutUs->getAboutUsTitle(), \PDO::PARAM_STR);
        $statement->bindValue('aboutUs', $aboutUs->getAboutUs(), \PDO::PARAM_STR);
        $statement->bindValue('newsTitle', $aboutUs->getNewsTitle(), \PDO::PARAM_STR);
        $statement->bindValue('blocNewsTitle', $aboutUs->getBlocNewsTitle(), \PDO::PARAM_STR);
        $statement->bindValue('newsPicture', $aboutUs->getNewsPicture(), \PDO::PARAM_STR);
        $statement->bindValue('news', $aboutUs->getNews(), \PDO::PARAM_STR);
        $statement->bindValue('mail', $aboutUs->getMail(), \PDO::PARAM_STR);
        $statement->bindValue('tel', $aboutUs->getTel(), \PDO::PARAM_STR);
        $statement->execute();
    }
}
