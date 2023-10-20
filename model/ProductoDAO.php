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
              "<br> - Nombre producto: " . $row["NOMBRE_PRODUCTO"]. 
              "<br> - Descripcion: " . $row["DESCRIPCION"]. 
              "<br> - Precio producto: " . $row["PRECIO_PRODUCTO"].
              "<br> - Categoria id: " . $row["CATEGORIA_ID"]."<br>";
            }
          } 
          else 
          {
            echo "0 results";
          }

          $conn->close();
    }
}