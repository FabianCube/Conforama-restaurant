<?php

include_once 'config/dataBase.php';
include_once 'Producto.php';
include_once 'Usuarios.php';
include_once 'Carrito.php';
include_once 'Pedido_Producto.php';
include_once 'Pedidos.php';

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

    public static function setPedidoProductos($pedido_id, $producto_id, $cantidad)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("INSERT INTO pedido_producto (pedido_id, producto_id, cantidad) 
            VALUES ($pedido_id, $producto_id, $cantidad)");

        if (!$sql->execute()) {
            echo 'error';
        }

        mysqli_close($conn);
    }

    public static function getAllPedidos_productosByUserID($user_id)
    {
        $conn = DataBase::connect();

        $stmt = $conn->prepare("SELECT * FROM pedido_producto WHERE pedido_id in 
            (SELECT pedido_id FROM pedidos WHERE usuario_id = $user_id)");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($ped = $result->fetch_object('Pedido_Producto')) {
                $ped_productos[] = $ped;
            }
        }

        return $ped_productos;
    }

    public static function pedidoExistsWithUserID($user_id)
    {
        $conn = DataBase::connect();
        $total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pedido_producto WHERE pedido_id in 
            (SELECT pedido_id FROM pedidos WHERE usuario_id = $user_id)"));

        if ($total != 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function calculateTotalValueOfPedido($ped_id)
    {
        $conn = DataBase::connect();
        $result = mysqli_query($conn, "SELECT ped.pedido_id, ped.hora_pedido, SUM(prod.precio_producto) FROM 
                pedidos ped, 
                productos prod 
                WHERE ped.pedido_id = $ped_id AND prod.producto_id in 
                    (SELECT producto_id FROM pedido_producto WHERE pedido_id = $ped_id)
                GROUP BY ped.pedido_id;");

        if (!$result) {
            echo 'No se pudo ejecutar la consulta';
            exit;
        }
        return $result;
    }
}
