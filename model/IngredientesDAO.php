<?php

/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'config/dataBase.php';
include_once 'Ingredientes.php';

/**
 * Accede a la informacion en base de datos de los ingredientes.
 */
class IngredientesDAO
{
    /**
     * @return: Un array con los ingredientes disponibles.
     */
    public static function getAllIngredients()
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM ingredientes");
        $sql->execute();

        $result = $sql->get_result();

        if($result)
        {
            while($ingrediente = $result->fetch_object('Ingredientes'))
            {
                $ingredientes[] = $ingrediente;
            }
        }

        return $ingredientes;
    }
}
