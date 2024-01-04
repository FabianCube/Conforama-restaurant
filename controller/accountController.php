<?php

/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'model/Pedido_ProductoDAO.php';
include_once 'model/Pedido_Producto.php';

class accountController
{
    /**
     * Si el ususario tiene cuenta creada, entrará aquí y tendrá acceso a sus datos personales.
     */
    public static function index()
    {
        setcookie('ultimo-pedido', '', time() - 3600);
        // Current user.
        $user = $_SESSION['current_user'];

        include_once 'view/nav.php';

        // compruebo si el usuario es cliente o admin.
        if ($_SESSION['current_user'] instanceof Cliente) {
            include_once 'view/account.php';
        } 
        else if ($_SESSION['current_user'] instanceof Admin) {
            $users = UsuariosDAO::getAllUsers();
            include_once 'view/accountAdmin.php';
        }
        include_once 'view/footer.php';

        

    }

    /**
     * Panel de resumen de pedidos de usuario.
     */
    public static function infoPedidos()
    {
        // Current user.
        $user = $_SESSION['current_user'];

        $userID = $_SESSION['current_user']->getUsuario_id();
        $infoPedido = PedidosDAO::getPedidoByUserId($userID);

        include_once 'view/nav.php';
        include_once 'view/infoPedidos.php';
        include_once 'view/footer.php';
    }

    /**
     * Panel de detalles de pedido de usuario.
     */
    public static function detallesPedido()
    {
        // Current user.
        $user = $_SESSION['current_user'];

        // Obtengo el pedido_id que quiero mostrar.
        $pedido_id = $_POST['pedidoId-detallesPedido'];

        // uso el pedido_id para obtener los productos del pedido.
        $pedido_producto = Pedido_ProductoDAO::getPedidoProductosById($pedido_id);

        include_once 'view/nav.php';
        include_once 'view/detallesPedido.php';
        include_once 'view/footer.php';
    }

    /**
     * Panel administrador para gestión de productos.
     */
    public static function productosAdmin()
    {
        $productos = ProductoDAO::getAllProducts();

        include_once 'view/nav.php';
        include_once 'view/accountAdminProductos.php';
        include_once 'view/footer.php';
    }

    public static function addNewProductAdmin()
    {
        include_once 'view/nav.php';
        include_once 'view/createProduct.php';
        include_once 'view/footer.php';
    }

    /**
     * Panel administrador para gestión de pedidos.
     */
    public static function pedidosAdmin()
    {
        $pedidos = PedidosDAO::getAllPedidos();

        include_once 'view/nav.php';
        include_once 'view/accountAdminPedidos.php';
        include_once 'view/footer.php';
    }

    public static function updateUser()
    {
        $userID = $_SESSION['current_user']->getUsuario_id();
        $nombre = $_POST['account-update-nombre'];
        $apellido = $_POST['account-update-apellido'];
        $email = $_POST['account-update-email'];;
        $tel = $_POST['account-update-tel'];
        $dir = $_POST['account-update-direccion'];

        // actualizar valores en base de datos.
        $update = UsuariosDAO::updateUserData($userID, $nombre, $apellido, $email, $tel, $dir);

        if (!$update) 
        {
            // actualizo los valores de la session para que se muestren automaticamente.
            $_SESSION['current_user']->setNombre_usuario($nombre);
            $_SESSION['current_user']->setApellido_usuario($apellido);
            $_SESSION['current_user']->setEmail($email);
            $_SESSION['current_user']->setTelefono($tel);
            $_SESSION['current_user']->setDireccion($dir);
        }
        
        // Direccion -> "Información cuenta".
        header("Location: " . URL . "?controller=account");
    }
}
