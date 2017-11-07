<?php


namespace Cataluna\Controller;

use Cataluna\Model\Pizza;
use Cataluna\Model\PizzaManager;
use Cataluna\Model\AboutUsManager;
use Cataluna\Model\Category;
use Cataluna\Model\CategoryManager;

class AdminMenuController extends Controller
{
    /**
    * ajoute des données au modèle
    */
    public function addAction()
    {
        // récupérer $_POST et traiter
        $errors = [];
        // creation d'un objet pizza vide
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

        return $this->twig->render('Admin/addMenu.html.twig', [
            'errors' => $errors,
            'categories' => $categories,
            'pizza' => $pizza,
        ]);

    }

    /**
     * @return string
     */
    public function deleteAction()
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

        if (!empty($_POST)){

            $deleteManager = new PizzaManager();
            $deleteManager->delete($_POST['id']);

            header('Location:admin.php?route=delPizza');


        }
          return $this->twig->render('Admin/deleteMenu.html.twig', [
            'pizzaCategories'=>$pizzaCategories ,
            'home'=>$home[0],
        ]);

    }

    public function updateAction()
    {
        $errors = [];
        // creation d'un objet pizza vide

        $pizzaManager = new PizzaManager();
        $pizza = $pizzaManager->find($_POST['id']);
        if (!empty($_POST['updating'])) {
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
                $pizzaManager->update($pizza);
                header('Location:admin.php?route=carte');
            }
        }

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();

        return $this->twig->render('Admin/updateMenu.html.twig', [
            'errors' => $errors,
            'categories' => $categories,
            'pizza' => $pizza,
        ]);
    }

}
