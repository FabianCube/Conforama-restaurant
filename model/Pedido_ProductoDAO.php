<?php

include_once 'config/dataBase.php';
include_once 'Producto.php';
include_once 'Usuarios.php';
include_once 'Carrito.php';
include_once 'Pedido_Producto.php';

class Pedido_ProductoDAO
{
    public static function getPedidoProductosById($pedido_id)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM pedido_producto WHERE pedido_id = $pedido_id");
        $sql->execute();
        $result = $sql->get_result();

        $user = $result->fetch_object('Pedido_Producto');
        return $user;
    }

    public static function setPedidoProductos($pedido_id, $producto_id)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("INSERT INTO pedido_producto (pedido_id, producto_id) 
            VALUES ($pedido_id, $producto_id)");

        if(!$sql->execute())
        {
            echo 'error';
        }

        mysqli_close($conn);
    }

    public static function getInfoProductosEnPedidoByPedidoId($pedido_id)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT nombre_producto, precio_producto, descripcion FROM productos WHERE producto_id in 
            (SELECT producto_id FROM pedido_producto WHERE pedido_id = $pedido_id)");
        $sql->execute();
        $result = $sql->get_result();

        $info = $result->fetch_object('InfoPedido');
        return $info;
    }
}
