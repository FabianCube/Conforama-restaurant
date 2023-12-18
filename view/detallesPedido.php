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

    <link rel="stylesheet" href="assets/style/global.css">
    <link rel="stylesheet" href="assets/style/infoPedidos.css">
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
                <div class="row d-flex flex-row w-100">
                    <h3 class="title">DETALLES PEDIDO #<?= $pedido_id ?></h3>
                    <a href="<?= URL . "?controller=account&action=infoPedidos" ?>">< Volver a Información pedidos</a>
                </div>
                <hr style="margin-top: 0;">

                <table class="table">
                    <tr>
                        <th></th>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th></th>
                    </tr>
                    <?php foreach ($pedido_producto as $value) { ?>
                        <tr>
                            <td><img src="<?= image_url . ProductoDAO::getOneProduct($value->getProducto_id())->getUrl_img() ?>" alt="Imagen de producto" style="height: 40px; width: auto;"></td>
                            <td><?= ProductoDAO::getOneProduct($value->getProducto_id())->getNombre_producto() ?></td>
                            <td><?= $value->getCantidad() ?></td>
                            <td><?= ProductoDAO::getOneProduct($value->getProducto_id())->getPrecio_producto() ?>€</td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>

</body>

</html>