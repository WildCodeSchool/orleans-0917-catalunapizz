<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 13/10/17
 * Time: 09:38
 */

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
        // appel de la vue
        return $this->twig->render('Locations/locations.html.twig', [
            'location' => $locations,
            'home' => $home[0],
        ]);


    }
}
