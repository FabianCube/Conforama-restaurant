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
                    <a href="#" class="list-group-item list-group-item-action">Mis datos</a>
                    <a href="#" class="list-group-item list-group-item-action">Información pedidos</a>
                    <a href="#" class="list-group-item list-group-item-action"><span style="color: red;">Cerrar sesión</span></a>
                </div>
            </div>
            <div class="col-8">
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
            </div>
        </div>
    </section>

</body>

</html>