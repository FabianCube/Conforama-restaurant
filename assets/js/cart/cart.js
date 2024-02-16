const API_URL = 'http://localhost/conforama-restaurant/?controller=API&action=api';

const modal = document.getElementById('container-modal-puntos');
const modalPropina = document.getElementById('container-modal-propina');
const points = document.getElementById('points');
const modal_points = document.getElementById('modal-points');
const triggerDiscount = document.getElementById('trigger-discount');
const proceedButton = document.getElementById('proceed-comand');
const discountPts = document.getElementById('discount-section');
const discountEur = document.getElementById('discount-section-money');
const discountEurTotal = document.getElementById('discount-section-money-total');

const initPropina = 0.03;
const lowPropina = 0.10;
const mediumPropina = 0.20;
const highPropina = 0.30;

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
    sessionStorage.setItem("finalPrice", null)
}

async function getUserPoints() 
{
    let result = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=getPoints'
    });

    let data = await result.json();

    if (data.success == "true") {
        return data.puntos;
    }
    else {
        notie.alert({
            text: "Usuario admin no puede aplicar descuentos."
        });

        return "-";
    }
}

async function updateUserPoints(action, pts) 
{
    let operation;

    switch (action) {
        case 0: // Eliminar puntos
            operation = "removePoints";
            console.log("[INFO] updateUserPoints: Entrando en: " + operation);
            break;
        case 1: // Añadir puntos
            operation = "addPoints";
            console.log("[INFO] updateUserPoints: Entrando en: " + operation);
            break;
        default:
            console.log("[FAIL] updateUserPoints: Accion no reconocida.");
    }

    let data = new URLSearchParams({
        accion: operation,
        pts: pts
    });

    console.log("content of data in updateUserPoints: " + data);

    fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: data
    })
        .then(response => response.json())
        .then(setUp())
        .catch(err => console.log(err));
}

function proceedComand() 
{
    let pointsUsed = document.getElementById('input-puntos').value;
    let totalDiscount;
    let totalPrice;

    discountPts.classList.remove('discount-hidden');
    discountEur.classList.remove('discount-hidden');
    discountEurTotal.classList.remove('discount-hidden');
    closeModal();

    sessionStorage.setItem("usedPoints", pointsUsed);
    document.getElementById('total-discount').textContent = pointsUsed;

    // al depender de un resultado para conseguir el siguiente hay 
    // que preparar la lógica para que sea asyncrona.
    exchangePoints(pointsUsed)
        .then(discount => {
            console.log("[INFO]proceedComand: descuento a aplicar: " + discount)
            document.getElementById('total-discount-money').textContent = discount
            totalDiscount = discount;
        })
        .then(() => getTotalPriceWithoutDiscount()
            .then(total => {
                console.log("[INFO]proceedComand: valor total sin descuentos: " + total);
                totalPrice = total;
            }))
        .then(() => {
            let value = (totalPrice - totalDiscount).toFixed(2);
            console.log("[INFO]proceedComand: valor final: " + value);

            document.getElementById('total-discount-money-applied').textContent = value;

            console.log("[INFO]proceedComand: setteando 'finalPrice' como " + value);
            sessionStorage.setItem("finalPrice", value);
        });

    notie.alert({
        text: "¡Descuento aplicado!"
    })
}

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

    let dataFetch = await response.json()
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

function openModalPropina() 
{
    modalPropina.style.display = "block";
}

function closeModalPropina() 
{
    modalPropina.style.display = "none";
}

function addPropina() 
{
    console.log("entrando a addPropina()");
    let propinaSelecionada;
    let propina;
    let propinaCustom = document.querySelector('input[name="tip"]:checked').value;

    if (propinaCustom === 'custom') 
    {
        tipAmount = parseFloat(document.querySelector('input[name="custom_tip"]').value);
    } 
    else 
    {
        tipAmount = parseFloat(propinaCustom);
    }
    
    console.log('La cantidad de propina seleccionada es: ' + tipAmount + '%');

    getTotalPriceWithoutDiscount().then(priceValue => {
        console.log("priceValue = " + priceValue + ", tipAmount = " + tipAmount);
        propina = (parseFloat(priceValue) * tipAmount / 100).toFixed(2);
        console.log("Propina: " + propina + "€");

        sessionStorage.setItem("propinaSelecionada", propina);
    }).then(() => {
        window.location.href = "?controller=pedido&action=loginOrRegister";
    });
}

proceedButton.addEventListener("click", (event) => {
    event.preventDefault();
    openModalPropina();
});