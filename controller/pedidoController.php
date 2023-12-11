<?php

include_once 'config/parameters.php';
include_once 'model/PedidosDAO.php';
include_once 'model/Pedido_Producto.php';
include_once 'model/Pedido_ProductoDAO.php';

class pedidoController
{
    public function index()
    {
    }

    public function loginOrRegister()
    {
        session_start();
        if (!isset($_SESSION['current_user'])) {
            include_once 'view/createOrRegister.php';
        } else {
            header("Location: " . URL . "?controller=cart&action=pagar");
        }
    }

    public static function realizarPedido()
    {
        session_start();
        $user_id = $_SESSION['current_user']->getUsuario_id();
        $date = date('Y-m-d H:i:s');

        // Guardo la informacion del pedido en la base de datos..
        PedidosDAO::registrarPedido($user_id, EN_CURSO_ESTADO_PEDIDO, $date);
        $pedido = PedidosDAO::getLastPedidoByUserId($user_id);

        foreach ($_SESSION['items'] as $value) {
            // agregar cantidad de producto al constructor, default 1.
            Pedido_ProductoDAO::setPedidoProductos($pedido->getPedido_id(), $value->getProducto_carrito()->getProducto_id(), 1);
        }
        echo 'El pedido se ha procesado correctamente!';
        unset($_SESSION['items']);

        header("Location: " . URL);
    }
}
