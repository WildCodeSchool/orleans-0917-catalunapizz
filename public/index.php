<?php

use Cataluna\Controller\HomeController;
use Cataluna\Controller\MenuController;
use Cataluna\Controller\LocationController;
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

    } elseif ($_GET['route'] === 'uploadMenuPT') {
        $controller = new AdminMenuUploadController();
        echo $controller->addUploadPT();

    }elseif ($_GET['route'] === 'uploadMenuPC') {
        $controller = new AdminMenuUploadController();
        echo $controller->addUploadPC();

    } elseif ($_GET['route'] === 'uploadMenu') {
        $controller = new AdminMenuUploadController();
        echo $controller->deleteUpload();
    }
} else {
    // charge homepage
    $controller = new HomeController();
    echo $controller->showAction();
}

?>
