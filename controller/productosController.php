<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'model/ProductoDAO.php';
include_once 'config/parameters.php';

class productosController
{
    /**
     * Página default para mostrar los productos.
     */
    public function index()
    {
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = array();
        } else {
            if(isset($_POST['producto_id']))
            {
                $repetido = false;
                foreach ($_SESSION['items'] as $key => $value) {
                    if($_POST['producto_id'] == $value->getProducto_carrito()->getProducto_id())
                    {
                        $repetido = true;
                        $productPos = $_SESSION['items'][$key];
                        $productPos->setCantidad($productPos->getCantidad()+1);
                    }
                }

                if(!$repetido)
                {
                    $pedido = new Carrito(ProductoDAO::getOneProduct($_POST['producto_id']));
                    array_push($_SESSION['items'], $pedido);
                }
            }
        }

        include_once 'view/nav.php';
        include_once 'view/comandPanel.php';
        include_once 'view/footer.php';
    }

    /**
     * Página de carrito de la compra
     */
    public function compra()
    {
        include_once 'view/nav.php';
        include_once 'view/cart.php';
        include_once 'view/footer.php';
    }
    
    public function modificar()
    {
        $producto_id = $_POST['id_producto_admin_panel'];
        $producto = ProductoDAO::getOneProduct($producto_id);

        include_once 'view/nav.php';
        include_once 'view/modifyPanel.php';
        include_once 'view/footer.php';
    }

    /**
     * Función que modifica un producto de la base de datos.
     */
    public static function updateProduct()
    {
        // compruebo si el administrador quiere eliminar o modificar el producto.
        if(isset($_POST['modificar-producto']))
        {
            $producto_id = $_POST['producto_id'];
            $nombre_nuevo = $_POST['nombre_producto'];
            $descripcion_nueva = $_POST['descripcion'];
            $precio_nuevo = $_POST['precio_producto'];
            $categoria_id = $_POST['categoria_id'];
    
            ProductoDAO::modifyProduct($producto_id, $nombre_nuevo, $descripcion_nueva, $precio_nuevo, $categoria_id);
        }
        else if(isset($_POST['eliminar-producto']))
        {
            $producto_id = $_POST["producto_id"];
            ProductoDAO::deleteProduct($producto_id);
        }

        header("Location:" . URL . "?controller=account&action=productosAdmin");
    }

    public static function sel()
    {
        session_start();

        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = array();
        } else {
            if(isset($_POST['id']))
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
        header("Location: " . URL);
    }
}
