<?php

class OrganizacionController
{
    public function estructura()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/organizacion/estructura.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
}