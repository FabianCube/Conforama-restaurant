<?php

include_once 'model/PedidosDAO.php';
include_once 'model/Pedido_Producto.php';
include_once 'model/Pedido_ProductoDAO.php';

class pedidoController
{
    public function index()
    { }

    public function loginOrRegister()
    {
        session_start();
        if(!isset($_SESSION['current_user']))
        {
            include_once 'view/createOrRegister.php';
        }
        else
        {
            header("Location: " . URL . "?controller=cart&action=pagar");
        }
    }

    public static function realizarPedido()
    {
        session_start();
        $user_id = $_SESSION['current_user']->getUsuario_id();
        $productos = $_SESSION['items'];
        $date = date('d/m/Y h:i:s a', time());
        $estado = "Realizado";

        PedidosDAO::registrarPedido($user_id, $estado, $date);

        $pedido_id = PedidosDAO::getPedidoByUserId($user_id);

        $_SESSION['pedido_usuario'] = new Pedido_Productos($pedido_id, $productos);

        if(isset($_SESSION['pedido_usuario']))
        {
            foreach ($_SESSION['items'] as $value) {
                Pedido_ProductoDAO::setPedidoProductos($pedido_id->getPedido_id(), $value->getProducto_carrito()->getProducto_id());
            }
            echo 'El pedido se ha procesado correctamente!';
            unset($_SESSION['items']);
        }
        else
        {
            echo 'No se ha podido crear el pedido.';
        }
        
        header("Location: " . URL);
    }
}