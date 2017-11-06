<?php


namespace Cataluna\Controller;

use Cataluna\Model\Pizza;
use Cataluna\Model\PizzaManager;
use Cataluna\Model\AboutUsManager;
use Cataluna\Model\Category;
use Cataluna\Model\CategoryManager;
use Cataluna\Model\Drink;
use Cataluna\Model\DrinkManager;

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
        $drinkManager = new DrinkManager();
        $drinks = $drinkManager->findAll();


        foreach($pizzas as $pizza) {
            $category = $categoryManager->find($pizza->getCategoryId());
            $pizzaCategories[] = ['pizza'=>$pizza, 'category'=>$category];
        }

        // appel de la vue
        return $this->twig->render('Menu/show.html.twig', [
            'pizzaCategories'=>$pizzaCategories ,
            'drinks' => $drinks,

        ]);

    }
}

 