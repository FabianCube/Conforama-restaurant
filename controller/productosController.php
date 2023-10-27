<?php
include_once 'model/ProductoDAO.php';

class productosController
{
    public function index()
    {
        include_once('view/nav.php');

        // mostrar los productos
        $productos = ProductoDAO::getAllProducts();

        include_once('view/comandPanel.php');
    }

    public function eliminar()
    {
        $producto_id = $_POST["producto_id"];
        ProductoDAO::deleteProduct($producto_id);
        header("Location:".URL);
    }

    public function modificar()
    {
        include_once("view/modifyPanel.php");
    }
}