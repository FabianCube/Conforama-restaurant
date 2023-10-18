<?php
include_once 'config/dataBase.php';

class ProductoDAO
{
    public static function getAllProducts()
    {
        $conn = DataBase::connect();
        $sql = "SELECT * FROM productos";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
              echo "id: " . $row["PRODUCTO_ID"]. 
              " - Nombre producto: " . $row["NOMBRE_PRODUCTO"]. 
              " - Descripcion: " . $row["DESCRIPCION"]. 
              " - Precio producto: " . $row["PRECIO_PRODUCTO"].
              " - Categoria id: " . $row["CATEGORIA_ID"]."<br>";
            }
          } 
          else 
          {
            echo "0 results";
          }

          $conn->close();
    }
}