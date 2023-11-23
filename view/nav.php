<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/nav-style.css">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tienda online | Restaurante Conforama</title>

    <link href="assets/style/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style/full_estil.css" rel="stylesheet" type="text/css" media="screen">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25); height: 76px;">
        <div class="container" style="width: 1170px;">
            <a class="navbar-brand" href="#"><img src="<?= image_url ?>Conforama_logo.png" alt="Logo Conforama" style="height: 40px; width: auto;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex me-auto mb-2 mb-lg-0" role="search">
                    <input class="form-control me-2" style="width: 380px; height: 35px;" type="search" placeholder="Busca y encuentra" aria-label="Search">
                    <button class="btn btn-outline-danger" style="height: 35px;" type="submit">Buscar</button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL . "?controller=home" ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=productos" ?>">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=login" ?>">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=cart" ?>">
                            Mi carrito
                            <span class="translate-middle badge rounded-pill bg-secondary">
                                <?= count($_SESSION['items']); ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>