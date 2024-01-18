<?php

include_once __DIR__ . '/../model/OpinionesDAO.php';

class APIController
{
    public function api()
    {
        header('Content-Type: application/json');
        $allOpiniones = OpinionesDAO::getAllOpiniones();

        foreach ($allOpiniones as $opinion) 
        {
            // Preparo el array para codificarlo para json
            $opiniones = [
                "opinion_id"    => $opinion->getOpinion_id(),
                "usuario_id"    => $opinion->getUsuario_id(),
                "opinion"       => $opinion->getOpinion(),
                "puntuacion"    => $opinion->getPuntuacion(),
                "fecha_opinion" => $opinion->getFecha_opinion()
            ];
        }

        // codifico las opiniones en formato json.
        echo json_encode($opiniones, JSON_UNESCAPED_UNICODE);
        return;
    }
}
