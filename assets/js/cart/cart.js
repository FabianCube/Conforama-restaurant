const API_URL = 'http://localhost/conforama-restaurant/?controller=API&action=api';
const modal = document.getElementById('container-modal-puntos');
const points = document.getElementById('points');
const modal_points = document.getElementById('modal-points');
const triggerDiscount = document.getElementById('trigger-discount');
const proceedButton = document.getElementById('proceed-comand');
const discountPts = document.getElementById('discount-section');
const discountEur = document.getElementById('discount-section-money');
const discountEurTotal = document.getElementById('discount-section-money-total');

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
    let totalDiscount;
    let totalPrice;

    discountPts.classList.remove('discount-hidden');
    discountEur.classList.remove('discount-hidden');
    discountEurTotal.classList.remove('discount-hidden');
    closeModal()

    sessionStorage.setItem("usedPoints", pointusUsed)
    document.getElementById('total-discount').textContent = pointusUsed

    // al depender de un resultado para conseguir el siguiente hay 
    // que preparar la lógica para que sea asyncrona.
    exchangePoints(pointusUsed)
        .then(discount => {
            console.log("descuento a aplicar: " + discount)
            document.getElementById('total-discount-money').textContent = discount
            totalDiscount = discount;
        })
        .then(() => getTotalPriceWithoutDiscount()
            .then(total => {
                console.log("valor total sin descuentos: " + total);
                totalPrice = total;
            }))
        .then(() => {
            let value = (totalPrice - totalDiscount).toFixed(2)

            document.getElementById('total-discount-money-applied').textContent = value
            sessionStorage.setItem("finalPrice", value) //! NO SE ACTUALIZA BIEN.
        });

    notie.alert({
        text: "¡Descuento aplicado!"
    })
});

async function exchangePoints(pts)
{
    let data = new URLSearchParams({
        accion: "pointsSpent",
        points: pts
    });

    let response = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: data
    });

    let dataFetch =  await response.json()
    return dataFetch.money
}

function calculateTotalPrice()
{
    let total = getTotalPriceWithoutDiscount();
    console.log(total);
}   

async function getTotalPriceWithoutDiscount()
{
    let response = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=totalPriceNoDiscount'
    });

    let data = await response.json();
    return await data.price;
}