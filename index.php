<?php
include_once 'controller/productosController.php';
include_once 'controller/homeController.php';
include_once 'controller/cartController.php';
include_once 'controller/loginController.php';
include_once 'config/parameters.php';

if(!isset($_GET['controller']))
{
    // Default HOME
    header("Location:" . URL . '?controller=home');
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
        header("Location:".URL."?controller=home");
        echo 'ERROR: ' . $nombre_controller . ' no existe';
    }
}
