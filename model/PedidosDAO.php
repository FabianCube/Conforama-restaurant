<?php

include_once 'config/dataBase.php';
include_once 'Producto.php';
include_once 'Usuarios.php';
include_once 'Carrito.php';

class PedidosDAO
{
    public static function registrarPedido()
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("");

        if(!$sql->execute())
        {
            echo 'error';
        }

        mysqli_close($conn);
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