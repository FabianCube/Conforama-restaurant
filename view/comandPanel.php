<?php
include_once 'model/ProductoDAO.php';
include_once 'config/parameters.php';

$productos = ProductoDAO::getAllProducts();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/comandPanel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Pedidos</title>
</head>

<body class="container">
    <section class="container row pt-3">
        <div class="col-3">
            <div class="p-4 d-flex align-items-center" style="height: 70px;">
                <p>Categorías</p>
            </div>
            <div class="container p-4" style="background-color: #F6F6F6;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#">Todos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cafés</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Smoothies</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Muffins</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sandwitchs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Donuts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Batidos</a></li>
                </ul>
            </div>
        </div>
        <div class="col-9">
            <div class="d-flex flex-row justify-content-between">
                <div class="col-12 d-flex flex-column">
                    <div class="col-12 d-flex flex-row justify-content-between align-items-center">
                        <div class="col-2">
                            <p>Carta</p>
                        </div>
                        <div class="col-10 d-flex flex-row justify-content-end">
                            <p>1 - 20 productos</p>
                            <select class="form-select ms-3" aria-label="Small select example" style="height: 30px; width: 200px; font-size: .8rem;">
                                <option selected>Recomendados</option>
                                <option value="1">Más baratos primero</option>
                                <option value="2">Más caros primero</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr style="height: 1px; border: solid 1px black;">
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($productos as $producto) { ?>
                    <div class="col-4">
                        <div class="card mb-3" style="width: 18rem; height: 468px;">
                            <div class="container d-flex justify-content-center p-3" style="width: 200px; height: 180px;">
                                <img src="assets/images/<?= $producto->getUrl_img() ?>" class="img-fluid" alt="Product image">
                            </div>
                            <div class="container d-flex justify-content-center">
                                <div class="custom-label-recomendado d-flex justify-content-center" style="width: 150px;">
                                    <p class="custom-txt-recomendado">RECOMENDADO DEL MES</p>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-between flex-column">
                                <div class="d-flex flex-row">
                                    <div class="col-8">
                                        <h5 class="card-title custom-title-card"><?= $producto->getNombre_producto() ?></h5>
                                        <p class="card-text custom-description-product"><?= $producto->getDescripcion() ?></p>
                                        <p class="card-text custom-description-product-2">Vendido por Conforama</p>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end">
                                        <p class="card-text custom-product-price"><?= $producto->getPrecio_producto() ?>€</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <form action=<?= URL . "?controller=productos&action=modificar" ?> method="post">
                                        <input name="producto_id" value="<?= $producto->getProducto_id() ?>" hidden>
                                        <button class="btn btn-success" style="width: 7.5rem;" type="submit">Modificar</button>
                                    </form>
                                    <form action=<?= URL . "?controller=productos&action=eliminar" ?> method="post">
                                        <input name="producto_id" value="<?= $producto->getProducto_id() ?>" hidden>
                                        <button class="btn btn-danger" style="width: 7.5rem;" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>