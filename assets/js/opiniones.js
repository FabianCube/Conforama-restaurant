
async function cargarOpiniones() {
    let resultado = fetch("http://localhost/conforama-restaurant/?controller=API&action=api", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: "accion=buscar_pedido"
        }).then(data => data.json()).then(opiniones => mostrarOpiniones(opiniones))
        .catch(error => console.error("ERROR al cargar las opiniones.", error));

    if (resultado) {
        console.log("[INFO] cargarOpiniones: Opiniones cargadas correctamente.");
    }
}

function mostrarOpiniones(opiniones) {
    const contenedorOpiniones = document.getElementById('contenido-opiniones');
    contenedorOpiniones.innerHTML = '';

    // muestro las reseñas más recientes primero.
    opiniones.reverse();

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
    // notie.alert({
    //     text: 'Opiniones cargadas correctamente!'
    // })

    console.log("[INFO] mostrarOpiniones: Mostrando opiniones correctamente.");
}

function obtenerEstrellas(puntuacion) {
    let html = '';
    switch (puntuacion) {
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

document.getElementById("filtroEstrellas").addEventListener('change', (e) => {
    filtrarYOrdenarOpiniones(e.target.value, document.getElementById("orderOpiniones").value);
});

document.getElementById("orderOpiniones").addEventListener('change', (e) => {
    filtrarYOrdenarOpiniones(document.getElementById("filtroEstrellas").value, e.target.value);
});

function filtrarYOrdenarOpiniones(filtro, order) {
    let resultado = fetch("http://localhost/conforama-restaurant/?controller=API&action=api", {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "accion=buscar_pedido"
    }).then(data => data.json()).then(opiniones => {
        
        let opinionesFiltradas = opiniones;

        // FILTRO
        if(filtro != "0")
        {
            console.log("Reseñas con puntuacion.");
            let filtrado = opinionesFiltradas.filter((e) => {
                return e.puntuacion == filtro;
            });

            console.log("[INFO] Filtrando opiniones por puntuación.");
            opinionesFiltradas = filtrado;
        }

        // ORDENADO
        if (order === "0") {
            console.log("[INFO] ordenando reseñas en orden descendente.");
            opinionesFiltradas.reverse();
        }
        else
        {
            console.log("[INFO] ordenando reseñas en orden ascendente.");
        }

        mostrarOpiniones(opinionesFiltradas);
    }).catch(error => console.error("ERROR al cargar las opiniones.", error));
}

let containerAddOpinion;

document.getElementById('btn-add-opinion').addEventListener('click', () => {

    if (sessionStorage.getItem("isLogged") == "true" && sessionStorage.getItem("modalOpen") == "false") 
    {
        console.log("[INFO] eventListener('btn-add-opinion'): El usuario tiene sesión. Abriendo modal para inserción de reseña.");

        const bc = document.getElementById('crear-opinion');
        containerAddOpinion = document.createElement('div');
        containerAddOpinion.classList.add('container-new-review');

        setTimeout(() => {
            containerAddOpinion.style.height = "300px";
        }, 1);

        containerAddOpinion.innerHTML = `
        <div style="display:flex; padding: 30px;">
            <div style="width: 300px; margin-right: 30px;">
                <p>Titulo</p><input type="text" id="titulo_opinion" name="titulo_opinion" style="width: 100%;">
                <p>Reseña</p><input type="text" id="opinion_usuario" name="texto_opinion" style="height: 100px;width: 100%;">
            </div>

            <div style="width: 200px;">
                <p>Puntuación</p>
                <select id="puntuacionUsuario" name="puntuacion_opinion">
                    <option disabled selected value> -- seleccionar -- </option>
                    <option value="5">5 estrellas</option>
                    <option value="4">4 estrellas</option>
                    <option value="3">3 estrellas</option>
                    <option value="2">2 estrellas</option>
                    <option value="1">1 estrellas</option>
                </select>
                <p>Selecionar reseña</p>
                <select name="pedidosUsuario" id="pedidosUsuario">
                    ${showPedidosAvailables()}
                </select>
                <div style="margin-top: 15px;">
                    <button onclick="uploadOpinion()" class="btn-review">Publicar</button>
                    <button onclick="cerrarFormulario()" class="btn-review">Cancelar</button>
                </div>
            </div>
        </div>`;

        sessionStorage.setItem("modalOpen", true)
        bc.append(containerAddOpinion);
    } 
    else if(sessionStorage.getItem("isLogged") == "false")
    {
        console.log("[INFO] eventListener('btn-add-opinion'): El usuario no tiene sesión iniciada. No puede publicar reseña.");
        notie.confirm({
            text: 'Necesitas disponer de cuenta <br> ¿Ir a iniciar sesión?',
            submitText: "Ir al login",
            cancelText: "Cancelar",
            cancelCallback: () => notie.alert({
                text: 'Cancelado'
            }),
            submitCallback: () => this.location.href = 'http://localhost/conforama-restaurant/?controller=login',
        })
    }
    else
    {
        console.log("[INFO] btn-add-opinion: Modal ya está abrierto.")
    }

});

function cerrarFormulario()
{
    console.log("[INFO] cerrarFormulario: Cerrando formulario.")
    containerAddOpinion.remove()

    sessionStorage.setItem("modalOpen", false)
}

function showPedidosAvailables()
{
    let result = ``;

    let pedidos = localStorage.getItem("availablePedidos");

    if(pedidos === null)
    {
        console.log("[INFO] showPedidosAvailables: No hay pedidos disponibles.");
    }
    else
    {
        console.log("[INFO] showPedidosAvailables: Pedidos disponibles -> " + pedidos);
    }

    // for(let i = 0; i < pedidos.length; i++)
    // {
    //     result = result + `<option value="${pedidos[i]}">Pedido ID: ${pedidos[i]}</option>`;
    // }
    
    return result;
}

async function uploadOpinion() {

    const titulo_opinion = document.getElementById("titulo_opinion").value;
    const texto_opinion = document.getElementById("opinion_usuario").value;
    const puntuacion_opinion = document.getElementById("puntuacionUsuario").value;
    const pedidoID = document.getElementById("pedidosUsuario").value;

    let date = new Date();
    const fecha_opinion = date.toISOString();

    // Preparo los parametros que quiero pasarle a la api para guardarlos en DB.
    let data = new URLSearchParams({
        accion: "add_review",
        titulo_opinion: titulo_opinion,
        texto_opinion: texto_opinion,
        puntuacion_opinion: puntuacion_opinion,
        fecha_opinion: fecha_opinion,
    });

    // Le paso los parametros por "body", mediante POST.
    let resultado = await fetch("http://localhost/conforama-restaurant/?controller=API&action=api", {
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: data
    }).then(response => response.json())
    .catch(function(err) { console.log(err) });

    if (resultado) 
    {
        console.log("[SUCCESS] uploadOpinion/fetch: Opinion enviada correctamente.");
        cerrarFormulario()

        notie.alert({
                text: '¡Reseña subida correctamente!'
        })
    }
    else 
    {
        console.log("[FAILED] uploadOpinion/fetch: Error al enviar la opinion.");

        notie.alert({
            text: '¡Error al subir la reseña!'
        })
    }

    console.log("[INFO] uploadOpinion: Lanzando cargarOpiniones()");
    await cargarOpiniones();
}

function getUserData() 
{
    fetch("http://localhost/conforama-restaurant/?controller=API&action=api", {
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: "accion=isLogged"
    }).then(data => data.json()).then(user => loadUserData(user)).then( getAvailablePedidos() )
    .catch(function(err) { console.log(err) });
}

function getAvailablePedidos()
{
    console.log("Entrando en getAvailablePedidos");
    fetch("http://localhost/conforama-restaurant/?controller=API&action=api", {
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: "accion=availablePedidos"
    }).then(response => response.json()).then(data => loadAvailablePedidos(data.pedidos))
    .catch(function(err){ console.log(err) })
}

function loadAvailablePedidos(pedidos)
{
    if(pedidos)
    {
        console.log("[SUCCESS] loadAvailablePedidos: Cargando los pedidos disponibles.");
        
        let ped = pedidos;
        
        localStorage.setItem("availablePedidos", "hola");
    }
    else
    {
        console.log("[FAILED] loadAvailablePedidos: No se han podido cargar los pedidos disponibles.");
    }
}

function loadUserData(user)
{
    let logged = false;

    if (user.usuario_id != null) 
    {
        console.log("[INFO] loadUserData: Sesión iniciada con usuario_id -> " + user.usuario_id + ".")

        logged = true;
    } 
    else
    {
        console.log("[INFO] loadUserData: No hay ningúna sesión iniciada.");
    }

    sessionStorage.setItem("isLogged", logged.toString());
}

function setDefaults()
{
    sessionStorage.setItem("modalOpen", false)
    console.log("modalOpen = " + sessionStorage.getItem("modalOpen"))
}