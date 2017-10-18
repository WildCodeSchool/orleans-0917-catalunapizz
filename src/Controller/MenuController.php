<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 13/10/17
 * Time: 09:38
 */

namespace Cataluna\Controller;


use Cataluna\Model\PizzaManager;
use Cataluna\Model\AboutUsManager;

class MenuController extends Controller
{

    public function showAction()
    {
        // appels éventuels aux données des modèles
         $menuManager = new PizzaManager();
         $pizzas = $menuManager->findAll();
         $aboutUsManager = new AboutUsManager();
         $home = $aboutUsManager->findAll();


        // appel de la vue
        return $this->twig->render('Menu/show.html.twig', [
            'pizzas'=>$pizzas,
            'home'=>$home[0],
        ]);

    }
}
