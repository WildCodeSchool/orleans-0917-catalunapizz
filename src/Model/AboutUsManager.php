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

    /**
     *   met a jours les nouveauté
     */
    public function updateAboutUs(AboutUs $aboutUs)
    {
        $query = "UPDATE about_us   
                  SET about_us = :aboutus,
                      news_title = :newstitle,
                      news = :news,
                      news_picture = :newspicture,
                      mail = :mail,
                      tel = :tel";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('aboutus', $aboutUs->getAboutUs(), \PDO::PARAM_STR);
        $statement->bindValue('newstitle', $aboutUs->getNewsTitle(), \PDO::PARAM_STR);
        $statement->bindValue('newspicture', $aboutUs->getNewsPicture(), \PDO::PARAM_STR);
        $statement->bindValue('news', $aboutUs->getNews(), \PDO::PARAM_STR);
        $statement->bindValue('mail', $aboutUs->getMail(), \PDO::PARAM_STR);
        $statement->bindValue('tel', $aboutUs->getTel(), \PDO::PARAM_STR);
        $statement->execute();
    }
}
