<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/style/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="container pt-3" style="margin-top: 90px; max-width: 1170px; min-height: 65vh;">
        <div class="row">
            <div class="col-4">
                <div class="list-group">
                    <a href="<?= URL . "?controller=account" ?>" class="list-group-item list-group-item-action">Mis datos</a>
                    <a href="<?= URL . "?controller=account&action=infoPedidos" ?>" class="list-group-item list-group-item-action">Información pedidos</a>
                    <a href="<?= URL . "?controller=login&action=logout" ?>" class="list-group-item list-group-item-action">
                        <span style="color: red;">Cerrar sesión</span>
                    </a>
                </div>
            </div>
            <div class="col-8">
                <?php

                if (PedidosDAO::getPedidoByUserId($_SESSION['current_user']->getUsuario_id()) != null)
                {
                    $userID = $_SESSION['current_user']->getUsuario_id();

                    $infoPedido = Pedido_ProductoDAO::getAllPedidos_productosByUserID($userID);
                    
                    foreach ($infoPedido as $value) {
                        echo "Pedido ID -> " . $value->getPedido_id() . " ";
                        echo "Producto id -> " . $value->getProducto_id() . "<br>";
                        echo "Nombre producto -> " . ProductoDAO::getOneProduct($value->getProducto_id())->getNombre_producto() . "<br>";
                        echo "------------<br>";
                    }
                    
                } 
                else 
                {
                    echo 'Este usuario no tiene pedidos!';
                }
                ?>
                <p>ALGO</p>
            </div>
        </div>
    </section>

</body>

</html>