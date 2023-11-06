<?php

class homeController
{
    public function index()
    {
        include_once 'view/nav.php';
        include_once 'view/header.php';
        include_once 'view/home.php';
    }

    public function compra()
    {
        echo 'Pagina de compra';
    }
}