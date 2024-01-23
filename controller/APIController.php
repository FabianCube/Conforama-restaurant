<?php

include_once __DIR__ . '/../model/OpinionesDAO.php';
include_once __DIR__ . '/../model/UsuariosDAO.php';

class APIController
{
    public function api()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $accion = isset($_POST['accion']) ? $_POST['accion'] : null;
        }

        if ($accion == 'buscar_pedido')
        {
            header('Content-Type: application/json');
            $allOpiniones = OpinionesDAO::getAllOpiniones();

            foreach ($allOpiniones as $opinion) {
                $user = UsuariosDAO::getOneUserById($opinion->getUsuario_id());
                // Preparo el array para codificarlo para json
                $opiniones = [
                    "opinion_id"    => $opinion->getOpinion_id(),
                    "usuario_id"    => $opinion->getUsuario_id(),
                    "username"      => $user->getNombre_usuario(),
                    "lastname"      => $user->getApellido_usuario(),
                    "titulo"        => $opinion->getTitulo(),
                    "opinion"       => $opinion->getOpinion(),
                    "puntuacion"    => $opinion->getPuntuacion(),
                    "fecha_opinion" => $opinion->getFecha_opinion(),
                ];
                $result_opiniones[] = $opiniones;
            }

            // codifico las opiniones en formato json.
            echo json_encode($result_opiniones, JSON_UNESCAPED_UNICODE);
            return;
        } 
        else if ($accion == 'add_review') 
        {
            header('Content-Type: application/json');
            $opinion = $_POST['titulo_opinion'];

            echo $opinion;
            return;
        }
    }
}
