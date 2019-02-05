
<?php

class QuienesSomosController
{
    public function quienes_somos()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/quienes_somos/historia.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
}