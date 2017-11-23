<?php

namespace Cataluna\Controller;

use Cataluna\Model\AboutUsManager;

class HomeController extends Controller
{
    public function showAction()
    {
        // appels éventuels aux données des modèles
        $aboutUsManager = new AboutUsManager();
        $home = $aboutUsManager->findAll();
        // appel de la vue
        return $this->twig->render('Home/home.html.twig', [
            'home' => $home[0]
        ]);


    }
}
