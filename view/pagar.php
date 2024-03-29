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

<body style="background-color: #F7F7F7;" onload="setUp()">

    <section class="container d-flex justify-content-center" style="margin-top: 95px;">
        <div>
            <h3 class="custom-cesta-title" style="width: 200px; text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <g clip-path="url(#clip0_44_207)">
                        <path d="M20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 
                        18.9464 12.6522 20 10 20C7.34784 20 4.8043 18.9464 2.92893 
                        17.0711C1.05357 15.1957 0 12.6522 0 10C0 7.34784 1.05357 
                        4.8043 2.92893 2.92893C4.8043 1.05357 7.34784 0 10 0C12.6522 0 
                        15.1957 1.05357 17.0711 2.92893C18.9464 4.8043 20 7.34784 20 
                        10ZM11.6038 5.0025H9.96375L7.59 6.73125V8.32L9.8825 
                        6.6725H9.96375V15H11.6038V5.0025Z" fill="#A1A1A1" />
                    </g>
                    <defs>
                        <clipPath id="clip0_44_207">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                CESTA
            </h3>
            <hr style="height: 1px; background-color: black ;">
        </div>
        <div>
            <h3 class="custom-price-text" style="width: 200px; text-align: center;">
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
                        6.1675 8.3075 6.93625 8.3075 7.8Z" fill="#444444" />
                    </g>
                    <defs>
                        <clipPath id="clip0_44_210">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                PAGO
            </h3>
            <hr style="height: 2px; background-color: #444; opacity: 1!important;">
        </div>

    </section>
    <section class="container d-flex flex-row justify-content-between" style="margin-top: 55px; min-height: 650px; width: 1170px;">

        <div class="col-8">
            <div class="row">
                <h3 style="font-size: 19px; color: #444444; font-weight: 900;">Información de envío</h3>
                <p style="font-size: 12px; margin-bottom: 0;">Dirección de envío: 
                <br><?=$_SESSION['current_user']->getDireccion() != null ? $_SESSION['current_user']->getDireccion() : "Sin información."?></p>
                <a href="#" style="font-size: 10px; text-decoration: underline; margin-bottom: 10px; color: #444;">Editar</a>

                <p style="font-size: 12px;">Dirección de facturación: <br>XXXX-XXXX-XXXX-XXXX</p>

            </div>
            <div class="row d-flex align-items-center custom-head mt-4">
                <h3>Envío 1: Conforama</h3>
            </div>

            <?php if (count($_SESSION['items']) == 0) { ?>
                <div class="container d-flex flex-column align-items-center mt-5" style="width: 100%;">
                    <h2>Parece que aún no has añadido nada!</h2>
                    <p>Vuelve a la tienda y añade tu desayuno.</p>
                </div>
            <?php }
            $pos = 0; ?>

            <?php foreach ($_SESSION['items'] as $producto) { ?>
                <div class="row d-flex flex-row align-items-center px-4" style="height: 200px; margin-top: 20px; background-color: white; border-radius: 3px;">

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
                        <div class="col-12 d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <form class="form-cart" action="<?= URL . "?controller=cart" ?>" method="POST">
                                    <input class="button-cantidad" type="text" value="Cantidad: <?= $producto->getCantidad() ?>" style="width: 100px;">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            <?php $pos++;
            } ?>
        </div>
        <div class="col-3 p-3" style="height: auto; background-color: white;">
            <div class="col-12 pl-2 d-flex align-items-center custom-head-2">
                <h3>Conforama</h3>
            </div>

            <div class="col-12">
                <div class="col-12 d-flex justify-content-between" style="height: 20px;">
                    <p style="font-size: 12px;">Productos</p>
                    <p style="font-size: 12px;"><?= $totalPrice ?> €</p>
                </div>
                <hr style="height: 1px; border: solid 1px black;">
                <div class="col-12 d-flex justify-content-between">
                    <p style="font-size: 12px;">Total (IVA exc.)</p>
                    <p style="font-size: 12px;"><?= $withoutIva ?> €</p>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <p style="font-size: 12px;">IVA (10%)</p>
                    <p style="font-size: 12px;"><?= $ivaProduct ?> €</p>
                </div>

                <div id="propina-section" class="col-12 d-flex justify-content-between">
                    <p style="font-size: 12px;">Propina</p>
                    <p style="font-size: 12px;"><span id="text-propina">0</span>€</p>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <p style="font-size: 12px;">Total (IVA inc.)</p>
                    <p style="font-size: 12px;"><?= $totalPrice ?> €</p>
                </div>

                <div id="discount-section" class="col-12 d-flex justify-content-between discount-hidden">
                    <p class="text-bill-cart">Discount (pts.)</p>
                    <p class="text-bill-cart">-<span id="total-discount"></span> pts.</p>
                </div>
                <div id="discount-section-money-total" class="col-12 d-flex justify-content-between mb-3 discount-hidden">
                    <p class="text-bill-cart">Total (Discount applied)</p>
                    <p class="text-bill-cart">-<span id="total-discount-money-applied"></span> €</p>
                </div>

                <div class="col-12">
                    <a id="finish-order" href="<?= URL . "?controller=pedido&action=realizarPedido"?>" class="custom-btn-tramitar" onclick="endCommand()">TRAMITAR PEDIDO <span><ion-icon name="arrow-dropright"></ion-icon></span></a>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center flex-column mt-3" style="height: 150px; background-color: #EEEEEE;">
                <p>Pago 100% seguro</p>
                <div class="d-flex">
                    <img src="assets/images/methodPay.png" alt="método de pago">
                </div>
            </div>
            </div>

            
        </div>
    </section>

    <script src="assets/js/cart/cart.js"></script>
    <script src="assets/js/cart/pagar.js"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>