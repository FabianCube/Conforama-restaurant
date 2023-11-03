<?php
include_once 'model/ProductoDAO.php';

class productosController
{
    public function index()
    {
        include_once('view/nav.php');
        include_once('view/comandPanel.php');
    }

    public function eliminar()
    {
        $producto_id = $_POST["producto_id"];
        ProductoDAO::deleteProduct($producto_id);
        header("Location:".URL);
    }

    public function modificar()
    {
        include_once("view/modifyPanel.php");
    }

    public static function updateProduct()
    {
        $conn = DataBase::connect();

        $producto_id = $_POST['producto_id'];
        $nombre_nuevo = $_POST['nombre_producto'];
        $decripcion_nueva = $_POST['descripcion'];
        $precio_nuevo = $_POST['precio_producto'];
        $categoria_id = $_POST['categoria_id'];
        
        $stmt = $conn->prepare("UPDATE productos SET
        nombre_producto='".$nombre_nuevo."', 
        descripcion='".$decripcion_nueva."',
        precio_producto=".$precio_nuevo.",
        categoria_id=".$categoria_id." where producto_id = $producto_id");

        $stmt->execute();
        $result = $stmt->get_result();
        
        header("Location:".URL);
        
        return $result;
    }
}