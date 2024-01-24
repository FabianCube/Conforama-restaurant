<?php

include_once 'model/Opiniones.php';

class OpinionesDAO
{
    public static function getAllOpiniones()
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM opiniones");
        $sql->execute();

        $result = $sql->get_result();

        if ($result) 
        {
            while ($opinion = $result->fetch_object("Opiniones")) {
                $opiniones[] = $opinion;
            }
        }

        return $opiniones;
    }

    public static function insertOpinion($usr_id, $titulo, $opinion, $puntuacion, $fecha_opinion)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("INSERT INTO opiniones(usuario_id, titulo, opinion, puntuacion, fecha_opinion) 
            VALUES($usr_id, '$titulo', '$opinion', $puntuacion, '$fecha_opinion')");
        
        $sql->execute();
    }
}
