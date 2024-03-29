<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conforama restaurant | Tienda Online</title>

    <link rel="stylesheet" href="assets/style/home.css">
    <link rel="stylesheet" href="assets/style/comandPanel.css">
    <link rel="stylesheet" href="assets/style/global.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="container my-5 d-flex">
        <div style="width: 18px; height: 18px; border-radius: 25px; background-color: red; margin-right: 10px;"></div>
        <p class="custom-title-section">Promociones por inauguración</p>
    </section>

    <section class="container">
        <div class="row d-flex flex-row justify-content-between px-2">
            <?php foreach ($productos as $producto) { ?>
                <div class="col-3 d-flex flex-column align-items-center justify-content-between custom-card">
                    <div class="p-4 d-flex justify-content-center" style="height: 50%;">
                        <img src="<?= image_url . $producto->getUrl_img() ?>" alt="Imagen de <?= $producto->getNombre_producto() ?>" style="height: 125px; width: auto;">
                    </div>
                    <div class="d-flex flex-column justify-content-between" style="height: 50%;">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="card-title custom-title-card custom-title-card-hover"><?= $producto->getNombre_producto() ?></h5>
                            <p class="card-text custom-default-description-text" style="text-align: center;"><?= $producto->getDescripcion() ?></p>
                            <p class="card-text custom-product-price"><?= $producto->getPrecio_producto() ?>€</p>
                        </div>
                        <div class="d-flex justify-content-end pb-3">
                            <form action="<?= URL . "?controller=productos&action=sel" ?>" method="post">
                                <input type="hidden" name="id" value="<?= $producto->getProducto_id() ?>">
                                <button type="submit" class="button-style">AÑADIR AL CARRITO <span><ion-icon name="cart"></ion-icon></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="pt-5">
        <div class="d-flex justify-content-center custom-info-banner-container">
            <h2 class="custom-banner-title">¡NUESTROS LOCALES A LA ÚLTIMA!</h2>
            <p class="custom-banner-text">Podrás encontrar nuestros locales en numerosas ubicaciones, disponemos de
                <br> una red de 44 establecimientos en España y una plantilla de más de 2.500 personas.
            </p>
            <img class="img-fluid" src="<?= image_url ?>background-our-locals.png" alt="imagen local conforama-restaurant" style="width: 100%; height: auto;">
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
                <form action="<?= URL . "?controller=productos" ?>" method="post">
                    <input name="categoria_id" value="0" hidden>
                    <button class="custom-button-category" type="submit">VER PRODUCTOS</button>
                </form>
                <img src="<?= image_url ?>coffe-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">BOCADILLOS</h2>
                <form action="<?= URL . "?controller=productos" ?>" method="post">
                    <input name="categoria_id" value="1" hidden>
                    <button class="custom-button-category" type="submit">VER PRODUCTOS</button>
                </form>
                <img src="<?= image_url ?>sanwich-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">SMOOTHIES</h2>
                <form action="<?= URL . "?controller=productos" ?>" method="post">
                    <input name="categoria_id" value="2" hidden>
                    <button class="custom-button-category" type="submit">VER PRODUCTOS</button>
                </form>
                <img src="<?= image_url ?>smoothie-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">MUFFINS</h2>
                <form action="<?= URL . "?controller=productos" ?>" method="post">
                    <input name="categoria_id" value="3" hidden>
                    <button class="custom-button-category" type="submit">VER PRODUCTOS</button>
                </form>
                <img src="<?= image_url ?>muffin-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">BATIDOS</h2>
                <form action="<?= URL . "?controller=productos" ?>" method="post">
                    <input name="categoria_id" value="4" hidden>
                    <button class="custom-button-category" type="submit">VER PRODUCTOS</button>
                </form>
                <img src="<?= image_url ?>milkshake-category.png" alt="Category image" class="custom-image-category">
            </div>
            <div class="col-4 custom-image-container">
                <h2 class="custom-title-category">DONUTS</h2>
                <form action="<?= URL . "?controller=productos" ?>" method="post">
                    <input name="categoria_id" value="5" hidden>
                    <button class="custom-button-category" type="submit">VER PRODUCTOS</button>
                </form>
                <img src="<?= image_url ?>donut-category.png" alt="Category image" class="custom-image-category">
            </div>
        </div>
    </section>

    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>