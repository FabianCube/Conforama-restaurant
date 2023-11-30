<?php

include_once 'config/dataBase.php';
include_once 'Producto.php';
include_once 'Usuarios.php';
include_once 'Carrito.php';

class UsuariosDAO
{
    /**
     * Obtains all users from Database
     * @return: Array of Users from Database
     * @author: Faian Doizi
     */
    public static function getAllUsers()
    {
        $conn = DataBase::connect();

        $stmt = $conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($user = $result->fetch_object('Usuarios')) {
                $users[] = $user;
            }
        }
        return $users;
    }

    public static function deleteUserById($id)
    {
        $conn = DataBase::connect();

        $stmt = $conn->prepare("DELETE FROM usuarios WHERE usuario_id = $id");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public static function getOneUserById($id)
    {
        $conn = DataBase::connect();

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario_id = $id");
        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_object('Usuarios');
        return $user;
    }

    public static function registerUserAndStorage($name, $sndName, $email, $pwd, $tel, $dir)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare(" INSERT INTO usuarios (rol_id, nombre_usuario, apellido_usuario,
            email, password, telefono, direccion) VALUES (2, '$name', '$sndName', '$email', '$pwd', $tel, '$dir') ");

        if(!$sql->execute())
        {
            echo 'error';
        }

        mysqli_close($conn);
    }
}
