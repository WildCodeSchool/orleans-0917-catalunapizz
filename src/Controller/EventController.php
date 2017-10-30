<?php

namespace Cataluna\Controller;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;



class EventController extends Controller
{

    /**
     * gestion de l'envoi du mail
     */
    public function showAction()
    {

        $errors = [];

        //findall events

        if (!empty($_POST)) {


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

            if (preg_match ('/\b[\w.-]+@[\w.-]{2,}\.[a-z]{2,5}\b/', $_POST['mail'])!= true) {
                $errors[] = 'L\'adresse mail n\'est pas valide';
            }

            if (empty($_POST['subject'])) {
                $errors[] = 'Remplissez le  champs Sujet';
            }

            if (empty($_POST['message'])) {
                $errors[] = 'Remplissez le champs Message';
            }

            if (empty($errors)) {

                $transport = (new Swift_SmtpTransport(MAILHOST, MAILPORT, MAILSECURITY))
                    ->setUsername(MAILUSER)
                    ->setPassword(MAILPASS);

                $mailer = new Swift_Mailer($transport);

                $message = (new Swift_Message($subject))
                    ->setFrom([$mail => $name])
                    ->setTo([MAILDESTINATION])
                    ->setBody($message);

                $mailer->send($message);
                //header location

            }
        }

        return $this->twig->render('Events/events.html.twig', [
            'errors' => $errors
        ]);


    }




}
