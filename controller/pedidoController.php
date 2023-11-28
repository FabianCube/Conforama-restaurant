<?php

class pedidoController
{
    public function index()
    { }

    public function loginOrRegister()
    {
        session_start();
        if(!isset($_SESSION['current_user']))
        {
            include_once 'view/createOrRegister.php';
        }
        else
        {
            header("Location: " . URL . "?controller=cart&action=pagar");
        }
    }

    public static function realizarPedido()
    {
        session_start();
        $user = $_SESSION['current_user'];
        $productos = $_SESSION['items'];
    }
}