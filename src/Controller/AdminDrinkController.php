<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 02/11/17
 * Time: 09:57
 */

namespace Cataluna\Controller;

use Cataluna\Model\Drink;
use Cataluna\Model\DrinkManager;

class AdminDrinkController extends Controller
{
    public function addDrink()
    {
        // récupérer $_POST et traiter
        $errors = [];
        // creation d'un objet pizza vide
        $drink = new Drink();

        if (!empty($_POST)) {
            // traitement des erreurs éventuelles
            $drink->setTitle($_POST['title']);
            $drink->setPrice1($_POST['price_1']);
            $drink->setPrice2($_POST['price_2']);
            $drink->setPicture($_POST['picture']);


            if (empty($_POST['title'])) {
                $errors[] = 'Title is required';
            }

            if (empty($_POST['price_1'])) {
                $errors[] = 'Price is required';
            }

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {
                $drinkManager = new DrinkManager();
                $drinkManager->insert($drink);
            }
        }

        return $this->twig->render('Admin/addDrink.html.twig', [
            'errors' => $errors,
            'drink' => $drink,
        ]);

    }

    /**
     * @return string
     */
    public function deleteDrink()
    {

        // appels éventuels aux données des modèles
        $drinkManager = new DrinkManager();
        $drinks = $drinkManager->findAll();


        if (!empty($_POST)){

            $deleteManager = new DrinkManager();
            $deleteManager->delete($_POST['id']);

            header('Location:index.php?route=carte');


        }
        return $this->twig->render('Admin/deleteDrink.html.twig', [
            'drinks' => $drinks,
        ]);

    }

    public function updateDrink()
    {
        $errors = [];
        // creation d'un objet pizza vide

        $drinkManager = new DrinkManager();
        $drink = $drinkManager->find($_POST['id']);
        if (!empty($_POST['updating'])) {
            // traitement des erreurs éventuelles
            $drink->setTitle($_POST['title']);
            $drink->setPrice1($_POST['price_1']);
            $drink->setPrice2($_POST['price_2']);

            if (empty($_POST['title'])) {
                $errors[] = 'Title is required';
            }

            if (empty($_POST['price_1'])) {
                $errors[] = 'Price is required';
            }


            // si pas d'erreur, insert en bdd
            if (empty($errors)) {
                $drinkManager->update($drink);
                header('Location:index.php?route=carte');
            }
        }

        return $this->twig->render('Admin/updateDrink.html.twig', [
            'errors' => $errors,
            'drink' => $drink,
        ]);
    }
}