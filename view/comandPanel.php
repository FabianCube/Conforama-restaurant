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

            <div id="filtro-categorias">
                <input type="checkbox" id="cafes" value="0" onchange="filtrarProductos()"> <label for="cafes">Cafes</label><br>
                <input type="checkbox" id="bocadillos" value="1" onchange="filtrarProductos()"> <label for="bocadillos">Bocadillos</label><br>
                <input type="checkbox" id="smoothies" value="2" onchange="filtrarProductos()"> <label for="smoothies">Smoothies</label><br>
                <input type="checkbox" id="muffins" value="3" onchange="filtrarProductos()"> <label for="muffins">Muffins</label><br>
                <input type="checkbox" id="batidos" value="4" onchange="filtrarProductos()"> <label for="batidos">Batidos</label><br>
                <input type="checkbox" id="donuts" value="5" onchange="filtrarProductos()"> <label for="donuts">Donuts</label><br>
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