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
        include_once 'view/nav.php';

        // compruebo si el usuario es admin.
        if($_SESSION['current_user']->getRol_id() != 0)
        {
            include_once 'view/account.php';
        }
        else
        {
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
        $productos= ProductoDAO::getAllProducts();
        
        include_once 'view/nav.php';
        include_once 'view/accountAdminProductos.php';
        include_once 'view/footer.php';
    }

    /**
     * Panel administrador para gestión de pedidos.
     */
    public static function pedidosAdmin()
    {
        $pedidos= PedidosDAO::getAllPedidos();
        
        include_once 'view/nav.php';
        include_once 'view/accountAdminPedidos.php';
        include_once 'view/footer.php';
    }
}