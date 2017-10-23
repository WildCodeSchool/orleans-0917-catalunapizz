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
    public function upDateNews(AboutUs $aboutUs)
    {
        $query = "UPDATE about_us  
                  (about_us, news_title, news, news_picture, mail, tel) 
                  SET (:aboutus, :newstitle, :news, :newspicture, :mail, :tel)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('about_us', $aboutUs->getAboutUs(), \PDO::PARAM_STR);
        $statement->bindValue('newstitle', $aboutUs->getNewsTitle(), \PDO::PARAM_STR);
        $statement->bindValue('newspicture', $aboutUs->getNewsPicture(), \PDO::PARAM_INT);
        $statement->bindValue('news', $aboutUs->getNews(), \PDO::PARAM_INT);
        $statement->bindValue('mail', $aboutUs->getMail(), \PDO::PARAM_INT);
        $statement->bindValue('tel', $aboutUs->getTel(), \PDO::PARAM_INT);
        $statement->execute();
    }
}
