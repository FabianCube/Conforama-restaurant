<?php
include_once 'config/dataBase.php';
include_once 'Producto.php';

class ProductoDAO
{
  public static function getAllProducts()
  {
    $conn = DataBase::connect();

    $stmt = $conn->prepare("SELECT * FROM productos");
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result) 
    {
      while($producto = $result->fetch_object('Producto'))
      {
        $productos[] = $producto;
      }
    }

    return $productos;
  }

  public static function deleteProduct($id)
  {
    // logica para eliminar un producto
    $conn = DataBase::connect();

    $stmt = $conn->prepare("DELETE FROM productos WHERE PRODUCTO_ID=$id");
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }
}
