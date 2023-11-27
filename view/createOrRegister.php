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
            <div class="col-6 d-flex justify-content-center flex-column px-5" style="min-height: 500px;">
                <header class="d-flex justify-content-center">
                    <h2>Cliente habitual</h2>
                </header>

                <form action="#">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-danger">INICIAR SESIÓN AHORA</button>
                </form>

            </div>
            <div class="col-6 d-flex justify-content-center flex-column px-5" style="min-height: 500px;">
                <header class="d-flex justify-content-center">
                    <h2>Nuevo Cliente</h2>
                </header>

                <form action="#">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group">
                        <label for="register-name">Nombre</label>
                        <input type="text" name="register-name" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <label for="tel">Número de teléfono</label>
                        <input type="text" name="tel" class="form-control" placeholder="Tel.">
                    </div>
                    <div class="form-group">
                        <label for="dir">Dirección de envío</label>
                        <input type="text" class="form-control" name="dir" placeholder="Dirección de envío">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-danger">CONTINUAR</button>
                </form>
            </div>
        </div>

    </section>
</body>

</html>