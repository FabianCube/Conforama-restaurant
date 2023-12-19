<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'model/ProductoDAO.php';

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

        include_once 'view/nav.php';
        include_once 'view/cart.php';
        include_once 'view/footer.php';
    }

    public function pagar()
    {
        include_once 'view/nav.php';
        include_once 'view/pagar.php';
        include_once 'view/footer.php';
    }

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
