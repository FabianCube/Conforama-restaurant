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
</head>

<body onload="cargarOpiniones()" style="background-color: #F7F7F7;">
    <section class="container d-flex flex-column justify-content-center custom-container" style="margin-top: 110px;">
    <h1 class="titulo">Reseñas de clientes</h1>
        <div id="resumen-opiniones" class="w-100 d-flex flex-row custom-resumen-opiniones ">

            <div id="valoracion-media" class="d-flex flex-column justify-content-center align-items-center" style="width: 20%;">
                <h2 class="titulo">Valoración media</h2>
                <h2 class="puntuacion">4.88</h2>
                <p>xxxxx</p>
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

        <div class="d-flex flex-row justify-content-between my-4" style="background-color: #fff; height: 60px;">
            <div>
                <a href="#">Todos los comentarios</a>
            </div>
            <div class="d-flex flex-row">
                <div class="d-flex flex-row">
                    <p>Filtrar por puntuación: </p>
                    <select name="" id="">
                        <option value="5">5 estrellas</option>
                    </select>
                </div>
                <div class="d-flex flex-row">
                    <p>Ordenar de: </p>
                    <select name="" id="">
                        <option value="5">Mayor a menor</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="contenido-opiniones"></div>
    </section>

    <script>
        function cargarOpiniones() {
            let resultado = fetch("http://localhost/conforama-restaurant/?controller=API&action=api", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(data => data.json()).then(opiniones => mostrarOpiniones(opiniones))
                .catch(error => console.error("ERROR al cargar las opiniones.", error));
        }

        function mostrarOpiniones(opiniones) {
            // Obtengo el contenedor donde se mostrarán las opiniones
            const contenedorOpiniones = document.getElementById('contenido-opiniones');
            contenedorOpiniones.innerHTML = '';

            opiniones.forEach(opinion => {
                const opinionElemento = document.createElement('div');
                const user_icon_default = document.createElement('div');

                opinionElemento.classList.add('opinion-styled');
                user_icon_default.classList.add('user-icon');

                opinionElemento.innerHTML = `
                    <p>Usuario ID -> ${opinion.usuario_id}</p>
                    <p>${opinion.fecha_opinion} </p>
                    <p>${opinion.puntuacion}/5 estrellas</p>
                    <hr>
                    <p>${opinion.opinion}</p>`;

                contenedorOpiniones.append(opinionElemento);
                opinionElemento.prepend(user_icon_default);
            });
        }

        document.getElementById('btn-add-opinion').addEventListener('click', () => {
            const bc = document.getElementById('crear-opinion');
            const containerAddOpinion = document.createElement('div');
            containerAddOpinion.classList.add('container-new-review');

            setTimeout(() => {
                containerAddOpinion.style.height = "300px";
            }, 1);

            containerAddOpinion.innerHTML = `<p>Opinion</p><br><input type='text'><button>Publicar</button>`;
            bc.append(containerAddOpinion);
        });

    </script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>


</html>