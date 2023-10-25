<?php
include_once 'model/ProductoDAO.php';

class productosController
{
    public function index()
    {
        //include_once('view/nav.php');

        // mostrar los productos
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        $productos = productoDAO::getAllProducts();
        var_dump($productos);
    }
}