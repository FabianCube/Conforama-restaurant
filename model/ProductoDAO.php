<?php

/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'config/dataBase.php';
include_once 'Producto.php';
include_once 'Carrito.php';

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
    $result = $stmt->get_result();

    if ($result) {
      while ($producto = $result->fetch_object('Producto')) {
        $productos[] = $producto;
      }
    }

    return $productos;
  }

  public static function addNewProduct($nombre, $descripcion, $precio, $url_img, $categoria_id)
  {
    $conn = DataBase::connect();
    $sql = $conn->prepare("INSERT INTO productos(nombre_producto, descripcion, precio_producto, url_img, categoria_id) 
        VALUES('$nombre', '$descripcion', $precio, '$url_img', $categoria_id)");

    $sql->execute();
  }

  public static function modifyProduct($producto_id, $nombre_nuevo, $descripcion_nueva, $precio_nuevo, $categoria_id)
  {
    $conn = DataBase::connect();

    $stmt = $conn->prepare("UPDATE productos SET 
        nombre_producto='" . $nombre_nuevo . "', 
        descripcion='" . $descripcion_nueva . "',
        precio_producto=" . $precio_nuevo . ",
        categoria_id=" . $categoria_id . " WHERE producto_id = $producto_id");

    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
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
    $result = $stmt->get_result();

    if ($result) {
      while ($producto = $result->fetch_object('Producto')) {
        $productos[] = $producto;
      }
    }

    return $productos;
  }

  public static function getProductsByCategory($categoryId)
  {
    $conn = DataBase::connect();

    $stmt = $conn->prepare("SELECT * FROM productos WHERE categoria_id = $categoryId");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
      while ($producto = $result->fetch_object('Producto')) {
        $productos[] = $producto;
      }
    }

    return $productos;
  }
}
