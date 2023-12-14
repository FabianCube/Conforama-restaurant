<?php
include_once 'model/ProductoDAO.php';
include_once 'config/parameters.php';

class homeController
{
    public function index()
    {
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = array();
        } else {
            if (isset($_POST['id'])) 
            {
                $repetido = false;
                foreach ($_SESSION['items'] as $key => $value) {
                    if($_POST['id'] == $value->getProducto_carrito()->getProducto_id())
                    {
                        $repetido = true;
                        $productPos = $_SESSION['items'][$key];
                        $productPos->setCantidad($productPos->getCantidad()+1);
                    }
                }

                if(!$repetido)
                {
                    $pedido = new Carrito(ProductoDAO::getOneProduct($_POST['id']));
                    array_push($_SESSION['items'], $pedido);
                }
            }
        }

        $productos = ProductoDAO::getPromotedProducts();

        include_once 'view/nav.php';
        include_once 'view/header.php';
        include_once 'view/home.php';
        include_once 'view/footer.php';
    }

    public function compra()
    {
        echo 'Pagina de compra';
    }
}