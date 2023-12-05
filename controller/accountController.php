<?php

class accountController
{
    public static function index()
    {
        session_start();
        include_once 'view/nav.php';
        include_once 'view/account.php';
        include_once 'view/footer.php';
    }

    public static function infoPedidos()
    {
        session_start();
        include_once 'view/nav.php';
        include_once 'view/infoPedidos.php';
        include_once 'view/footer.php';
    }
}