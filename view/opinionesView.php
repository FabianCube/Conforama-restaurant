<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opiniones</title>
    <link rel="stylesheet" href="assets/style/global.css">
    <link rel="stylesheet" href="assets/style/opiniones.css">
    <link href="assets/style/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
</head>

<body onload="cargarOpiniones();getUserData();setDefaults()" style="background-color: #F7F7F7;">
    <section class="container d-flex flex-column justify-content-center custom-container" style="margin-top: 110px;">
        <h1 class="titulo-principal">Reseñas de clientes</h1>
        <div id="resumen-opiniones" class="w-100 d-flex flex-row custom-resumen-opiniones ">

            <div id="valoracion-media" class="d-flex flex-column justify-content-center align-items-center" style="width: 20%;">
                <h2 class="titulo">Valoración media</h2>
                <h2 class="puntuacion">4.88</h2>
                <img src="__DIR__ /../assets/images/4_estrella.svg" style="height: 25px; width: auto;"></img>
            </div>

            <div id="puntuacion-estrellas" class="d-flex flex-column" style="width: 30%;">
                <div class="d-flex flex-row align-items-center custom-puntuacion">
                    <p>5 estrellas </p>
                    <div class="base">
                        <div class="porcent" style="width: 70%;"></div>
                    </div>
                    <p>70% (260)</p>
                </div>
                <div class="d-flex flex-row align-items-center custom-puntuacion">
                    <p>4 estrellas </p>
                    <div class="base">
                        <div class="porcent" style="width: 20%;"></div>
                    </div>
                    <p>20% (75)</p>
                </div>
                <div class="d-flex flex-row align-items-center custom-puntuacion">
                    <p>3 estrellas </p>
                    <div class="base">
                        <div class="porcent" style="width: 5%;"></div>
                    </div>
                    <p>5% (22)</p>
                </div>
                <div class="d-flex flex-row align-items-center custom-puntuacion">
                    <p>2 estrellas </p>
                    <div class="base">
                        <div class="porcent" style="width: 4%;"></div>
                    </div>
                    <p>4% (17)</p>
                </div>
                <div class="d-flex flex-row align-items-center custom-puntuacion">
                    <p>1 estrellas </p>
                    <div class="base">
                        <div class="porcent" style="width: 1%;"></div>
                    </div>
                    <p>1% (4)</p>
                </div>
            </div>

            <div id="escribir-opinion" class="d-flex justify-content-end align-items-end" style="width: 50%;">
                <button id="btn-add-opinion" class="btn-default">Escribir mi opinion</button>
            </div>
        </div>

        <div id="crear-opinion"></div>

        <div class="d-flex flex-row justify-content-between my-4" style="background-color: #fff; height: 60px; padding: 20px;">
            <div>
                <a style="color: var(--red-color); cursor: pointer; text-decoration: underline;" onclick="cargarOpiniones()">Todos los comentarios</a>
            </div>
            <div class="d-flex flex-row">
                <div class="d-flex flex-row">
                    <p>Filtrar por puntuación: </p>
                    <select name="filtroEstrellas" id="filtroEstrellas">
                        <option disabled selected value="0"> -- seleccionar filtro -- </option>
                        <option value="5">5 estrellas</option>
                        <option value="4">4 estrellas</option>
                        <option value="3">3 estrellas</option>
                        <option value="2">2 estrellas</option>
                        <option value="1">1 estrellas</option>
                    </select>
                </div>
                <div class="d-flex flex-row mx-3">
                    <p>Ordenar de: </p>
                    <select name="OrderOpiniones" id="orderOpiniones">
                        <option disabled selected value> -- seleccionar filtro -- </option>
                        <option value="0">Más recientes primero</option>
                        <option value="1">Más antiguas primero</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="contenido-opiniones"></div>
    </section>

    <script src="assets/js/opiniones.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/notie"></script>
</body>

</html