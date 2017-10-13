<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 13/10/17
 * Time: 09:38
 */

namespace Cataluna\Controller;


use Cataluna\Model\PizzaManager;

class MenuController extends Controller
{

    public function showAction()
    {
        // appels éventuels aux données des modèles
         $menuManager = new PizzaManager();
         $pizzas = $menuManager->findAll();

        $drinks = ['Coca', 'Fanta', 'Eau'];

        // appel de la vue
        return $this->twig->render('Menu/show.html.twig', [
            'pizzas'=>$pizzas,
            'drinks'=>$drinks,
        ]);

    }
}