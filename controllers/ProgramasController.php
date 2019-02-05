<?php

class ProgramasController
{
    public function inclusion_social_politica()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/programas/inclusion_social_politica.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }

    public function competitividad_territorial()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/programas/competitividad_territorial.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }

    public function cambio_climatico_gestion_ambiental()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/programas/cambio_climatico_gestion_ambiental.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
}