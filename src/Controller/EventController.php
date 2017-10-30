<?php

namespace Cataluna\Controller;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;



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



            if (empty($errors)) {

                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                    ->setUsername(USER)
                    ->setPassword(PASS)
                ;

                $mailer = new Swift_Mailer($transport);

                $message = (new Swift_Message($subject))
                    ->setFrom([$mail => $name])
                    ->setTo([MAIL])
                    ->setBody($message)
                ;

                $result = $mailer->send($message);

            }
        }



        return $this->twig->render('Events/events.html.twig', [
            'errors' => $errors
        ]);


    }
}
