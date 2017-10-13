<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 13/10/17
 * Time: 09:37
 */

namespace Cataluna\Controller;


class HomeController extends Controller
{
    public function showAction()
    {
        // appels éventuels aux données des modèles

        // appel de la vue
        return $this->twig->render('Home/home.html.twig');


    }
}