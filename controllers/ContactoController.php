<?php

class ContactoController
{
    public function contacto()
    {
        include_once 'views/includes/head.php';
        include_once 'views/includes/header.php';
        require_once 'views/pages/contacto/contacto.php';
        include_once 'views/includes/footer.php';
        include_once 'views/includes/scripts.php';
    }
}