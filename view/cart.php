<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de la compra | Conforama restaurant</title>
</head>

<body style="background-color: #F7F7F7;">
    <section class="container" style="margin-top: 55px;">

        <div class="col-8">
            <div class="row" style="background-color: #EEEEEE; height: 35px;">
                <h3>Conforama</h3>
            </div>
            <?php foreach ($_SESSION['items'] as $producto) { ?>
                <div class="row" style="height: 250px; margin-bottom: 20px; background-color: white;">
                    <div class="col-4">
                        <img src="<?= image_url . $producto->getProducto_carrito()->getUrl_img() ?>" alt="Imagen de <?= $producto->getProducto_carrito()->getNombre_producto() ?>">
                    </div>
                    <div class="col-7">
                        <h2><?= $producto->getProducto_carrito()->getNombre_producto() ?></h2>
                        <h2><?= $producto->getProducto_carrito()->getPrecio_producto() ?>€</h2>
                        <p>Ref.00<?= $producto->getProducto_carrito()->getProducto_id() ?></p>
                        <p>Vendido y expedido por: Conforama</p>
                        <button>Modificar ingredientes</button><br>
                        <input type="checkbox">
                        <p>Lo quiero para llevar</p>
                    </div>
                    <div class="col-1">
                        <button>eliminar</button>
                    </div>

                </div>
            <?php } ?>
        </div>
        <div class="col-4 bg-primary">

        </div>
    </section>
</body>

</html>