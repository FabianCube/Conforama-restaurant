<?php

include_once 'model/Pedido_ProductoDAO.php';

class accountController
{
    public static function index()
    {
        session_start();
        include_once 'view/nav.php';
        include_once 'view/account.php';
        include_once 'view/footer.php';
    }

    public static function infoPedidos()
    {
        session_start();
        $userID = $_SESSION['current_user']->getUsuario_id();
        $infoPedido = Pedido_ProductoDAO::getAllPedidos_productosByUserID($userID);
        $cantidadTotal = 0;
        foreach ($infoPedido as $value) {
            $cantidadTotal += ProductoDAO::getOneProduct($value->getProducto_id())->getPrecio_producto();
        }

        include_once 'view/nav.php';
        include_once 'view/infoPedidos.php';
        include_once 'view/footer.php';
    }
}