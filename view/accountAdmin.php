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
                            <th scope="col">ROL_ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">APELLIDO</th>
                            <th scope="col">E-MAIL</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">DIRECCION</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <th scope="row"><?= $user->getUsuario_id() ?></th>
                                <td><?= $user->getRol_id() ?></td>
                                <td><?= $user->getNombre_usuario() ?></td>
                                <td><?= $user->getApellido_usuario() ?></td>
                                <td><?= $user->getEmail() ?></td>
                                <td><?= $user->getTelefono() ?></td>
                                <td><?= $user->getDireccion() ?></td>
                                <td>
                                    <form action="#" method="post">
                                        <input type="text" name="id_usuario_admin_panel" hidden>
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