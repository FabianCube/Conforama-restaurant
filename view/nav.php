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
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL . "?controller=home" ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=productos" ?>">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=productos&action=sel" ?>">Carrito</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>