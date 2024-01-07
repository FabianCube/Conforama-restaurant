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
                                    <img class="menu-icon-account" src="<?= image_url ?>orderhistory.svg" alt="Logo icon pedidos">
                                </div>
                                <a class="txt-link-account" href="<?= URL . "?controller=account&action=infoPedidos" ?>">Mis pedidos</a>
                            </div>
                        </li>
                        <li class="link-account">
                            <div class="link-account-container">
                                <div class="icon-account me-1">
                                    <img class="menu-icon-account" src="<?= image_url ?>accountedit.svg" alt="Logo account">
                                </div>
                                <a class="txt-link-account active" href="<?= URL . "?controller=account" ?>">Información cuenta</a>
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

                <?php if ($user instanceof Cliente) { ?>
                    <div class="row p-1 d-flex align-items-center mb-3" style="height: 60px;">
                        <p class="m-0" style="font-size: 18px;"><?= $user->getEmail() ?></p>
                        <div class="m-0">
                            <hr style="width: 200px; margin: 0; opacity:1; ">
                            <hr class="m-0">
                        </div>
                    </div>

                    <?php if (isset($_COOKIE['ultimo-pedido'])) { ?>
                        <div class="row">
                            <p>Último pedido realizado con un valor de <?=$_COOKIE['ultimo-pedido']?>€</p>
                        </div>
                    <?php } ?>

                    <ul class="list-group">
                        <form action="<?= URL . "?controller=account&action=updateUser" ?>" method="post">
                            <li class="list-group-item d-flex">
                                <div style="width: 100px;"><strong>Nombre </strong></div>
                                <input class="text-placeholder" type="text" name="account-update-nombre" value="<?= $user->getNombre_usuario() ?>">
                            </li>
                            <li class="list-group-item d-flex">
                                <div style="width: 100px;"><strong>Apellidos </strong></div>
                                <input class="text-placeholder" type="text" name="account-update-apellido" value="<?= $user->getApellido_usuario() ?>">
                            </li>
                            <li class="list-group-item d-flex">
                                <div style="width: 100px;"><strong>Email </strong></div>
                                <input class="text-placeholder" type="text" name="account-update-email" value="<?= $user->getEmail() ?>">
                            </li>
                            <li class="list-group-item d-flex">
                                <div style="width: 100px;"><strong>Teléfono </strong></div>
                                <input class="text-placeholder" type="text" name="account-update-tel" value="<?= $user->getTelefono() ?>">
                            </li>
                            <li class="list-group-item d-flex">
                                <div style="width: 100px;"><strong>Direccion </strong></div>
                                <input class="text-placeholder" type="text" name="account-update-direccion" value="<?= $user->getDireccion() ?>">
                            </li>
                            <button class="submit-account-form" type="submit">CONFIRMAR AHORA <span><ion-icon name="arrow-dropright"></ion-icon></span></button>
                        </form>
                    </ul>
                <?php } else if ($user instanceof Admin) { ?>
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
    
    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>