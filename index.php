<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'controller/productosController.php';
include_once 'controller/homeController.php';
include_once 'controller/cartController.php';
include_once 'controller/loginController.php';
include_once 'controller/pedidoController.php';
include_once 'controller/accountController.php';
include_once 'controller/opinionesController.php';
include_once 'config/parameters.php';


session_start();

// Si el usuario ha querido mantener sesión iniciada se ceará la sesion al entrar autmáticamente
if(isset($_COOKIE['mantener_sesion_iniciada']))
{
    $user_id = $_COOKIE['mantener_sesion_iniciada'];
    $_SESSION['current_user'] = UsuariosDAO::getOneUserById($user_id);
}

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
