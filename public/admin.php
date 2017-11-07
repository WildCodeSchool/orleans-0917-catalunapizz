<?php

use Cataluna\Controller\AdminMenuController;
use Cataluna\Controller\UpdateHomeController;
use Cataluna\Controller\AdminHomeController;
use Cataluna\Controller\UpdateLocationController;

require '../vendor/autoload.php';
require '../connect.php';


// ROUTER
if (!empty($_GET['route'])) {
    if ($_GET['route'] === 'addPizza') {
        // charge la page d'ajout
        $controller = new AdminMenuController();
        echo $controller->addAction();
    }
    elseif ($_GET['route'] === 'delPizza') {
        $controller = new AdminMenuController();
        echo $controller->deleteAction();
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
    $controller = new AdminHomeController();
    echo $controller->showAction();
}

?>
