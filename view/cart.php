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
    <section class="container d-flex flex-row justify-content-between" style="margin-top: 55px; min-height: 650px; width: 1170px;">
        <div class="col-8">
            <div class="row custom-title">
                <h3 style="font-size: 19px; font-weight: bold; padding: 0;">Cesta Productos</h3>
            </div>
            <div class="row d-flex align-items-center custom-head">
                <h3>Conforama</h3>
            </div>

            <?php if (count($_SESSION['items']) == 0) { ?>
                <div class="container d-flex flex-column align-items-center mt-5" style="width: 100%;">
                    <h2>¡Parece que aún no has añadido nada!</h2>
                    <p>Vuelve a la tienda y añade tu desayuno.</p>
                </div>
            <?php }
            $pos = 0; ?>

            <?php foreach ($_SESSION['items'] as $producto) { ?>
                <div class="row d-flex flex-row align-items-center justify-content-between px-4" style="height: 250px; margin-top: 20px; background-color: white; border-radius: 3px;">

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
                            <div class="d-flex justify-content-center align-items-center add-remove-form">
                                <form class="form-cart" action="<?= URL . "?controller=cart" ?>" method="POST">
                                    <button class="button-less" type="submit" name="Del" value="<?= $pos ?>">-</button>
                                    <input class="button-cantidad" type="text" value="<?= $producto->getCantidad() ?>" style="width: 30px;">
                                    <button class="button-add" type="submit" name="Add" value="<?= $pos ?>">+</button>
                                </form>
                            </div>

                            <form action="#" method="POST">
                                <input name="" value="" hidden>
                                <button class="btn" style="margin-bottom: 5px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 512 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com 
                                        License - https://fontawesome.com/license (Commercial License) Copyright 
                                        2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #474747
                                            }
                                        </style>
                                        <path d="M471.6 
                                        21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9
                                        21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 
                                        88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 
                                        21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 
                                        53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 
                                        32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 
                                        32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                    </svg>
                                </button>
                                <br>
                            </form>
                        </div>
                        <div class="col-12">
                            <hr style="height: 1px; border: solid 1px black; margin: 14px 0 2px 0;">
                        </div>
                        <div class="col-12 d-flex" style="height: 30px;">
                            <input type="checkbox" style="margin-right: 10px;">
                            <p class="text-bill-cart mb-0" style="line-height: 30px;">Lo quiero para llevar</p>
                        </div>
                    </div>
                    <div class="col-1 d-flex pt-4 ml-5" style="height: 100%;">

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

        <div id="container-modal-puntos">
            <div class="content-modal">
                <p class="title-modal">Aplicar descuento</p>
                <div class="info-puntos">
                    <h2>Puntos disponibles: 0</h2>
                    <p>Puntos a usar:</p>
                    <input class="input-puntos" type="number" value="0">
                    <p class="descuento">Descuento total: <span>0</span>€</p>
                </div>
                <div class="control-puntos">
                    <button class="btn-control-puntos">Aplicar</button>
                    <button class="btn-control-puntos">Cancelar</button>
                </div>
            </div>
        </div>

        <div class="col-3 p-3 mt-5" style="max-height: 320px; background-color: white;">
            <div id="container-puntos">
                <p class="puntos">Tus puntos: <span id="puntos">0</span></p>
                <button class="btn-puntos" onclick="openModal()">Usar puntos</button>
            </div>

            <div class="col-12 pl-2 d-flex align-items-center custom-head-2">
                <h3 style="font-size: 15px;">Conforama</h3>
            </div>

            <div class="col-12">
                <div class="col-12 d-flex justify-content-between" style="height: 20px;">
                    <p class="text-bill-cart">Productos</p>
                    <p class="text-bill-cart"><?= $totalPrice ?> €</p>
                </div>
                <hr style="height: 1px; border: solid 1px black;">
                <div class="col-12 d-flex justify-content-between">
                    <p class="text-bill-cart">Total (IVA exc.)</p>
                    <p class="text-bill-cart"><?= $withoutIva ?> €</p>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <p class="text-bill-cart">IVA (10%)</p>
                    <p class="text-bill-cart"><?= $ivaProduct ?> €</p>
                </div>
                <div class="col-12 d-flex justify-content-between mb-3">
                    <p class="text-bill-cart">Total (IVA inc.)</p>
                    <p class="text-bill-cart"><?= $totalPrice ?> €</p>
                </div>
                <div class="col-12">
                    <a type="button" href="<?= URL . "?controller=pedido&action=loginOrRegister" ?>" class="custom-btn-tramitar">TRAMITAR PEDIDO <span><ion-icon name="arrow-dropright"></ion-icon></span></a>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center align-items-center flex-column" style="height: 150px;">
                <p class="mt-3" style="font-size: 14px;">¿Tienes un cupón/bono? ¡Úsalo aquí!</p>
                <div class="d-flex">
                    <input class="input-text" type="text" placeholder="Escribe tu código">
                    <input class="btn-aplicar" type="button" value="APLICAR">
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center flex-column w-100 m-0 p-0" style="height: 150px; background-color: #EEEEEE;">
                <p class="text-bill-cart">Pago 100% seguro</p>
                <div class="d-flex">
                    <img src="assets/images/methodPay.png" alt="metodos de pago">
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/cart.js"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>