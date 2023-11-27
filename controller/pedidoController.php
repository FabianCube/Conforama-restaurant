<?php

class pedidoController
{
    public function index()
    {

    }

    public function loginOrRegister()
    {
        session_start();
        //include_once 'view/nav.php';
        include_once 'view/createOrRegister.php';
        //include_once 'view/footer.php';
    }
}