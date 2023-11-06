<?php
include_once 'model/ProductoDAO.php';
include_once 'config/parameters.php';

$productos = ProductoDAO::getPromotedProducts();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conforama restaurant | Tienda Online</title>

    <link rel="stylesheet" href="assets/style/home.css">
</head>

<body>
    <section class="container my-5 d-flex">
        <div style="width: 18px; height: 18px; border-radius: 25px; background-color: red; margin-right: 10px;"></div>
        <p class="custom-title-section">Promociones por inauguracion</p>
    </section>
    <section class="container d-flex justify-content-between mt-3">
        <?php foreach ($productos as $producto) { ?>
            <div class="card" style="width: 15rem; height: 21rem;">
                <div class="container" style="width: 12rem;">
                    <img src="assets/images/<?=$producto->getUrl_img()?>" class="card-img-top" alt="..." style="width: 100%; height: auto;" class="img-fluid">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?=$producto->getNombre_producto()?></h5>
                    <p class="card-text"><?=$producto->getDescripcion()?></p>
                    <a href="#" class="button-style">AÑADIR AL CARRITO</a>
                </div>
            </div>
        <?php } ?>
    </section>
</body>

</html>