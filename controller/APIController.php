<?php

include_once __DIR__ . '/../model/OpinionesDAO.php';
include_once __DIR__ . '/../model/UsuariosDAO.php';
include_once __DIR__ . '/../model/PedidosDAO.php';
include_once __DIR__ . '/../model/ProductoDAO.php';
include_once __DIR__ . '/../utils/conversor_puntos.php';
include_once __DIR__ . '/../controller/cartController.php';


class APIController
{
    public function api()
    {
        $accion = null;

        // comprobar si el metodo accion se ha pasado correctamente.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = isset($_POST['accion']) ? $_POST['accion'] : null;
        }

        switch ($accion) {
            case 'buscar_pedido':
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
                break;
            case 'add_review':
                header('Content-Type: application/json');

                if ($_SESSION['current_user'] != null) {
                    $usuario_id = $_SESSION['current_user']->getUsuario_id();
                    $titulo_opinion = $_POST['titulo_opinion'];
                    $texto_opinion = $_POST['texto_opinion'];
                    $puntuacion_opinion = $_POST['puntuacion_opinion'];
                    $fecha_opinion = $_POST['fecha_opinion'];

                    $result = OpinionesDAO::insertOpinion($usuario_id, $titulo_opinion, $texto_opinion, $puntuacion_opinion, $fecha_opinion);

                    $opinion = [
                        "usuario_id" => $usuario_id,
                        "titulo_opinion" => $titulo_opinion,
                        "texto_opinion" => $texto_opinion,
                        "puntuacion_opinion" => $puntuacion_opinion,
                        "fecha_opinion" => $fecha_opinion
                    ];

                    echo json_encode($opinion);
                } else {
                    echo 'No hay una sesion iniciada para publicar una review';
                }

                break;
            case 'isLogged':
                header('Content-Type: application/json');

                if (isset($_SESSION['current_user'])) {
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
                        "apellido_usuairo" => $user->getApellido_usuario(),
                        "email"           => $user->getEmail(),
                        "telefono"        => $user->getTelefono(),
                        "direccion"       => $user->getDireccion(),
                        "id_pedidos"      => $pedidosToJSON,
                        "pedidos_reviwed" => []
                    ];

                    echo json_encode($output, JSON_UNESCAPED_UNICODE);
                } else {
                    $output = [
                        "usuario_id"      => null,
                        "rol_id"          => null,
                        "nombre_usuario"  => null,
                        "apellido_usuairo" => null,
                        "email"           => null,
                        "telefono"        => null,
                        "direccion"       => null,
                        "id_pedidos"      => null
                    ];

                    echo json_encode($output, JSON_UNESCAPED_UNICODE);
                }
                break;
            case 'availablePedidos':

                header('Content-Type: application/json');

                $user_id = $_SESSION['current_user']->getUsuario_id();
                $pedidos = PedidosDAO::getPedidosSinOpinionByUserId($user_id);

                $response = [
                    "success" => "true",
                    "pedidos" => $pedidos
                ];

                echo json_encode($response, JSON_UNESCAPED_UNICODE);

                break;

            case 'updateAvailablePedidos':
                header('Content-Type: application/json');

                break;

            case 'getPoints':
                header('Content-Type: application/json');

                if (isset($_SESSION['current_user'])) {
                    $uid = $_SESSION['current_user']->getUsuario_id();
                } else {
                    $uid = null;
                }

                $data = UsuariosDAO::getOneUserById($uid);

                if ($data instanceof Cliente) {
                    $return = [
                        "success" => "true",
                        "uid" => $data->getUsuario_id(),
                        "puntos" => (int) $data->getPuntos()
                    ];

                    echo json_encode($return, JSON_UNESCAPED_UNICODE);
                } else {
                    $return = [
                        "success" => "false",
                        "uid" => "",
                        "puntos" => ""
                    ];

                    echo json_encode($return, JSON_UNESCAPED_UNICODE);
                }

                break;

