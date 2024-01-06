<?php

/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'config/dataBase.php';
include_once 'Productos_IngredientesDAO.php';

/**
 * Clase Productos_IngredientesDAO
 * - Gestiona los resultados de ingredientes - productos de la base de datos.
 */
class Productos_IngredientesDAO
{
    /**
     * getProductoIngredienteByProductoId()
     * @return: Un array de productos_ingredientes disponibles.
     */
    public static function getProductoIngredienteByProductoId($prod_id)
    {
        $conn = DataBase::connect();

        $sql = $conn->prepare("SELECT * FROM productos_ingredientes WHERE producto_id = $prod_id");
        $sql->execute();
        $result = $sql->get_result();

        if ($result) {
            while ($producto_ingrediente = $result->fetch_object('Productos_Ingredientes')) {
                $productos_ingredientes[] = $producto_ingrediente;
            }
        }

        return $productos_ingredientes;
    }
}
