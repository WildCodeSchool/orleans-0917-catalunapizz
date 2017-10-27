<?php

use Cataluna\Controller\HomeController;
use Cataluna\Controller\MenuController;
use Cataluna\Controller\LocationController;
use Cataluna\Controller\AdminController;
use Cataluna\Controller\AdminHomeController;
use Cataluna\Controller\EventController;

require '../vendor/autoload.php';
require '../connect.php';


// ROUTER
if (!empty($_GET['route'])) {
    if ($_GET['route'] === 'carte') {
        // charge la page de la carte
        $controller = new MenuController();
        echo $controller->showAction();

    } elseif ($_GET['route'] === 'lieux') {
        // charge page des lieux
        $controller = new LocationController();
        echo $controller->showAction();

    } elseif ($_GET['route'] === 'evenements') {
        // charge page des lieux
        $controller = new EventController();
        echo $controller->mailAction();

    } elseif ($_GET['route'] === 'addPizza') {
        // charge la page d'ajout
        $controller = new AdminController();
        echo $controller->addAction();
    }
    elseif ($_GET['route'] === 'delPizza') {
        $controller = new AdminController();
        echo $controller->deleteAction();
    }
    elseif ($_GET['route'] === 'updateHome') {
        $controller = new AdminHomeController();
        echo $controller->updateAction();
    }


} else {
    // charge homepage
    $controller = new HomeController();
    echo $controller->showAction();
}

?>
