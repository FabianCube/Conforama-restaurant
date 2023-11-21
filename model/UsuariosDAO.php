<?php

include_once 'config/dataBase.php';
include_once 'Producto.php';
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
        $result=$stmt->get_result();

        if($result)
        {
            while($user = $result->fetch_object('Usuarios'))
            {
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
        $result=$stmt->get_result();

        return $result;
    }

    public static function getOneUserById($id)
    {
        $conn = DataBase::connect();
        
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario_id = $id");
        $stmt->execute();
        $result=$stmt->get_result();
        
        $user = $result->fetch_object('Usuarios');
        return $user;
    }
}