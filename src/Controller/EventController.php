<?php

namespace Cataluna\Controller;


class EventController extends Controller
{
    /*public function showAction()
    {
        // appel de la vue
        return $this->twig->render('Events/events.html.twig');
    }*/

    /**
     * gestion de l'envoi du mail
     */
    public function mailAction()
    {
// récupérer $_POST et traiter
        $errors = [];

        if (!empty($_POST)) {
// traitement des erreurs éventuelles

            $name=$_POST['name'];
            $mail=$_POST['mail'];
            $subject=$_POST['subject'];
            $message=$_POST['message'];



            if (empty($_POST['name'])) {
                $errors[] = 'Remplissez le champs Nom';
            }

            if (empty($_POST['mail'])) {
                $errors[] = 'Remplissez le champs Mail';
            }

            if (empty($_POST['subject'])) {
                $errors[] = 'Remplissez le  champs Sujet';
            }

            if (empty($_POST['message'])) {
                $errors[] = 'Remplissez le champs Message';
            }



// si pas d'erreur, met à jour la bdd
            if (empty($errors)) {
                require '../mail.php';
              echo 'Votre message à été envoyé';

            }
        }



        return $this->twig->render('Events/events.html.twig', [
            'errors' => $errors
        ]);


    }
}
