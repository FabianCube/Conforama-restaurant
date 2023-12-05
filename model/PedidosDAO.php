<?php

include_once 'config/dataBase.php';
include_once 'Producto.php';
include_once 'Usuarios.php';
include_once 'Carrito.php';
include_once 'Pedidos.php';

class PedidosDAO
{
    public static function registrarPedido($user_id, $estado, $hora)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("INSERT INTO pedidos (usuario_id, estado, hora_pedido) 
            VALUES ($user_id, '$estado', '$hora')");

        if(!$sql->execute())
        {
            echo 'error';
        }

        mysqli_close($conn);
    }

    public static function getPedidoByID($ped_id)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM pedidos WHERE pedido_id = $ped_id");
        $sql->execute();
        $result = $sql->get_result();

        $ped = $result->fetch_object('Pedidos');
        return $ped;
    }

    public static function getPedidoByUserId($user_id)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM pedidos WHERE usuario_id = $user_id");
        $sql->execute();
        $result = $sql->get_result();

        $user = $result->fetch_object('Pedidos');
        return $user;
    }

}