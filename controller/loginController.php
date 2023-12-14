<?php

include_once 'model/UsuariosDAO.php';

class loginController
{
    /**
     * Página default para iniciar sesión/registrarse en la web o acceder a la información 
     * del usuario.
     * 
     * En el caso de que esté la sesión iniciada se mandará al usuario a la página de su cuenta,
     * si el usuario no ha iniciado sesión, se mostrará la posibilidad de crear o acceder a una cuenta.
     */
    public function index()
    {
        $users = UsuariosDAO::getAllUsers();
        setcookie("error_login", "false", time()+60);
        include_once 'view/nav.php';

        if (isset($_SESSION['current_user'])) {
            header("Location: " . URL . "?controller=account");
        } else {
            include_once 'view/login.php';
        }
        include_once 'view/footer.php';
    }

    /**
     * Página de login.
     */
    public static function login()
    {
        // preparo el error.
        $error = false;

        if (isset($_POST['email'], $_POST['password'])) 
        {
            $email = $_POST['email'];
            $pwd = $_POST['password'];

            $users = UsuariosDAO::getAllUsers();
            foreach ($users as $value) 
            {
                if (hash_equals($value->getEmail(), $email)) 
                {
                    // uso el password_verify para desencriptar la contraseña.
                    if (password_verify($pwd, $value->getPassword())) 
                    {
                        $_SESSION['current_user'] = $value;

                        // si el ususario a marcado la casilla de mantener sesión iniciada, se guarda en una cookie el id
                        // del usuario para iniciar sesión automáticamente cuando vuelva a entrar.
                        if($_POST['save_session'] == true)
                        {
                            setcookie("mantener_sesion_iniciada", $_SESSION['current_user']->getUsuario_id(), time() + 3600);
                        }
                        $error = false;
                    }
                    else 
                    {
                        $error = true;
                        echo 'Contraseña incorrecta!';
                    }
                } 
                else 
                {
                    $error = true;
                    echo 'El correo no existe!';
                }
            }
        }

        if ($error == false) 
        {
            if ($_SERVER['HTTP_REFERER'] == URL . "?controller=login") 
            {
                header("Location: " . URL);
            } 
            else 
            {
                header("Location: " . URL . "?controller=cart&action=pagar");
            }
        }
        else
        {
            header("Location: " . URL . "?controller=login");
        }
    }

    /**
     * Método de cierre se sesión.
     */
    public static function logout()
    {
        // Eliminamos la sesion
        unset($_SESSION['current_user']);
        // Eliminamos el mantener sesion iniciada
        setcookie("mantener_sesion_iniciada", '', time() - 3600);
        // Redirigir a main page
        header("Location: " . URL);
    }

    /**
     * Página de registro.
     */
    public static function register()
    {
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

            $pwd = password_hash($_POST['register-password'], PASSWORD_DEFAULT);

            UsuariosDAO::registerUserAndStorage(
                $_POST['register-nombre'],
                $_POST['register-apellidos'],
                $_POST['register-email'],
                $pwd,
                (int)$_POST['register-telefono'],
                $_POST['register-direccion']
            );
        }


        if ($_SERVER['HTTP_REFERER'] == URL . "?controller=login&action=register") 
        {
            header("Location: " . URL . "?controller=login");
        } 
        else if($_SERVER['HTTP_REFERER'] == URL . "?controller=pedido&action=loginOrRegister") 
        {
            $_POST['email'] = $_POST['register-email'];
            $_POST['password'] = $_POST['register-password'];

            $email = $_POST['email'];
            $pwd = $_POST['password'];

            $users = UsuariosDAO::getAllUsers();
            foreach ($users as $value) 
            {
                if (hash_equals($value->getEmail(), $email)) {
                    if (password_verify($pwd, $value->getPassword())) {
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
