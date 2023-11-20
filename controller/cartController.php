<?php
include_once 'model/ProductoDAO.php';

class cartController
{
    public function index()
    {
        session_start();
        include_once 'view/nav.php';
        include_once 'view/cart.php';
        include_once 'view/footer.php';
    }

    public static function getTotalValueOfProductsInCart()
    {
        $totalPrice = 0;

        if (isset($_SESSION['items'])) {
            foreach ($_SESSION['items'] as $value) {
                $totalPrice += $value->getProducto_carrito()->getPrecio_producto();
            }
        }

        return $totalPrice;
    }

    public static function getIVAOfProduct()
    {
        $totalPrice = 0;

        if (isset($_SESSION['items'])) {
            foreach ($_SESSION['items'] as $value) {
                $totalPrice += $value->getProducto_carrito()->getPrecio_producto();
            }
        }
        $iva = $totalPrice * 0.21;

        // truncate = bcdiv()
        return bcdiv($iva, 1, 2);
    }

    public static function getPriceWithoutIVA()
    {
        $totalPrice = 0;

        if (isset($_SESSION['items'])) {
            foreach ($_SESSION['items'] as $value) {
                $totalPrice += $value->getProducto_carrito()->getPrecio_producto();
            }
        }
        $iva = $totalPrice * 0.21;

        $r = $totalPrice - $iva;
        return bcdiv($r, 1, 2);
    }

    public static function eliminar()
    {
        $producto_id = $_POST["productIdCart"];
        

        foreach ($$_SESSION['items'] as $value) {
            if($value->getProducto_carrito()->getProducto_id() == $producto_id)
            {
                //$value.unset($this);
            }
        }

        header("Location:" . URL);
    }
}