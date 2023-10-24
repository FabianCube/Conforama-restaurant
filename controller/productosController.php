<?php
include_once 'model/ProductoDAO.php';

class productosController
{
    public function index()
    {
        include_once('view/nav.php');
    }

    public function compra()
    {
        echo 'Pagina de compra';
    }
}