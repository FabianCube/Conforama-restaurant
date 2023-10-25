<?php
include_once 'controller/pedidoController.php';
include_once 'controller/productosController.php';
include_once 'config/parameters.php';

if(!isset($_GET['controller']))
{
    // si no se pasa nada se mostrará pagina principal de pedidos.
    header("Location:" . URL . '?controller=productos');
}
else
{
    $nombre_controller = $_GET['controller'] . 'Controller';

    if (class_exists($nombre_controller))
    {
        // miramos si nos pasa una accion
        // en caso contrario mostramos accion por defecto

        $controller = new $nombre_controller;

        if (isset($_GET['action']))
        {
            $action = $_GET['action'];
        }
        else
        {
            $action = action_default;
        }

        $controller->$action();
    }
    else
    {
        header("Location:".URL."?controller=productos");
        echo $nombre_controller . ' no existe';
    }
}


?>