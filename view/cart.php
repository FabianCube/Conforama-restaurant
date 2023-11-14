<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de la compra | Conforama restaurant</title>
    <link rel="stylesheet" href="assets/style/global.css">
    <link rel="stylesheet" href="assets/style/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body style="background-color: #F7F7F7;">

    <section class="container" style="margin-top: 55px; background-color: yellow;">
        <h3>1 CESTA | 2 PAGO</h3>
    </section>
    <section class="container d-flex flex-row justify-content-between" style="margin-top: 55px;">
        <div class="col-7">
            <div class="row custom-title">
                <h3>Cesta Productos</h3>
            </div>
            <div class="row d-flex align-items-center custom-head">
                <h3>Conforama</h3>
            </div>
            <?php foreach ($_SESSION['items'] as $producto) { ?>
                <div class="row d-flex flex-row align-items-center px-4" style="height: 250px; margin-top: 20px; background-color: white; border-radius: 3px;">
                    <div class="col-4 d-flex justify-content-center align-items-center" style="border: solid 1px #BFBFBF; width: 200px; height: 176px;">
                        <img style="height: 110px; width: auto;" src="<?= image_url . $producto->getProducto_carrito()->getUrl_img() ?>" alt="Imagen de <?= $producto->getProducto_carrito()->getNombre_producto() ?>">
                    </div>
                    <div class="col-7 py-3 pt-4">
                        <div class="row d-flex" style="height: 21px;">
                            <div class="col-6" style="height: 21px;">
                                <h2 class="m-0 custom-title-product"><?= strtoupper($producto->getProducto_carrito()->getNombre_producto()) ?></h2>
                            </div>
                            <div class="m-0 col-6 d-flex justify-content-end">
                                <h2 class="custom-price-text"><?= $producto->getProducto_carrito()->getPrecio_producto() ?>€</h2>
                            </div>
                        </div>
                        <p class="custom-ref">Ref.00<?= $producto->getProducto_carrito()->getProducto_id() ?></p>
                        <p class="custom-seller-info">Vendido y expedido por: Conforama</p>
                        <div class="col-12">
                            <button class="btn btn-primary">Add more</button>
                            <button class="btn btn-success">Modificar ingredientes</button><br>
                        </div>
                        <div class="col-12">
                            <hr style="height: 1px; border: solid 1px black;">
                        </div>
                        <div class="col-12 d-flex" style="height: 30px;">
                            <input type="checkbox" style="margin-right: 10px;">
                            <p>Lo quiero para llevar</p>
                        </div>
                    </div>
                    <div class="col-1 d-flex pt-4" style="height: 100%;">
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="21" viewBox="0 0 18 21" fill="none">
                            <path d="M11.657 7.57726L11.3215 16.3463M6.67855 16.3463L6.34303 7.57726M16.009 4.44965C16.3406 4.50031 16.6703 4.5539 17 4.61139M16.009 4.44965L14.9733 17.9763C14.9311 18.527 14.6835 19.0414 14.28 19.4166C13.8766 19.7918 13.3471 20.0002 12.7973 20H5.20267C4.65294 20.0002 4.12342 19.7918 3.71998 19.4166C3.31654 19.0414 3.06893 18.527 3.02667 17.9763L1.99103 4.44965M16.009 4.44965C14.8898 4.27964 13.7649 4.15062 12.6364 4.06284M1.99103 4.44965C1.65939 4.49934 1.3297 4.55293 1 4.61041M1.99103 4.44965C3.11019 4.27964 4.23514 4.15062 5.36364 4.06284M12.6364 4.06284V3.17035C12.6364 2.02063 11.7539 1.06189 10.6097 1.02584C9.53684 0.991386 8.46316 0.991386 7.3903 1.02584C6.24606 1.06189 5.36364 2.02161 5.36364 3.17035V4.06284M12.6364 4.06284C10.2157 3.87487 7.78427 3.87487 5.36364 4.06284" stroke="#6D6D6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-4 bg-primary">
            <p>content</p>
        </div>
    </section>
</body>

</html>