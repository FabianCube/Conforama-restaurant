<?php

class homeController
{
    public function index()
    {
        include_once 'view/nav.php';
        include_once 'view/header.php';
    }

    public function compra()
    {
        echo 'Pagina de compra';
    }
}