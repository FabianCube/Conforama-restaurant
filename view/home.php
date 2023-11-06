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
    <link rel="stylesheet" href="assets/style/comandPanel.css">
</head>

<body>
    <section class="container my-5 d-flex">
        <div style="width: 18px; height: 18px; border-radius: 25px; background-color: red; margin-right: 10px;"></div>
        <p class="custom-title-section">Promociones por inauguración</p>
    </section>
    <section class="container d-flex justify-content-between my-5">
        <?php foreach ($productos as $producto) { ?>
            <div class="card d-flex justify-content-between align-items-center" style="width: 15rem; height: 21rem;">
                <div class="card-body" style="width: 10rem;">
                    <img src="assets/images/<?= $producto->getUrl_img() ?>" class="card-img-top" alt="Imagen del producto" style="width: 100%; height: auto;" class="img-fluid">
                </div>
                <div class="card-body d-flex justify-content-end flex-column align-items-center">
                    <h5 class="card-title custom-title-card"><?= $producto->getNombre_producto() ?></h5>
                    <p class="card-text custom-default-description-text"><?= $producto->getDescripcion() ?></p>
                    <p class="card-text custom-product-price"><?= $producto->getPrecio_producto() ?>€</p>
                    <a href="#" class="button-style">AÑADIR AL CARRITO</a>
                </div>
            </div>
        <?php } ?>
    </section>

    <section class="pt-5">
        <div class="d-flex justify-content-center">
            <img class="img-fluid" src="assets/images/background-our-locals.png" alt="" style="width: 100%; height: auto;">

        </div>
    </section>

    <section class="container my-5 d-flex">
        <div style="width: 18px; height: 18px; border-radius: 25px; background-color: red; margin-right: 10px;"></div>
        <p class="custom-title-section">Categorías</p>
    </section>

    <section class="container">
        <div class="row d-flex justify-content-between">
            <?php for ($i = 0; $i < 6; $i++) { ?>
                <div class="col-4 mt-3" style="width: 425px; height: 200px; background-color: yellow;">
                    
                </div>
            <?php } ?>
        </div>
    </section>
</body>

</html>