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
        $infoPedido = PedidosDAO::getPedidoByUserId($userID);

        include_once 'view/nav.php';
        include_once 'view/infoPedidos.php';
        include_once 'view/footer.php';
    }

    public static function detallesPedido()
    {
        // Obtengo el pedido_id que quiero mostrar.
        $pedido_id = $_POST['pedidoId-detallesPedido'];

        // uso el pedido_id para obtener los productos del pedido.
        $pedido_producto = Pedido_ProductoDAO::getPedidoProductosById($pedido_id);

        include_once 'view/nav.php';
        include_once 'view/detallesPedido.php';
        include_once 'view/footer.php';
    }
}