<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opiniones</title>
</head>

<body onload="cargarOpiniones()">
    <section style="margin-top: 90px;">
        <div id="contenido-opiniones">
            
        </div>
    </section>
    
    <script>
    function cargarOpiniones() 
    {
        let resultado = fetch("http://localhost/conforama-restaurant/?controller=API&action=api", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(data => data.json()).then(opiniones => mostrarOpiniones(opiniones))
            .catch(error => console.error("ERROR al cargar las opiniones.", error));
    }
    
    function mostrarOpiniones(opiniones) {
            // Obtener el contenedor donde se mostrarán las opiniones
            const contenedorOpiniones = document.getElementById('contenido-opiniones');
            contenedorOpiniones.innerHTML = '';

            for (const key in opiniones) {
                if (opiniones.hasOwnProperty(key)) {
                    const opinionElement = document.createElement('div');
                    opinionElement.innerHTML = `
                        <p>${key}: ${opiniones[key]}</p>
                        <hr>
                    `;
                    contenedorOpiniones.appendChild(opinionElement);
                }
            }
        }
</script>
</body>


</html>