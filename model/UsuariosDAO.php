<?php

/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'config/dataBase.php';
include_once 'Producto.php';
include_once 'Usuarios.php';
include_once 'Cliente.php';
include_once 'Admin.php';
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

        //! -------------------------------
        //! HOT FIX for herence implemented.

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE rol_id = 2");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($user = $result->fetch_object('Cliente')) {
                $users[] = $user;
            }
        }

        $stmt2 = $conn->prepare("SELECT * FROM usuarios WHERE rol_id = 0");
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2) {
            while ($user2 = $result2->fetch_object('Admin')) {
                $users[] = $user2;
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

        if (!$sql->execute()) {
            echo 'error';
        }

        mysqli_close($conn);
    }

    public static function updateUserData($user_id, $name, $sndName, $email, $tel, $dir)
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("UPDATE usuarios SET nombre_usuario = '$name', apellido_usuario = '$sndName',
            email = '$email', telefono = $tel, direccion = '$dir' WHERE usuario_id = $user_id");

        if (!$sql->execute()) {
            return false;
        }

        mysqli_close($conn);
    }

    public static function getUserPoints($uid)
    {
        $conn = DataBase::connect();

        $stmt = $conn->prepare("SELECT puntos FROM usuarios WHERE usuario_id = $uid");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
}
