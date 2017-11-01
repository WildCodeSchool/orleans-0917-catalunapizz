<?php

use Cataluna\Controller\HomeController;
use Cataluna\Controller\MenuController;
use Cataluna\Controller\LocationController;
use Cataluna\Controller\AdminMenuController;
use Cataluna\Controller\UpdateHomeController;
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
        // charge page des evenement
        $controller = new EventController();
        echo $controller->showAction();

    } elseif ($_GET['route'] === 'addPizza') {
        // charge la page d'ajout
        $controller = new AdminMenuController();
        echo $controller->addAction();
    }
    elseif ($_GET['route'] === 'delPizza') {
        $controller = new AdminMenuController();
        echo $controller->deleteAction();
    }

    elseif ($_GET['route'] === 'updatePizza') {
        $controller = new AdminMenucontroller();
        echo $controller->updateAction();
    }

    elseif ($_GET['route'] === 'updateHome') {
        $controller = new UpdateHomeController();
        echo $controller->updateAction();
    }
    elseif ($_GET['route'] === 'adminHome') {
        $controller = new AdminHomeController();
        echo $controller->showAction();
    }

} else {
    // charge homepage
    $controller = new HomeController();
    echo $controller->showAction();
}

?>
