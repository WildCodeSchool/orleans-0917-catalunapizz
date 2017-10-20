<?php


namespace Cataluna\Controller;

use Cataluna\Model\Pizza;
use Cataluna\Model\PizzaManager;
use Cataluna\Model\AboutUsManager;
use Cataluna\Model\Category;
use Cataluna\Model\CategoryManager;

class AdminController extends Controller
{
    /**
    * ajoute des données au modèle
    */
    public function addAction()
    {
        // récupérer $_POST et traiter
        $errors = [];
        // creation d'un objet person vide
        $pizza = new Pizza();

        if (!empty($_POST)) {
            // traitement des erreurs éventuelles
            $pizza->setTitle($_POST['title']);
            $pizza->setIngredients($_POST['ingredients']);
            $pizza->setPrice1($_POST['price_1']);
            $pizza->setPrice2($_POST['price_2']);
            $pizza->setCategoryId($_POST['category']);


            if (empty($_POST['title'])) {
                $errors[] = 'Title is required';
            }

            if (empty($_POST['ingredients'])) {
                $errors[] = 'Ingredients is required';
            }

            if (empty($_POST['price_1'])) {
                $errors[] = 'Price is required';
            }

            if (empty($_POST['category'])) {
                $errors[] = 'Category is required';
            }

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {
                $pizzaManager = new PizzaManager();
                $pizzaManager->insert($pizza);


            }
        }

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();

        return $this->twig->render('Menu/add.html.twig', [
            'errors' => $errors,
            'categories' => $categories,
            'pizza' => $pizza,
        ]);

    }
}
