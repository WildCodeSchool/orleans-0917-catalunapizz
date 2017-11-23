<?php


namespace Cataluna\Controller;

use Cataluna\Model\Events;
use Cataluna\Model\EventsManager;
use Cataluna\Model\UploadManager;


class AdminEventsController extends Controller
{
    /**
     * ajoute des données au modèle
     */
    public function addAction()
    {
        // récupérer $_POST et traiter
        $errors = [];
        // creation d'un objet pizza vide
        $event = new Events();

        if (!empty($_POST)) {



            if (empty($_POST['title'])) {
                $errors[] = 'Remplissez le champs Titre !';
            }

            if (empty($_POST['date'])) {
                $errors[] = 'Remplissez le champs Date !';
            }

            if (empty($_POST['description'])) {
                $errors[] = 'Remplissez le champs Description !';
            }

            $uploadManager = new UploadManager();

            if (!empty($_FILES['picture']['name'])) {
                $picture = $uploadManager->tryUpload($_FILES['picture']);
                if (!$picture) {
                    $errors[] = $uploadManager->getErrorMessage();
                } else {
                    $event->setEventPicture($picture);
                }
            }

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {

                // traitement des erreurs éventuelles
                $event->setEventTitle($_POST['title']);
                $event->setDate($_POST['date']);
                $event->setDescription($_POST['description']);

                $eventsManager = new EventsManager();
                $eventsManager->insert($event);
            }
        }

        return $this->twig->render('Admin/addEvent.html.twig', [
            'errors' => $errors,
            'event' => $event,
        ]);

    }

    /**
     * @return string
     */
    public function deleteAction()
    {
        $eventsManager = new EventsManager();
        $events = $eventsManager->findAll();


        if (!empty($_POST)){

            $eventManager = new EventsManager();
            $event = $eventManager->find($_POST['id']);
            $uploadManager = new UploadManager();
            $uploadManager->deleteImage($event->getEventPicture());
            $eventManager->delete($_POST['id']);

            header('Location:index.php?route=evenements');


        }
        return $this->twig->render('Admin/deleteEvent.html.twig', [
            'events'=> $events
        ]);

    }

    public function updateAction()
    {
        $errors = [];
        // creation d'un objet pizza vide

        $eventManager = new EventsManager();
        $event = $eventManager->find($_POST['id']);
        if (!empty($_POST['updating'])) {
            // traitement des erreurs éventuelles

            if (empty($_POST['title'])) {
                $errors[] = 'Remplissez le champs Titre !';
            }

            if (empty($_POST['date'])) {
                $errors[] = 'Remplissez le champs Date !';
            }

            if (empty($_POST['description'])) {
                $errors[] = 'Remplissez le champs Description !';
            }

            $uploadManager = new UploadManager();
            $picture = '';
            if (!empty($_FILES['picture']['name'])) {
                $picture = $uploadManager->tryUpload($_FILES['picture']);
                if (!$picture) {
                    $errors[] = $uploadManager->getErrorMessage();
                }
            }

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {
                $event->setEventTitle($_POST['title']);
                $event->setDate($_POST['date']);
                $event->setDescription($_POST['description']);
                if (!empty($picture)){
                    $uploadManager->deleteImage($event->getEventPicture());
                    $event->setEventPicture($picture);
                }

                $eventsManager = new EventsManager();
                $eventsManager->update($event);


                header('Location:index.php?route=evenements');
            }
        }

        return $this->twig->render('Admin/updateEvent.html.twig', [
            'errors' => $errors,
            'event' => $event,
        ]);
    }

}