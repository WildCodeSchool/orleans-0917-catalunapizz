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
    }
} else {
    // charge homepage
    $controller = new HomeController();
    echo $controller->showAction();
}

?>
