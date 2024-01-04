<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/style/login.css">
    <link rel="stylesheet" href="assets/style/global.css">
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
                                    <img class="menu-icon-account" src="<?= image_url ?>orderhistory.svg" alt="account pedidos">
                                </div>
                                <a class="active" href="<?= URL . "?controller=account&action=infoPedidos" ?>">Mis pedidos</a>
                            </div>
                        </li>
                        <li class="link-account">
                            <div class="link-account-container">
                                <div class="icon-account me-1">
                                    <img class="menu-icon-account" src="<?= image_url ?>accountedit.svg" alt="account user">
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
                <div class="row p-1 d-flex align-items-center mb-3" style="height: 60px;">
                    <p class="m-0" style="font-size: 18px;"><?= $user->getEmail() ?></p>
                    <div class="m-0">
                        <hr style="width: 200px; margin: 0; opacity:1; ">
                        <hr class="m-0">
                    </div>
                </div>
                <?php if (Pedido_ProductoDAO::pedidoExistsWithUserID($userID)) { ?>

                    <table class="table">
                        <tr>
                            <th>PEDIDO #</th>
                            <th>FECHA</th>
                            <th>TOTAL DEL PEDIDO</th>
                            <th>ESTADO</th>
                            <th></th>
                        </tr>
                        <?php foreach ($infoPedido as $value) { ?>
                            <tr>
                                <td>000<?= $value->getPedido_id() ?></td>
                                <td><?= PedidosDAO::getPedidoByID($value->getPedido_id())->getHora_pedido() ?></td>
                                <td><?= PedidosDAO::getPedidoByID($value->getPedido_id())->getPrecio_total() ?>€</td>
                                <td><?= PedidosDAO::getPedidoByID($value->getPedido_id())->getEstado() ?></td>
                                <td class="button-ver-pedido">
                                    <form action="<?= URL . "?controller=account&action=detallesPedido" ?>" method="post">
                                        <input type="text" name="pedidoId-detallesPedido" value="<?= $value->getPedido_id() ?>" hidden>
                                        <input class="ver_pedido" type="submit" value="VER PEDIDO">
                                    </form>
                                </td>
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