<?php

/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'config/dataBase.php';
include_once 'Modificacion.php';

class ModificacionDAO
{
    public static function getModificationById($id)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM modificacion WHERE modificacion_id = $id");
        $sql->execute();

        $result = $sql->get_result();

        $modificacion = $result->fetch_object('Modificacion');
        return $modificacion;
    }

    public static function saveModification($ingrediente_id, $accion, $cantidad_ingrediente, $precio_suplemento)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("INSERT INTO modificacion (ingrediente_id, accion, cantidad_ingrediente, precio_suplemento)
            VALUES ($ingrediente_id, $accion, $cantidad_ingrediente, $precio_suplemento)");
        $sql->execute();
        
    }
}