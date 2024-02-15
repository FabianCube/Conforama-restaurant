<?php
include_once 'model/ProductoDAO.php';
include_once 'config/parameters.php';


if (!isset($_POST["categoria_id"])) {
    $productos = ProductoDAO::getAllProducts();
} else {
    $productos = ProductoDAO::getProductsByCategory($_POST["categoria_id"]);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="assets/style/comandPanel.css">
    <link rel="stylesheet" href="assets/style/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Pedidos</title>
</head>

<body onload="getProductos()">
    <section class="container pt-5 d-flex flex-row justify-content-between" style="margin-top: 55px; width: 1140px;">
        <div class="col-xl-3 col-lg-4 me-5" style="width: 270px;">
            <div class="p-4 d-flex align-items-center header-category-filter" style="height: 70px;">
                <p>Categorías</p>
            </div>
            <div class="container p-4 custom-container-filter">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <div class="filter-container">
                        <form action=<?= URL . "?controller=productos" ?> method="post">
                            <input name="no_filter" value="0" hidden>
                            <button type="submit" class="filter-text">Todos</button>
                        </form>
                    </div>
                    <div class="filter-container">
                        <form action=<?= URL . "?controller=productos" ?> method="post">
                            <input name="categoria_id" value="0" hidden>
                            <button type="submit" class="filter-text">Cafés</button>
                        </form>
                    </div>
                    <div class="filter-container">
                        <form action=<?= URL . "?controller=productos" ?> method="post">
                            <input name="categoria_id" value="2" hidden>
                            <button type="submit" class="filter-text">Smoothies</button>
                        </form>
                    </div>
                    <div class="filter-container">
                        <form action=<?= URL . "?controller=productos" ?> method="post">
                            <input name="categoria_id" value="3" hidden>
                            <button type="submit" class="filter-text">Muffins</button>
                        </form>
                    </div>
                    <div class="filter-container">
                        <form action=<?= URL . "?controller=productos" ?> method="post">
                            <input name="categoria_id" value="1" hidden>
                            <button type="submit" class="filter-text">Sandwitchs</button>
                        </form>
                    </div>
                    <div class="filter-container">
                        <form action=<?= URL . "?controller=productos" ?> method="post">
                            <input name="categoria_id" value="5" hidden>
                            <button type="submit" class="filter-text">Donuts</button>
                        </form>
                    </div>
                    <div class="filter-container">
                        <form action=<?= URL . "?controller=productos" ?> method="post">
                            <input name="categoria_id" value="4" hidden>
                            <button type="submit" class="filter-text">Batidos</button>
                        </form>
                    </div>
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
                            <p style="font-size:12px;">1 - 20 productos</p>
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
            <div id="container-productos" class="row">
                    
            </div>

        </div>
    </section>

    <script src="assets/js/productos/productos.js"></script>
</body>

</html>