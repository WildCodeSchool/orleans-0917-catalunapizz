<?php

namespace Cataluna\Controller;

use Cataluna\Model\AboutUsManager;
use Cataluna\Model\PizzaManager;

class HomeController extends Controller
{
    public function showAction()
    {
        // appels éventuels aux données des modèles
         $aboutUsManager = new AboutUsManager();
         $home = $aboutUsManager->findAll();
         $pizzaManager = new PizzaManager();
         $pizza = $pizzaManager->findAll();
        // appel de la vue
        return $this->twig->render('Home/home.html.twig',[
          'home'=>$home[0]
        ]);


    }
}
