<?php
include_once 'config/dataBase.php';
include_once 'Producto.php';

/**
 * Clase ProductoDAO
 * - Gestiona la informacón para manipularla en SQL.
 */
class ProductoDAO
{
  /**
   * getAllProducts()
   * @return: Un array de productos disponibles.
   */
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

    $stmt = $conn->prepare("DELETE FROM productos WHERE producto_id=$id");
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

  public static function getOneProduct($id)
  {
    $conn = DataBase::connect();

    $stmt = $conn->prepare("SELECT * FROM productos WHERE producto_id=$id");
    $stmt->execute();
    $result = $stmt->get_result();

    $producto = $result->fetch_object('Producto');

    return $producto;
  }

  public static function getPromotedProducts()
  {
    $conn = DataBase::connect();

    $stmt = $conn->prepare("SELECT * FROM productos WHERE producto_id IN (1, 2, 3, 6, 7)");
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
}
