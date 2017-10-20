<?php


namespace Cataluna\Controller;

use Cataluna\Model\Pizza;
use Cataluna\Model\PizzaManager;
use Cataluna\Model\AboutUsManager;
use Cataluna\Model\Category;
use Cataluna\Model\CategoryManager;

class MenuController extends Controller
{
    /**
    * affiche les données du modèle
    */
    public function showAction()
    {
        // appels éventuels aux données des modèles
         $menuManager = new PizzaManager();
         $pizzas = $menuManager->findAll();
         $aboutUsManager = new AboutUsManager();
         $home = $aboutUsManager->findAll();
         $categoryManager = new CategoryManager();

        foreach($pizzas as $pizza) {
            $category = $categoryManager->find($pizza->getCategoryId());
            $pizzaCategories[] = ['pizza'=>$pizza, 'category'=>$category];
        }

        var_dump($_POST);
        // appel de la vue
        return $this->twig->render('Menu/show.html.twig', [
            'pizzaCategories'=>$pizzaCategories ,
            'home'=>$home[0],
        ]);

    }
}

 