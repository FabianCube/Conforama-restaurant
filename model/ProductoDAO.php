<?php
include_once 'config/dataBase.php';

class ProductoDAO
{
  public static function getAllProducts()
  {
    $conn = DataBase::connect();
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    $producto = new Producto();

    if ($result->num_rows > 0) 
    {
      while($producto = $result->fetch_object('Producto'))
      {
        $productos[] = $producto;
      }
    }

    return $productos;
  }
}
