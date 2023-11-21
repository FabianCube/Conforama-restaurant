<?php
$totalPrice = cartController::getTotalValueOfProductsInCart();
$ivaProduct = cartController::getIVAOfProduct();
$withoutIva = cartController::getPriceWithoutIVA();
?>
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

    <section class="container d-flex justify-content-center" style="margin-top: 95px;">
        <div>
            <h3 class="custom-price-text" style="width: 200px; text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <g clip-path="url(#clip0_44_207)">
                        <path d="M20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 
                        18.9464 12.6522 20 10 20C7.34784 20 4.8043 18.9464 2.92893 
                        17.0711C1.05357 15.1957 0 12.6522 0 10C0 7.34784 1.05357 
                        4.8043 2.92893 2.92893C4.8043 1.05357 7.34784 0 10 0C12.6522 0 
                        15.1957 1.05357 17.0711 2.92893C18.9464 4.8043 20 7.34784 20 
                        10ZM11.6038 5.0025H9.96375L7.59 6.73125V8.32L9.8825 
                        6.6725H9.96375V15H11.6038V5.0025Z" fill="#444444" />
                    </g>
                    <defs>
                        <clipPath id="clip0_44_207">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                CESTA
            </h3>
            <hr style="height: 2px; background-color: #444 ; opacity: 1!important;">
        </div>
        <div>
            <h3 class="custom-cesta-title" style="width: 200px; text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <g clip-path="url(#clip0_44_210)">
                        <path d="M1.25 10C1.25 12.3206 2.17187 14.5462 3.81282 16.1872C5.45376 17.8281 7.67936 
                        18.75 10 18.75C12.3206 18.75 14.5462 17.8281 16.1872 16.1872C17.8281 14.5462 18.75 12.3206
                        18.75 10C18.75 7.67936 17.8281 5.45376 16.1872 3.81282C14.5462 2.17187 12.3206 1.25 10 
                        1.25C7.67936 1.25 5.45376 2.17187 3.81282 3.81282C2.17187 5.45376 1.25 7.67936 1.25 10ZM20 
                        10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20C7.34784 20
                        4.8043 18.9464 2.92893 17.0711C1.05357 15.1957 0 12.6522 0 10C0 7.34784 1.05357 4.8043 
                        2.92893 2.92893C4.8043 1.05357 7.34784 0 10 0C12.6522 0 15.1957 1.05357 17.0711 2.92893C18.9464
                        4.8043 20 7.34784 20 10ZM8.3075 7.8V7.8875H6.71875V7.8075C6.71875 6.29125 7.8175 4.805 10.015 
                        4.805C11.9925 4.805 13.2812 5.99125 13.2812 7.57375C13.2812 8.82625 12.5312 9.6575 11.6725 
                        10.6112L11.5525 10.745L9.085 13.52V13.6162H13.4575V15H6.7775V13.96L10.49 9.84375C11.0325 
                        9.25 11.6187 8.58375 11.6187 7.7125C11.6187 6.7825 10.9225 6.1675 9.9775 6.1675C8.92375 
                        6.1675 8.3075 6.93625 8.3075 7.8Z" fill="#A1A1A1" />
                    </g>
                    <defs>
                        <clipPath id="clip0_44_210">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                PAGO
            </h3>
            <hr style="height: 1px; border: solid 1px black;">
        </div>

    </section>
    <section class="container d-flex flex-row justify-content-between" style="margin-top: 55px; min-height: 650px;">
        <div class="col-7">
            <div class="row custom-title">
                <h3>Cesta Productos</h3>
            </div>
            <div class="row d-flex align-items-center custom-head">
                <h3>Conforama</h3>
            </div>

            <?php if (count($_SESSION['items']) == 0) { ?>
                <div class="container d-flex flex-column align-items-center mt-5" style="width: 100%;">
                    <h2>Parece que aún no has añadido nada!</h2>
                    <p>Vuelve a la tienda y añade tu desayuno.</p>
                </div>
            <?php }
            $pos = 0; ?>

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
                                <h2 class="custom-price-text"><?= $producto->getProducto_carrito()->getPrecio_producto() * $producto->getCantidad() ?>€</h2>
                            </div>
                        </div>
                        <p class="custom-ref">Ref.00<?= $producto->getProducto_carrito()->getProducto_id() ?></p>
                        <p class="custom-seller-info">Vendido y expedido por: Conforama</p>
                        <div class="col-12">
                            <form action="<?= URL . "?controller=cart" ?>" method="POST">
                                <button type="submit" name="Del" value="<?= $pos ?>">-</button>
                                <input type="text" value="<?= $producto->getCantidad() ?>" style="width: 30px;">
                                <button type="submit" name="Add" value="<?= $pos ?>">+</button>
                            </form>
                            <form action="#" method="POST">
                                <input name="" value="" hidden>
                                <button class="btn btn-success">Modificar ingredientes</button><br>
                            </form>
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

                        <form action="<?= URL . "?controller=cart" ?>" method="POST">
                            <input name="posProductCart" value="<?= $pos ?>" hidden>

                            <button class="custom-delete-button" type="submit" style="border: none; background-color: white;">
                                <img src="assets/images/delete.svg" alt="delete button">
                            </button>
                        </form>

                    </div>
                </div>
            <?php $pos++;
            } ?>
        </div>
        <div class="col-4 p-4" style="max-height: 300px; background-color: white;">
            <div class="col-12 pl-2 d-flex align-items-center custom-head-2">
                <h3>Conforama</h3>
            </div>

            <div class="col-12">
                <div class="col-12 d-flex justify-content-between" style="height: 20px;">
                    <p>Productos</p>
                    <p><?= $totalPrice ?> €</p>
                </div>
                <hr style="height: 1px; border: solid 1px black;">
                <div class="col-12 d-flex justify-content-between">
                    <p>Total (IVA exc.)</p>
                    <p><?= $withoutIva ?> €</p>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <p>IVA (21%)</p>
                    <p><?= $ivaProduct ?> €</p>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <p>Total (IVA inc.)</p>
                    <p><?= $totalPrice ?> €</p>
                </div>
                <div class="col-12">
                    <button class="btn btn-danger" style="width: 100%;">TRAMITAR PEDIDO</button>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center align-items-center flex-column" style="height: 150px;">
                <p>¿Tienes un cupón/bono? ¡Úsalo aquí!</p>
                <div class="d-flex">
                    <input class="input-text" type="text" placeholder="Escribe tu código">
                    <input class="btn-aplicar" type="button" value="APLICAR">
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center flex-column" style="height: 150px; background-color: #EEEEEE;">
                <p>Pago 100% seguro</p>
                <div class="d-flex">
                    <img src="assets/images/methodPay.png" alt="">
                </div>
            </div>
        </div>
    </section>
</body>

</html>