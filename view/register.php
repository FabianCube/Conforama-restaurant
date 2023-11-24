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
    <section class="container" style="max-width: 1170px; min-height: 65vh; margin-top: 95px;">
        <div class="col-xs-12">
            <h2 class="title-login">Crear una cuenta</h2>
            <div class="mb-40">
                <p class="mb-4 text-login">
                    Crea tu cuenta y disfruta de las ventajas por estar registrado:
                    realiza tu compra más rápidamente, sigue en todo momento el estado
                    de tu pedido y entérate de las últimas novedades.
                </p>
            </div>
        </div>
        <div class="col-xs-12 forms">
            <form action="<?= URL . "?controller=login&action=registerUser" ?>" method="POST">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="email">Correo electronico <span class="req">*</span></label>
                            <input class="form-control mb-3 custom-input" style="height: 28px;" name="register-email" placeholder="Ej. xxxxx@dominio.com" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="input-password">Contraseña<span class="req">*</span></label>
                            <div class="password-container">
                                <input class="form-control mb-3 custom-input" style="height: 28px;" name="-register-password" placeholder="6 a 25 caracteres y al menos un número" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="email">Nombre<span class="req">*</span></label>
                            <input class="form-control mb-3 custom-input" style="height: 28px;" name="register-nombre" placeholder="Nombre de usuario" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="email">Apellidos<span class="req">*</span></label>
                            <input class="form-control mb-3 custom-input" style="height: 28px;" name="register-apellidos" placeholder="Apellidos" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="email">Teléfono<span class="req">*</span></label>
                            <input class="form-control mb-3 custom-input" style="height: 28px;" name="register-telefono" placeholder="Tel." type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="email">Dirección<span class="req">*</span></label>
                            <input class="form-control mb-3 custom-input" style="height: 28px;" name="register-direccion" placeholder="Dirección de envío" type="text">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4" style="margin-left: auto;">
                        <div class="row mt-10">
                            <div class="col-xs-12">
                                <button class="btn btn-login-custom" style="width: 370px; height: 47px;" type="submit">REGÍSTRATE AHORA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>