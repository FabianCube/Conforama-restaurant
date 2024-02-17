<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'config/parameters.php';
include_once 'model/PedidosDAO.php';
include_once 'model/Pedido_Producto.php';
include_once 'model/Pedido_ProductoDAO.php';
include_once 'utils/calculadora.php';

class pedidoController
{
    public function index()
    {
        
    }

    /**
     * Página para registrarse o loggearse antes de poder realizar el pedido.
     * 
     * En el caso de que no haya una sesión iniciada, te mandará a la página para poder
     * registrarte o loggearte.
     */
    public function loginOrRegister()
    {
        if (!isset($_SESSION['current_user'])) {
            include_once 'view/createOrRegister.php';
        } else {
            header("Location: " . URL . "?controller=cart&action=pagar");
        }
    }

    /**
     * Método que gestiona un pedido, lo guardará en la BBDD y borrará la sesión con los 
     * productos del carrito.
     */
    public static function realizarPedido()
    {
        $user_id = $_SESSION['current_user']->getUsuario_id();
        $date = date('Y-m-d H:i:s');
        $propina = 0;

        // incluir un if isset discountedPrice, $precio_total tiene el valor descontado.
        // GUARDAR PRECIO TOTAL CON DESCUENTO
        if(isset($_SESSION['discount-applied']))
        {
            if($_SESSION['discount-applied'] !== "null")
            {
                $precio_total = $_SESSION['discount-applied'];
            }
            else{
                $precio_total = calculadora::calcularPrecioTotal($_SESSION['items']);
            }
        }
        else
        {
            $precio_total = calculadora::calcularPrecioTotal($_SESSION['items']);
        }

        if(isset($_SESSION['propina']))
        {
            if($_SESSION['propina'] != "null")
            {
                $propina = $_SESSION['propina'];
                $precio_total += $propina;
            }
        }

        // Guardo la informacion del pedido en la base de datos..
        PedidosDAO::registrarPedido($user_id, EN_CURSO_ESTADO_PEDIDO, $date, $precio_total, $propina);
        $pedido = PedidosDAO::getLastPedidoByUserId($user_id);

        foreach ($_SESSION['items'] as $value) {
            // agregar cantidad de producto al constructor, default 1.
            Pedido_ProductoDAO::setPedidoProductos($pedido->getPedido_id(), $value->getProducto_carrito()->getProducto_id(), $value->getCantidad());
        }
        setcookie('ultimo-pedido', $pedido->getPrecio_total(), time() + 3600);

        // elimino el descuento del pedido.
        unset($_SESSION['discount-applied']);
        
        header("Location: " . URL . "?controller=pedido&action=showQR");
    }

    public static function showQR()
    {
        $uid = $_SESSION['current_user']->getUsuario_id();
        include_once 'view/nav.php';
        include_once 'view/mostrarQR.php';
        include_once 'view/footer.php'; 

        unset($_SESSION['items']);
    }

    public static function infoQRpedido()
    {
        $pedido = PedidosDAO::getLastPedidoByUserId($_GET['uid']);
        include_once 'view/nav.php';
        include_once 'view/infoQRpedido.php';
        include_once 'view/footer.php';
    }
}
