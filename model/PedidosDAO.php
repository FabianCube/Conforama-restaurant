<?php

include_once 'config/dataBase.php';
include_once 'Producto.php';
include_once 'Usuarios.php';
include_once 'Carrito.php';
include_once 'Pedidos.php';

class PedidosDAO
{
    public static function getAllPedidos()
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM pedidos");
        $sql->execute();
        $result = $sql->get_result();

        if ($result) 
        {
            while ($pedido = $result->fetch_object('Pedidos')) 
            {
                $pedidos[] = $pedido;
            }
        }

        return $pedidos;
    }

    public static function registrarPedido($user_id, $estado, $hora, $precio_total)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("INSERT INTO pedidos (usuario_id, estado, hora_pedido, precio_total) 
            VALUES ($user_id, '$estado', '$hora', $precio_total)");

        if (!$sql->execute()) {
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
        $sql = $conn->prepare("SELECT * FROM pedidos WHERE usuario_id = $user_id ORDER BY hora_pedido DESC");
        $sql->execute();
        $result = $sql->get_result();

        if ($result) {
            while ($pedido = $result->fetch_object('Pedidos')) {
                $pedidos[] = $pedido;
            }
        }

        return $pedidos;
    }

    public static function getLastPedidoByUserId($user_id)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM pedidos WHERE usuario_id = $user_id ORDER BY pedido_id DESC");
        $sql->execute();
        $result = $sql->get_result();

        $user = $result->fetch_object('Pedidos');
        return $user;
    }
}
