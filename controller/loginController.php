<?php

include_once 'model/UsuariosDAO.php';

class loginController
{
    public function index()
    {
        $users = UsuariosDAO::getAllUsers();
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
        if ($_SERVER['HTTP_REFERER'] == URL . "?controller=login") {
            header("Location: " . URL);
        } else {
            // modificar URL cuando procesar pedido esté listo.
            header("Location: " . URL . "?controller=cart&action=pagar");
        }
    }

    public static function logout()
    {
        session_start();
        unset($_SESSION['current_user']);
        header("Location: " . URL);
    }

    public static function register()
    {
        session_start();
        include_once 'view/nav.php';
        include_once 'view/register.php';
        include_once 'view/footer.php';
    }

    public static function registerUser()
    {
        if (isset(
            $_POST['register-email'],
            $_POST['register-password'],
            $_POST['register-nombre'],
            $_POST['register-apellidos'],
            $_POST['register-telefono'],
            $_POST['register-direccion']
        )) {
            UsuariosDAO::registerUserAndStorage(
                $_POST['register-nombre'],
                $_POST['register-apellidos'],
                $_POST['register-email'],
                $_POST['register-password'],
                (int)$_POST['register-telefono'],
                $_POST['register-direccion']
            );
        }


        if ($_SERVER['HTTP_REFERER'] == URL . "?controller=login&action=register") 
        {
            header("Location: " . URL . "?controller=login");
        } 
        else 
        {
            $_POST['email'] = $_POST['register-email'];
            $_POST['password'] = $_POST['register-password'];

            $email = $_POST['email'];
            $pwd = $_POST['password'];

            $users = UsuariosDAO::getAllUsers();
            foreach ($users as $value) {
                if (hash_equals($value->getEmail(), $email)) {
                    if (hash_equals($value->getPassword(), $pwd)) {
                        session_start();
                        $_SESSION['current_user'] = $value;
                    } else {
                        echo 'Contraseña incorrecta!';
                    }
                } else {
                    echo 'El correo no existe!';
                }
            }

            header("Location: " . URL . "?controller=cart&action=pagar");
        }
    }
}
