<?php

include_once 'model/UsuariosDAO.php';

class loginController
{
    public function index()
    {
        session_start();
        include_once 'view/nav.php';
        include_once 'view/login.php';
        include_once 'view/footer.php';
    }

    public static function login()
    {
        // get the email and password

        // check if the data exist in the db

        // redirect to the account
    }
}