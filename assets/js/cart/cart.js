const API_URL = 'http://localhost/conforama-restaurant/?controller=API&action=api';
const modal = document.getElementById('container-modal-puntos');
const points = document.getElementById('points');
const modal_points = document.getElementById('modal-points');
const triggerDiscount = document.getElementById('trigger-discount');
const proceedButton = document.getElementById('proceed-comand');

function openModal()
{
    modal.style.display = "block";
}

function closeModal()
{
    modal.style.display = "none";
}

function setUp()
{
    getUserPoints().then(pts => {
        console.log("[INFO] setUp: Puntos de usuario cargados correctamente. [" + pts + " pts.]");
        points.textContent = pts;
        modal_points.textContent = pts;
    });

    sessionStorage.setItem("usedPoints", 0)
}

async function getUserPoints()
{
    let result = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=getPoints'
    });

    let data = await result.json();

    if(data.success == "true")
    {
        return data.puntos;
    }
    else
    {
        notie.alert({
            text: "Usuario admin no puede aplicar descuentos."
        });

        return "-";
    }
}

async function updateUserPoints(action, pts)
{
    let operation;

    switch(action)
    {
        case 1: // Añadir puntos
            operation = "addPoints";
            break;
        case 0: // Eliminar puntos
            operation = "removePoints";
            break;
        default:
            console.log("[FAIL] updateUserPoints: Accion no reconocida.");
    }

    let data = new URLSearchParams({
        accion: operation,
        pts: pts
    });

    fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: data
    }).then(response => response.json()).then(() => setUp());
}

triggerDiscount.addEventListener("click", async () => {
    let pointusUsed = document.getElementById('input-puntos').value

    // 0 for remove points
    // updateUserPoints(0, pointusUsed).then(() => { 
    //     document.getElementById('discount-section').classList.remove('discount-hidden');
    //     closeModal()
    // });

    document.getElementById('discount-section').classList.remove('discount-hidden');
    closeModal()

    sessionStorage.setItem("usedPoints", pointusUsed)
    document.getElementById('total-discount').textContent = pointusUsed

    notie.alert({
        text: "¡Descuento aplicado!"
    })
});

proceedButton.addEventListener("click", () => {
    // 
});