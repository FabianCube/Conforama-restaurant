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
                <div class="row p-1">
                    <h3>Información pedidos</h3>
                </div>
                <?php if (Pedido_ProductoDAO::pedidoExistsWithUserID($userID)) { ?>

                    <table class="table">
                        <tr>
                            <th>PEDIDO #</th>
                            <th>FECHA</th>
                            <th>TOTAL DEL PEDIDO</th>
                            <th>ESTADO</th>
                        </tr>
                    <?php foreach ($infoPedido as $value) { ?>
                        <tr>
                            <td>0000<?=$value->getPedido_id()?></td>
                            <td><?=PedidosDAO::getPedidoByID($value->getPedido_id())->getHora_pedido() ?></td>
                            <td><?=ProductoDAO::getOneProduct($value->getProducto_id())->getPrecio_producto() ?>€</td>
                            <td><?=PedidosDAO::getPedidoByID($value->getPedido_id())->getEstado() ?></td>
                        </tr>
                    <?php }
                    } else {
                        echo 'Este usuario no tiene pedidos!';
                    }
                    ?>
                    </table>
            </div>
        </div>
    </section>

</body>

</html>