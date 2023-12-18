<?php

include_once 'config/parameters.php';
include_once 'model/PedidosDAO.php';
include_once 'model/Pedido_Producto.php';
include_once 'model/Pedido_ProductoDAO.php';
include_once 'utils/calculadora.php';

class pedidoController
{
    public function index()
    { }

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
        $precio_total = calculadora::calcularPrecioTotal($_SESSION['items']);

        
        // Guardo la informacion del pedido en la base de datos..
        PedidosDAO::registrarPedido($user_id, EN_CURSO_ESTADO_PEDIDO, $date, $precio_total);
        $pedido = PedidosDAO::getLastPedidoByUserId($user_id);

        foreach ($_SESSION['items'] as $value) {
            // agregar cantidad de producto al constructor, default 1.
            Pedido_ProductoDAO::setPedidoProductos($pedido->getPedido_id(), $value->getProducto_carrito()->getProducto_id(), $value->getCantidad());
        }
        unset($_SESSION['items']);

        header("Location: " . URL);
    }
}
