<?php

class PublicacionesController
{
    public function proyectos()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/publicaciones/proyectos.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
    public function publicaciones()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/publicaciones/publicaciones.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
}
