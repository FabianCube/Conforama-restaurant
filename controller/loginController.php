<?php

include_once 'model/UsuariosDAO.php';

class loginController
{
    public function index()
    {
        session_start();
        include_once 'view/nav.php';

        if (isset($_SESSION['current_user'])) {
            include_once 'view/account.php';
        } else {
            include_once 'view/login.php';
        }
        include_once 'view/footer.php';
    }

    public static function login()
    {
        if (isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $pwd = $_POST['password'];

            $users = UsuariosDAO::getAllUsers();
            foreach ($users as $value) {
                if (hash_equals($value->getEmail(), $email)) {
                    if (hash_equals($value->getPassword(), $pwd)) {
                        session_start();
                        $_SESSION['current_user'] = $value;

                        // if($_POST['save_session'] == true)
                        // {
                        //     setcookie("keep_session", $_SESSION['current_user'], time()-3600);
                        // }
                    } else {
                        echo 'Contraseña incorrecta!';
                    }
                } else {
                    echo 'El correo no existe!';
                }
            }
        }
        header("Location: " . URL);
    }

    public static function logout()
    {
        session_start();
        unset($_SESSION['current_user']);
        header("Location: " . URL);
    }
}