            case 'addPoints':
                $uid = $_SESSION['current_user']->getUsuario_id();
                $points = $_POST['pts'];
                $current_points = UsuariosDAO::getOneUserById($uid)->getPuntos();
                $new_value = ($current_points + $points);

                UsuariosDAO::updateUserPoints($new_value, $uid);
                $balance = UsuariosDAO::getOneUserById($uid)->getPuntos();

                $return = [
                    "success" => "true",
                    "new_balance" => $balance
                ];

                echo json_encode($return, JSON_UNESCAPED_UNICODE);

                break;
            case 'removePoints':
                $uid = $_SESSION['current_user']->getUsuario_id();
                $points = $_POST['pts'];
                $current_points = UsuariosDAO::getOneUserById($uid)->getPuntos();
                $new_value = ($current_points - $points);

                if ($new_value < 0) {
                    $new_value = 0;
                }

                UsuariosDAO::updateUserPoints($new_value, $uid);
                $balance = UsuariosDAO::getOneUserById($uid)->getPuntos();

                $return = [
                    "success" => "true",
                    "new_balance" => $balance
                ];

                echo json_encode($return, JSON_UNESCAPED_UNICODE);

                break;
            case 'moneySpent':
                header('Content-Type: application/json');

                $uid = $_SESSION['current_user']->getUsuario_id();
                $spent = PedidosDAO::getLastPedidoByUserId($uid)->getPrecio_total();

                $pts = conversor_puntos::exchangeMoneyToPoints($spent);

                $output = [
                    "success" => "true",
                    "spent" => $pts
                ];

                echo json_encode($output, JSON_UNESCAPED_UNICODE);

                break;
            case 'pointsSpent':
                header('Content-Type: application/json');

                $uid = $_SESSION['current_user']->getUsuario_id();
                $pts = $_POST['points'];

                $eur = conversor_puntos::exchangePointsToDiscount($pts);

                $output = [
                    "success" => "true",
                    "money" => $eur
                ];

                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                break;
            case 'totalPriceNoDiscount':
                header('Content-Type: application/json');

                $uid = $_SESSION['current_user']->getUsuario_id();
                $total = cartController::getTotalValueOfProductsInCart();

                $output = [
                    "success" => "true",
                    "price" => $total
                ];

                echo json_encode($output, JSON_UNESCAPED_UNICODE);

                break;
            case 'updateCartPrice':

                if($_POST['precioFinal'] != "null")
                {
                    $value = $_POST['precioFinal'];
                    $_SESSION['discount-applied'] = floatval($value); // parsear float
                }
                else{
                    $value = cartController::getTotalValueOfProductsInCart();
                }

                if($_POST['propina'] != "0")
                {
                    $propina = $_POST['propina'];
                    $_SESSION['propina'] = floatval($propina); // parsear a float
                }

                $response = [
                    "success" => "true",
                    "finalPrice" => $value,
                    "propina" => $propina
                ];

                echo json_encode($response, JSON_UNESCAPED_UNICODE);

                break;
            case 'getProductos':

                $products = ProductoDAO::getAllProducts();

                $response = [];

                foreach ($products as $product) {
                    $response[] = [
                        "producto_id" => $product->getProducto_id(),
                        "nombre_producto" => $product->getNombre_producto(),
                        "descripcion" => $product->getDescripcion(),
                        "precio_producto" => $product->getPrecio_producto(),
                        "url_img" => $product->getUrl_img(),
                        "categoria_id" => $product->getCategoria_id()
                    ];
                }

                echo json_encode($response, JSON_UNESCAPED_UNICODE);
            
                break;
            case 'setPropina':
                $propina = $_POST['propina'];
                $_SESSION['propina'] = $propina;

                $response = [
                    "success" => "true",
                    "propina" => $propina
                ];

                echo json_encode($response);

                break;
            default:
                echo 'Parámetro POST [\'' . $accion . ' \'] no válido.';
        }
    }
}
