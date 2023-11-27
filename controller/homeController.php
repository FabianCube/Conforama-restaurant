<?php

class homeController
{
    public function index()
    {
        session_start();

        include_once 'view/nav.php';
        include_once 'view/header.php';
        include_once 'view/home.php';
        include_once 'view/footer.php';
    }

    public function compra()
    {
        echo 'Pagina de compra';
    }
}