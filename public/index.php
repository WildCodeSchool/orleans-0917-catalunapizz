<?php

use Cataluna\Controller\HomeController;
use Cataluna\Controller\MenuController;
use Cataluna\Controller\LocationController;
use Cataluna\Controller\AdminMenuController;
use Cataluna\Controller\AdminHomeController;
use Cataluna\Controller\AdminMenuUploadController;
use Cataluna\Controller\AdminDrinkController;
use Cataluna\Controller\UpdateHomeController;
use Cataluna\Controller\EventController;
use Cataluna\Controller\UpdateLocationController;

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

    } elseif ($_GET['route'] === 'delPizza') {
        $controller = new AdminMenuController();
        echo $controller->deleteAction();

    } elseif ($_GET['route'] === 'updatePizza') {
        $controller = new AdminMenucontroller();
        echo $controller->updateAction();

    } elseif ($_GET['route'] === 'addDrink') {
        $controller = new AdminDrinkController();
        echo $controller->addDrink();

    } elseif ($_GET['route'] === 'delDrink') {
        $controller = new AdminDrinkController();
        echo $controller->deleteDrink();

    } elseif ($_GET['route'] === 'updateDrink') {
        $controller = new AdminDrinkController();
        echo $controller->updateDrink();

    } elseif ($_GET['route'] === 'updateHome') {
        $controller = new AdminHomeController();

    } elseif ($_GET['route'] === 'updateHome') {
        $controller = new UpdateHomeController();
        echo $controller->updateAction();

    } elseif ($_GET['route'] === 'uploadMenuPT') {
        $controller = new AdminMenuUploadController();
        echo $controller->addUploadPT();

    }elseif ($_GET['route'] === 'uploadMenuPC') {
        $controller = new AdminMenuUploadController();
        echo $controller->addUploadPC();

    } elseif ($_GET['route'] === 'uploadMenu') {
        $controller = new AdminMenuUploadController();
        echo $controller->deleteUpload();
      
    } elseif ($_GET['route'] === 'updateHome') {

    }
    elseif ($_GET['route'] === 'delPizza') {
        $controller = new AdminMenuController();
        echo $controller->deleteAction();
    }
    elseif ($_GET['route'] === 'updatePizza') {
        $controller = new AdminMenuController();
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
    elseif ($_GET['route'] === 'updateLocation') {
        $controller = new UpdateLocationController();
        echo $controller->updateAction();
    }
    elseif ($_GET['route'] === 'updateLocationHome') {
        $controller = new UpdateLocationController();
        echo $controller->showAction();
    }

} else {
    // charge homepage
    $controller = new HomeController();
    echo $controller->showAction();
}

?>
