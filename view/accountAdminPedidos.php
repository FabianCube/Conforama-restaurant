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
                    <a href="<?= URL . "?controller=account" ?>" class="list-group-item list-group-item-action">Administrar Usuarios</a>
                    <a href="<?= URL . "?controller=account&action=productosAdmin" ?>" class="list-group-item list-group-item-action">Administrar Productos</a>
                    <a href="<?= URL . "?controller=account&action=pedidosAdmin" ?>" class="list-group-item list-group-item-action">Administrar Pedidos</a>
                    <a href="<?= URL . "?controller=login&action=logout" ?>" class="list-group-item list-group-item-action">
                        <span style="color: red;">Cerrar sesión</span>
                    </a>
                </div>
            </div>
            <div class="col-8">
                <div class="row p-1">
                    <h3>Admin Panel</h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">USUARIO_ID</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">PRECIO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pedidos as $pedido) { ?>
                            <tr>
                                <td><?= $pedido->getPedido_id() ?></td>
                                <td><?= $pedido->getUsuario_id() ?></td>
                                <td><?= $pedido->getEstado() ?></td>
                                <td><?= $pedido->getHora_pedido() ?>€</td>
                                <td><?= $pedido->getPrecio_total() ?></td>
                                <td>
                                    <form action="#" method="post">
                                        <input type="text" name="id_pedido_admin_panel" hidden>
                                        <input type="submit" value="Modificar">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>