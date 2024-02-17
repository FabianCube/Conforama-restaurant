<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tienda online | Restaurante Conforama</title>
    
    <link rel="stylesheet" href="assets/style/nav-style.css">
    <link rel="stylesheet" href="assets/style/global.css">
    <link href="assets/style/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25); height: 76px;">
        <div class="container" style="width: 1170px;">
            <a class="navbar-brand" href="<?= URL ?>"><img src="<?= image_url ?>logo-conforama.svg" alt="Logo Conforama" style="height: 40px; width: auto;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="d-flex me-auto mb-2 mb-lg-0" role="search">
                    <input class="me-2 search-bar-custom" type="search" placeholder="BUSCA Y ENCUENTRA">
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL . "?controller=home" ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=productos" ?>">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=login" ?>">
                        <?php if(isset($_SESSION['current_user'])) { ?>
                            Mi cuenta
                        <?php } else { ?>
                            Iniciar sesión
                        <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=opiniones" ?>">Opiniones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . "?controller=cart" ?>">
                            Mi carrito
                            <span class="translate-middle badge rounded-pill bg-secondary">
                                <?php
                                    if(isset($_SESSION['items']))
                                    {
                                        echo count($_SESSION['items']);
                                    }
                                    else
                                    {
                                        echo "0";
                                    }
                                
                                ?>
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