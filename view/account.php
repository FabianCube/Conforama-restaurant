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
                                <a class="" href="<?= URL . "?controller=account&action=infoPedidos" ?>">Mis pedidos</a>
                            </div>
                        </li>
                        <li class="link-account">
                            <div class="link-account-container">
                                <div class="icon-account me-1">
                                    <img class="menu-icon-account" src="<?= image_url ?>accountedit.svg">
                                </div>
                                <a class="active" href="<?= URL . "?controller=account" ?>">Información cuenta</a>
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
            <div class="col-9">

                <?php if ($_SESSION['current_user']->getRol_id() != 0) { ?>
                    <div class="row p-1">
                        <h3>Mis datos</h3>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Nombre </strong></div>
                            <input type="text" value="<?= $_SESSION['current_user']->getNombre_usuario() ?>" disabled>
                        </li>
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Apellidos </strong></div>
                            <input type="text" value="<?= $_SESSION['current_user']->getApellido_usuario() ?>" disabled>
                        </li>
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Email </strong></div>
                            <input type="text" value="<?= $_SESSION['current_user']->getEmail() ?>" disabled>
                        </li>
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Direccion </strong></div>
                            <input type="text" value="<?= $_SESSION['current_user']->getDireccion() ?>" disabled>
                        </li>
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Teléfono </strong></div>
                            <input type="text" value="<?= $_SESSION['current_user']->getTelefono() ?>" disabled>
                        </li>
                    </ul>
                <?php } else if ($_SESSION['current_user']->getRol_id() == 0) { ?>
                    <div class="row p-1">
                        <h3>Admin Panel</h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">rol id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Email</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Direccion</th>
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
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                <?php } ?>
            </div>
        </div>
    </section>

</body>

</html>