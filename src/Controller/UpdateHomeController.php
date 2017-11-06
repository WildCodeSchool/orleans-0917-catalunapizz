<?php

namespace Cataluna\Controller;

use Cataluna\Model\AboutUs;
use Cataluna\Model\AboutUsManager;

class UpdateHomeController extends Controller
{
    /**
     * mise à jour des données du modèle
     */
    public function updateAction()
    {
// récupérer $_POST et traiter
        $errors = [];
// creation d'un objet aboutUs vide
        $aboutUs = new AboutUs();
        $aboutUsManager = new AboutUsManager();

        if (!empty($_POST)) {
// traitement des erreurs éventuelles
            $aboutUs->setAboutUsTitle($_POST['about_us_title']);
            $aboutUs->setAboutUs($_POST['about_us']);
            $aboutUs->setBlocNewsTitle($_POST['bloc_news_title']);
            $aboutUs->setNewsTitle($_POST['news_title']);
            $aboutUs->setNewsPicture($_POST['news_picture']);
            $aboutUs->setNews($_POST['news']);
            $aboutUs->setMail($_POST['mail']);
            $aboutUs->setTel($_POST['tel']);


            if (empty($_POST['about_us_title'])) {
                $errors[] = 'Remplissez le champs Titre de la présentation';
            }

            if (empty($_POST['about_us'])) {
                $errors[] = 'Remplissez le champs Nos produits';
            }

            if (empty($_POST['bloc_news_title'])) {
                $errors[] = 'Remplissez le champs Titre de l\' évènement';
            }

            if (empty($_POST['news_title'])) {
                $errors[] = 'Remplissez le champs Titre de la nouveauté';
            }

            if (empty($_POST['news_picture'])) {
                $errors[] = 'Remplissez le champs Image de la nouveauté';
            }

            if (empty($_POST['news'])) {
                $errors[] = 'Remplissez le champs Description de la nouveauté';
            }

            if (empty($_POST['mail'])) {
                $errors[] = 'Remplissez le champs Mail';
            }

            if (empty($_POST['news'])) {
                $errors[] = 'Remplissez le champs Téléphone';
            }

// si pas d'erreur, met à jour la bdd
            if (empty($errors)) {
                $aboutUsManager->updateAboutUs($aboutUs);
                header('Location:admin.php');
            }
        }

        else {
            $aboutUs= $aboutUsManager->findAll()[0];
        }


        return $this->twig->render('Admin/updateHome.html.twig', [
            'errors' => $errors,
            'aboutUs' => $aboutUs,
        ]);


    }
}
