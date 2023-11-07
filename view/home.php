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
        <div class="d-flex justify-content-center custom-info-banner-container">
            <h2 class="custom-banner-title">¡NUESTROS LOCALES A LA ÚLTIMA!</h2>
            <p class="custom-banner-text">Podrás encontrar nuestros locales en numerosas ubicaciones, disponemos de
                <br> una red de 44 establecimientos en España y una plantilla de más de 2.500 personas.
            </p>
            <img class="img-fluid" src="assets/images/background-our-locals.png" alt="" style="width: 100%; height: auto;">
        </div>
    </section>

    <section class="container my-5 d-flex">
        <div style="width: 18px; height: 18px; border-radius: 25px; background-color: red; margin-right: 10px;"></div>
        <p class="custom-title-section">Categorías</p>
    </section>

    <section class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">COFFE</h2>
                <button class="custom-button-category" url="<?= URL . "?controller=productos" ?>">VER PRODUCTOS</button>
                <img src="assets/images/coffe-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">BOCADILLOS</h2>
                <button class="custom-button-category">VER PRODUCTOS</button>
                <img src="assets/images/sanwich-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">SMOOTIES</h2>
                <button class="custom-button-category">VER PRODUCTOS</button>
                <img src="assets/images/smoothie-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">MUFFINS</h2>
                <button class="custom-button-category">VER PRODUCTOS</button>
                <img src="assets/images/muffin-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">BATIDOS</h2>
                <button class="custom-button-category">VER PRODUCTOS</button>
                <img src="assets/images/milkshake-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">DONUTS</h2>
                <button class="custom-button-category">VER PRODUCTOS</button>
                <img src="assets/images/donut-category.png" alt="Category image" class="custom-image-category">
            </div>
        </div>
    </section>
</body>

</html>