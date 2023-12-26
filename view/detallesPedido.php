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
        <div class="col-12">
                <div class="d-flex align-items-center px-4 title-account">
                    <p class="account-name">Nombre: <?= $user->getNombre_usuario() . " " . $user->getApellido_usuario() ?></p>
                </div>
            </div>
            <div class="col-3">
                <div class="py-3 d-flex justify-content-center align-items-center content-side-menu">
                    <ul class="p-0">
                        <li class="link-account">
                            <div class="link-account-container">
                                <div class="icon-account me-1">
                                    <img class="menu-icon-account" src="<?= image_url ?>orderhistory.svg">
                                </div>
                                <a class="active" href="<?= URL . "?controller=account&action=infoPedidos" ?>">Mis pedidos</a>
                            </div>
                        </li>
                        <li class="link-account">
                            <div class="link-account-container">
                                <div class="icon-account me-1">
                                    <img class="menu-icon-account" src="<?= image_url ?>accountedit.svg">
                                </div>
                                <a class="" href="<?= URL . "?controller=account" ?>">Información cuenta</a>
                            </div>
                        </li>

                        <div>
                            <hr>
                        </div>

                        <li class="link-account">
                            <div class="link-account-container d-flex justify-content-center">
                                <a href="<?= URL . "?controller=login&action=logout" ?>" class="close-account-link">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <div class="row d-flex flex-row w-100">
                    <h3 class="title">DETALLES PEDIDO #<?= $pedido_id ?></h3>
                    <a href="<?= URL . "?controller=account&action=infoPedidos" ?>">< Volver a Mis pedidos</a>
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