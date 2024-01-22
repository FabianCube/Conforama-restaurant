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
                <a style="color: var(--red-color);" href="#">Todos los comentarios</a>
            </div>
            <div class="d-flex flex-row">
                <div class="d-flex flex-row">
                    <p>Filtrar por puntuación: </p>
                    <select name="" id="">
                        <option value="5">5 estrellas</option>
                    </select>
                </div>
                <div class="d-flex flex-row mx-3">
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
            const contenedorOpiniones = document.getElementById('contenido-opiniones');
            contenedorOpiniones.innerHTML = '';

            opiniones.forEach(opinion => {
                const opinionElemento = document.createElement('div');

                opinionElemento.classList.add('opinion-styled');

                opinionElemento.innerHTML = `
                <div style="display: flex; flex-flow: row;">
                    <div style="width: 350px;">
                        <div style="display: flex; flex-flow: row;">
                            <div style="width: 45px; height: 45px; border-radius: 50%; background-color: lightgrey; margin-right: 15px;"></div>
                            <div style="display: flex; flex-flow: column;">
                                <p class="text-important" style="margin: 0; padding: 0;"> ${opinion.username} ${opinion.lastname}</p>
                                <p style="margin: 0; padding: 0;">Fecha: ${opinion.fecha_opinion} </p>
                            </div>
                        </div>
                    </div>
                        
                    <hr style="border: solid 1px black; margin: 0 30px 0 30px;">
                    <div>
                        <p>${obtenerEstrellas(opinion.puntuacion)}</p>
                        <p class="text-important">${opinion.titulo}</p>
                        <p>${opinion.opinion}</p>
                    </div>
                </div>
                    `;

                contenedorOpiniones.append(opinionElemento);
            });
        }

        function obtenerEstrellas(puntuacion)
        {
            let html = '';
            switch(puntuacion)
            {
                case 1:
                    html = '<img src="__DIR__ /../assets/images/1_estrella.svg"></img>';
                    break;
                case 2:
                    html = '<img src="__DIR__ /../assets/images/2_estrella.svg"></img>';
                    break;
                case 3:
                    html = '<img src="__DIR__ /../assets/images/3_estrella.svg"></img>';
                    break;
                case 4:
                    html = '<img src="__DIR__ /../assets/images/4_estrella.svg"></img>';
                    break;
                case 5:
                    html = '<img src="__DIR__ /../assets/images/5_estrella.svg"></img>';
                    break;
            }
            return html;
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