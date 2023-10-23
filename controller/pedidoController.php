<?php
include_once 'model/ProductoDAO.php';

class pedidoController
{
    public function index()
    {
        
        var_dump(ProductoDAO::getAllProducts());
    }

    public function compra()
    {
        echo 'Pagina de compra';
    }
}