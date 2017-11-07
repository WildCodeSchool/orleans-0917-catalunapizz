<?php

use Cataluna\Controller\AdminMenuController;
use Cataluna\Controller\UpdateHomeController;
use Cataluna\Controller\AdminHomeController;
use Cataluna\Controller\UpdateLocationController;
use Cataluna\Controller\AdminEventsController;
use Cataluna\Controller\AdminDrinkController;


require '../vendor/autoload.php';
require '../connect.php';


// ROUTER
if (!empty($_GET['route'])) {
    if ($_GET['route'] === 'addPizza') {
        $controller = new AdminMenuController();
        echo $controller->addAction();
    }
    elseif ($_GET['route'] === 'delPizza') {
        $controller = new AdminMenuController();
        echo $controller->deleteAction();
    }
    elseif ($_GET['route'] === 'updatePizza') {
        $controller = new AdminMenuController();
        echo $controller->updateAction();
    }
    elseif ($_GET['route'] === 'delDrink') {
        $controller = new AdminDrinkController();
        echo $controller->deleteDrink();
    }
    elseif ($_GET['route'] === 'addDrink') {
        $controller = new AdminDrinkController();
        echo $controller->addDrink();
    }
    elseif ($_GET['route'] === 'updateDrink') {
        $controller = new AdminDrinkController();
        echo $controller->updateDrink();
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
    if ($_GET['route'] === 'addEvent') {
        $controller = new AdminEventsController();
        echo $controller->addAction();
    }
    elseif ($_GET['route'] === 'delEvent') {
        $controller = new AdminEventsController();
        echo $controller->deleteAction();
    }
    elseif ($_GET['route'] === 'updateEvent') {
        $controller = new AdminEventsController();
        echo $controller->updateAction();
    }

} else {
    // charge homepage
    $controller = new AdminHomeController();
    echo $controller->showAction();
}

?>
