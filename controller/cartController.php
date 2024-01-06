<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'model/ProductoDAO.php';
include_once 'model/IngredientesDAO.php';
include_once 'model/Productos_IngredientesDAO.php';
include_once 'config/parameters.php';

class cartController
{
    public function index()
    {
        if (isset($_POST['posProductCart'])) 
        {
            // obtengo la posicion en el SESSION del producto que hay que eliminar
            $pos = $_POST["posProductCart"];
            // elimino el producto
            unset($_SESSION['items'][$pos]);
            // reindexar el array
            $_SESSION['items'] = array_values($_SESSION['items']);
        }

        if(isset($_POST['Add']))
        {
            $pos = $_POST["Add"];
            $productPos = $_SESSION['items'][$pos];
            $productPos->setCantidad($productPos->getCantidad()+1);
        }
        else if(isset($_POST['Del']))
        {
            $pos = $_POST["Del"];
            $productPos = $_SESSION['items'][$pos];
            if($productPos->getCantidad() > 1)
            {
                $productPos->setCantidad($productPos->getCantidad()-1);
            }
        }

        //? Mostrar valor ingredientes modificados en caso de que los tenga.
        if(isset($_SESSION['ingredientes-valor-extra']))
        {
            $extraValue = $_SESSION['ingredientes-valor-extra'];
        }

        include_once 'view/nav.php';
        include_once 'view/cart.php';
        include_once 'view/footer.php';
    }

    /**
     * Página para pagar los productos.
     */
    public function pagar()
    {
        include_once 'view/nav.php';
        include_once 'view/pagar.php';
        include_once 'view/footer.php';
    }

    public static function modificarIngredientes()
    {
        $producto_id = $_POST['modificar-producto-id'];

        $ingredientes = Productos_IngredientesDAO::getProductoIngredienteByProductoId($producto_id);
        
        // ingredientes que pueden ser modificados según el producto.
        foreach ($ingredientes as $value) {
            $ingredientes_producto[] = IngredientesDAO::getIngredientById($value->getIngrediente_id());
        }

        $_SESSION['ingredientes-valor-extra'] = 10;

        include_once 'view/modificarIngredientes.php';
    }

    public static function gestionModificacion()
    {
        $cantidad = $_POST['cantidad_ingrediente'];
        $precio = $_POST['precio_ingrediente'];

        header("Location: " . URL . "?controller=cart");
    }

    /**
     * Método para obtener el precio total de los productos en el carrito.
     */
    public static function getTotalValueOfProductsInCart()
    {
        $totalPrice = 0;

        if (isset($_SESSION['items'])) {
            foreach ($_SESSION['items'] as $value) {
                $totalPrice += $value->getProducto_carrito()->getPrecio_producto() * $value->getCantidad();
            }
        }

        return $totalPrice;
    }

    public static function getIVAOfProduct()
    {
        $totalPrice = 0;

        if (isset($_SESSION['items'])) {
            foreach ($_SESSION['items'] as $value) {
                $totalPrice += $value->getProducto_carrito()->getPrecio_producto() * $value->getCantidad();
            }
        }
        $iva = $totalPrice * 0.10;

        // truncate = bcdiv()
        return bcdiv($iva, 1, 2);
    }

    public static function getPriceWithoutIVA()
    {
        $totalPrice = 0;

        if (isset($_SESSION['items'])) {
            foreach ($_SESSION['items'] as $value) {
                $totalPrice += $value->getProducto_carrito()->getPrecio_producto() * $value->getCantidad();
            }
        }
        $iva = $totalPrice * 0.10;

        $r = $totalPrice - $iva;
        return bcdiv($r, 1, 2);
    }

}
