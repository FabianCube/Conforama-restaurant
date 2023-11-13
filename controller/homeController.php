<?php

class homeController
{
    public function index()
    {
        session_start();

        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = array();
        } else {
            if (isset($_POST['id'])) {
                $pedido = new Carrito(ProductoDAO::getOneProduct($_POST['id']));
                array_push($_SESSION['items'], $pedido);
            }
        }

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