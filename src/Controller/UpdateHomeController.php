<?php

namespace Cataluna\Controller;

use Cataluna\Model\AboutUs;
use Cataluna\Model\AboutUsManager;
use Cataluna\Model\UploadManager;

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

        $aboutUsManager = new AboutUsManager();
        $aboutUs = $aboutUsManager->findAll()[0];

        if (!empty($_POST)) {
            // traitement des erreurs éventuelles
            // if (empty($_POST['about_us_title'])) {
            //     $errors[] = 'Remplissez le champs Titre de la présentation';
            // }
            //
            // if (empty($_POST['about_us'])) {
            //     $errors[] = 'Remplissez le champs Nos produits';
            // }
            //
            // if (empty($_POST['bloc_news_title'])) {
            //     $errors[] = 'Remplissez le champs Titre de l\' évènement';
            // }
            //
            // if (empty($_POST['news_title'])) {
            //     $errors[] = 'Remplissez le champs Titre de la nouveauté';
            // }
            //
            // if (empty($_POST['news_picture'])) {
            //     $errors[] = 'Remplissez le champs Image de la nouveauté';
            // }
            //
            // if (empty($_POST['news'])) {
            //     $errors[] = 'Remplissez le champs Description de la nouveauté';
            // }
            //
            // if (empty($_POST['mail'])) {
            //     $errors[] = 'Remplissez le champs Mail';
            // }
            //
            // if (empty($_POST['tel'])) {
            //     $errors[] = 'Remplissez le champs Téléphone';
            // }
            //
            // if (empty($_FILES['img1_carrousel']['name'])
            //     && empty($aboutUs->getImg1Carrousel())) {
            //     $errors[] = 'Veuillez choisir l\'image 1 du carrousel';
            // }
            //
            // if (empty($_POST['img2_carrousel'])) {
            //     $errors[] = 'Remplissez le champs  Image 2 du carrousel';
            // }
            //
            // if (empty($_POST['img3_carrousel'])) {
            //     $errors[] = 'Remplissez le champs  Image 3 du carrousel';
            // }

            $uploadManager = new UploadManager();

            $imgCarrousel1 = '';
            if (!empty($_FILES['img1_carrousel']['name'])) {
                $imgCarrousel1 = $uploadManager->tryUpload($_FILES['img1_carrousel']);
                if (!$imgCarrousel1) {
                    $errors[] = $uploadManager->getErrorMessage();
                } else {
                    $aboutUs->setImg1Carrousel($imgCarrousel1);
                }
            }

            $imgCarrousel2 = '';
            if (!empty($_FILES['img2_carrousel']['name'])) {
                $imgCarrousel2 = $uploadManager->tryUpload($_FILES['img2_carrousel']);
                if (!$imgCarrousel2) {
                    $errors[] = $uploadManager->getErrorMessage();
                } else {
                    $aboutUs->setImg2Carrousel($imgCarrousel2);
                }
            }

            $imgCarrousel3 = '';
            if (!empty($_FILES['img3_carrousel']['name'])) {
                $imgCarrousel3 = $uploadManager->tryUpload($_FILES['img3_carrousel']);
                if (!$imgCarrousel3) {
                    $errors[] = $uploadManager->getErrorMessage();
                } else {
                    $aboutUs->setImg3Carrousel($imgCarrousel3);
                }
            }

            $newsPicture = '';
            if (!empty($_FILES['news_picture']['name'])) {
                $newsPicture = $uploadManager->tryUpload($_FILES['news_picture']);
                if (!$newsPicture) {
                    $errors[] = $uploadManager->getErrorMessage();
                } else {
                    $aboutUs->setNewsPicture($newsPicture);
                }
            }

// si pas d'erreur, met à jour la bdd
// var_dump($errors);
// die;
            if (empty($errors)) {
                $aboutUs->setAboutUsTitle($_POST['about_us_title']);
                $aboutUs->setAboutUs($_POST['about_us']);
                $aboutUs->setBlocNewsTitle($_POST['bloc_news_title']);
                $aboutUs->setNewsTitle($_POST['news_title']);
                $aboutUs->setNews($_POST['news']);
                $aboutUs->setMail($_POST['mail']);
                $aboutUs->setTel($_POST['tel']);
                if (!empty($imgCarrousel1)) {
                    $aboutUs->setImg1Carrousel($imgCarrousel1);
                }
                if (!empty($imgCarrousel2)) {
                    $aboutUs->setImg2Carrousel($imgCarrousel2);
                }
                if (!empty($imgCarrousel3)) {
                    $aboutUs->setImg3Carrousel($imgCarrousel3);
                }
                if (!empty($newsPicture)) {
                    $aboutUs->setNewsPicture($newsPicture);
                }

                $aboutUsManager->updateAboutUs($aboutUs);
                header('Location:admin.php');
            }
            // else {
                // if (!empty($imgCarrousel1)) {
                //     $uploadManager->deleteImage($imgCarrousel1);
                // }
                // if (!empty($imgCarrousel2)) {
                //     $uploadManager->deleteImage($imgCarrousel2);
                // }
                // if (!empty($imgCarrousel3)) {
                //     $uploadManager->deleteImage($imgCarrousel3);
                // }
                // if (!empty($newsPicture)) {
                //     $uploadManager->deleteImage($newsPicture);
                // }
            // }
        }

        return $this->twig->render('Admin/updateHome.html.twig', [
            'errors' => $errors,
            'aboutUs' => $aboutUs,
        ]);
    }
}
