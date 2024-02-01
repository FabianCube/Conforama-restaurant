<?php

include_once __DIR__ . '/../model/OpinionesDAO.php';
include_once __DIR__ . '/../model/UsuariosDAO.php';
include_once __DIR__ . '/../model/PedidosDAO.php';

class APIController
{
    public function api()
    {
        // comprobar si el metodo accion se ha pasado correctamente.
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
                    "fecha_opinion" => $opinion->getFecha_opinion()
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
            
            if($_SESSION['current_user'] != null)
            {
                $usuario_id = $_SESSION['current_user']->getUsuario_id();
                $titulo_opinion = $_POST['titulo_opinion'];
                $texto_opinion = $_POST['texto_opinion'];
                $puntuacion_opinion = $_POST['puntuacion_opinion'];
                $fecha_opinion = $_POST['fecha_opinion'];    
                $result = OpinionesDAO::insertOpinion($usuario_id, $titulo_opinion, $texto_opinion, $puntuacion_opinion, $fecha_opinion);    
            }
            else
            {
                echo 'No hay una sesion iniciada para publicar una review';
            }
            return;
        }
        else if($accion == 'isLogged')
        {
            header('Content-Type: application/json');

            if(isset($_SESSION['current_user']))
            {
                $usuario_id = $_SESSION['current_user']->getUsuario_id();
                $user = UsuariosDAO::getOneUserById($usuario_id);
                $pedidos = PedidosDAO::getPedidoByUserId($usuario_id);

                foreach ($pedidos as $pedido) {
                    $id_pedidos[] = $pedido->getPedido_id();
                }

                $pedidosToJSON = json_encode($id_pedidos);

                $output = [
                    "usuario_id"      => $user->getUsuario_id(),
                    "rol_id"          => $user->getRol_id(),
                    "nombre_usuario"  => $user->getNombre_usuario(),
                    "apellido_usuairo"=> $user->getApellido_usuario(),
                    "email"           => $user->getEmail(),
                    "telefono"        => $user->getTelefono(),
                    "direccion"       => $user->getDireccion(),
                    "id_pedidos"      => $pedidosToJSON
                ];

                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                return;
            }
            else
            {
                $output = [
                    "usuario_id"      => null,
                    "rol_id"          => null,
                    "nombre_usuario"  => null,
                    "apellido_usuairo"=> null,
                    "email"           => null,
                    "telefono"        => null,
                    "direccion"       => null,
                    "id_pedidos"      => null
                ];

                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                return;
            }
        }
    }
}
