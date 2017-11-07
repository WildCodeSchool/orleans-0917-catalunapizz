<?php
namespace Cataluna\Controller;

use Cataluna\Model\LocationManager;
use Cataluna\Model\AboutUsManager;

class LocationController extends Controller
{
    public function showAction()
    {
        // appels éventuels aux données des modèles
        $locationManager = new LocationManager();
        $locations = $locationManager->findAll();
        $aboutUsManager = new AboutUsManager();
        $home = $aboutUsManager->findAll();
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
        return $this->twig->render('Locations/locations.html.twig', [
            'locations' => $result,
            'home' => $home[0],
        ]);


    }
}
