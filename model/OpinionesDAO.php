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
}
