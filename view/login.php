<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="stylesheet" href="assets/style/login.css">
    <link rel="stylesheet" href="assets/style/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="container" style="max-width: 1170px; min-height: 65vh; margin-top: 95px;">
        <div class="col-xs-12">
            <h2 class="title-login">Clientes registrados</h2>
            <div class="mb-40">
                <p class="mb-4 text-login">
                    ¡Compra más fácil y rápido con tu cuenta Conforama! Si todavía no tienes una cuenta, puedes
                    <strong>
                        <u>
                            <a href="<?= URL . "?controller=login&action=register"?>">crear una nueva cuenta </a>
                        </u>
                    </strong>
                    ahora.
                </p>
                <p class="mb-4 text-login">
                    Si tienes una cuenta con nosotros, por favor <strong>accede con tus datos.</strong>
                </p>
            </div>
        </div>
        <div class="col-xs-12 forms">
            <form action="?controller=login&action=login" method="POST">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="email">Correo electronico <span class="req">*</span></label>
                            <input class="form-control mb-3 custom-input" style="height: 28px;" name="email" placeholder="Ej. xxxxx@dominio.com" type="text">
                            <label class="info-login">Por favor, introduce tu dirección de correo electrónico.</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="input-password">Contraseña<span class="req">*</span></label>
                            <div class="password-container">
                                <input class="form-control mb-3 custom-input" style="height: 28px;" name="password" placeholder="6 a 12 caracteres y al menos un número" type="password">
                            </div>
                            <label class="info-login">Por favor, introduce tu contraseña. Recuerda, la contraseña debe: tener una longitud de entre 6 y 12 caracteres, sin signos de puntuación. Debe contener al menos un número.</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 mb-40">
                        <div class="row mt-10">
                            <div class="col-xs-12">
                                <button class="btn btn-login-custom" style="width: 370px; height: 47px;" type="submit">INICIAR SESIÓN AHORA</button>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-xs-12 text-center-xs col-sm-6 col-sm-offset-3 text-center-sm col-md-12 col-md-offset-0 remember-me">
                                <input type="checkbox" name="save_session">No cerrar sesión.</input>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>