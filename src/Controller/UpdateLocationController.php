<?php

namespace Cataluna\Controller;

use Cataluna\Model\Location;
use Cataluna\Model\LocationManager;

class UpdateLocationController extends Controller
{
    /**
     * mise à jour des données du modèle
     */
     public function showAction()
     {
         // appels éventuels aux données des modèles
         $locationManager = new LocationManager();
         $locations = $locationManager->findAll();
         $days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
         $result = [];
         foreach($days as $day) {
             foreach($locations as $location) {
                 if($day == $location->getDay()) {
                     $result[] = $location;
                 }
             }
         }
         // appel de la vue
         return $this->twig->render('Admin/updateLocationHome.html.twig', [
             'locations' => $result,
         ]);
     }

    public function updateAction()
    {
// récupérer $_POST et traiter
        $errors = [];
// creation d'un objet location vide
        $locationManager = new LocationManager();
        $location = $locationManager->find((int)$_POST['id']);
        if (!empty($_POST['updating'])) {
// traitement des erreurs éventuelles
            $location->setDay($_POST['day']);
            $location->setLocationAM($_POST['location_am']);
            $location->setHourAM($_POST['hour_am']);
            $location->setLocationPM($_POST['location_pm']);
            $location->setHourPM($_POST['hour_pm']);


            if (empty($_POST['day'])) {
                $errors[] = 'Remplissez le champs Jour';
            }

// si pas d'erreur, met à jour la bdd
            if (empty($errors)) {
                $locationManager->updateLocation($location);
                header('Location:admin.php?route=updateLocationHome');
            }
        }

        return $this->twig->render('Admin/updateLocation.html.twig', [
            'errors' => $errors,
            'locations' => $location,
        ]);


    }
}
