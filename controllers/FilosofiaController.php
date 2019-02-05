<?php

class FilosofiaController
{
    public function mision_vision()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/filosofia/mision_vision.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
    public function principios_valores()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/filosofia/principios_valores.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
    public function enfoques()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/filosofia/enfoques.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
}