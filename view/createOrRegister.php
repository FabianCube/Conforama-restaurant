<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conforama</title>

    <link rel="stylesheet" href="assets/style/home.css">
    <link rel="stylesheet" href="assets/style/comandPanel.css">
    <link rel="stylesheet" href="assets/style/global.css">

    <link href="assets/style/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style/full_estil.css" rel="stylesheet" type="text/css" media="screen">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="container" style="max-width: 1170px; margin-top: 55px;">
        <div class="row d-flex justify-content-center">
            <img src="assets/images/Conforama_logo.png" alt="logo conforama" style="width: 243px; height: auto;">
        </div>
        <div class="row d-flex mt-5">
            <div class="col-6 d-flex justify-content-start flex-column px-5" style="min-height: 500px;">
                <header class="d-flex justify-content-center">
                    <h2 style="font-size: 17px;">Cliente habitual</h2>
                </header>

                <form action="?controller=login&action=login" method="post" class="d-flex flex-column justify-content-between" style="height: 100%;">
                    <div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" placeholder="Correo electrónico">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger" style="width: 100%;">INICIAR SESIÓN AHORA</button>
                </form>

            </div>
            <div class="col-6 d-flex justify-content-start flex-column px-5" style="min-height: 500px; border-left: solid 1px black;">
                <header class="d-flex justify-content-center">
                    <h2 style="font-size: 17px;">Nuevo Cliente</h2>
                </header>

                <form action="<?=URL . "?controller=login&action=registerUser"?>" method="post">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Correo electrónico</label>
                        <input type="email" class="form-control" name="register-email" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group mb-3">
                        <label for="register-name">Nombre</label>
                        <input type="text" name="register-nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group mb-3">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="register-apellidos" placeholder="Apellidos">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tel">Número de teléfono</label>
                        <input type="text" name="register-telefono" class="form-control" placeholder="Tel.">
                    </div>
                    <div class="form-group mb-3">
                        <label for="dir">Dirección de envío</label>
                        <input type="text" class="form-control" name="register-direccion" placeholder="Dirección de envío">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Contraseña</label>
                        <input type="password" name="register-password" class="form-control" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-danger" style="width: 100%;">CONTINUAR</button>
                </form>
            </div>
        </div>

    </section>
</body>

</html>