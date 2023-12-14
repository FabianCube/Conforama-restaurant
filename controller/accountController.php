<?php

include_once 'model/Pedido_ProductoDAO.php';
include_once 'model/Pedido_Producto.php';

class accountController
{
    public static function index()
    {
        include_once 'view/nav.php';
        include_once 'view/account.php';
        include_once 'view/footer.php';
    }

    public static function infoPedidos()
    {
        $userID = $_SESSION['current_user']->getUsuario_id();
        //$infoPedido = Pedido_ProductoDAO::getAllPedidos_productosByUserID($userID);
        $infoPedido = PedidosDAO::getPedidoByUserId($userID);

        // foreach ($infoPedido as $value) {
        //     $cantidadTotal = PedidosDAO::getPedidoByID($value->getPedido_id())->getPrecio_total();
        // }

        include_once 'view/nav.php';
        include_once 'view/infoPedidos.php';
        include_once 'view/footer.php';
    }

    public static function detallesPedido()
    {
        
    }
}