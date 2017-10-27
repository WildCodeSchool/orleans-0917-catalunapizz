<?php

namespace Cataluna\Controller;


class AdminHomeController extends Controller
{
    public function showAction()
    {
        // appel de la vue
        return $this->twig->render('Admin/adminHome.html.twig');
    }
}
