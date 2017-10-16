<?php

use Cataluna\Controller\HomeController;
use Cataluna\Controller\MenuController;

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
    }
} else {
    // charge homepage
    $controller = new HomeController();
    echo $controller->showAction();
}

?>
