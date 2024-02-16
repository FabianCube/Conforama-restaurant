let discSection = document.getElementById('discount-section');
let totalSection = document.getElementById('discount-section-money-total');

let valueDiscount = document.getElementById('total-discount');
let finalPriceContainer = document.getElementById('total-discount-money-applied');

let propinaSection = document.getElementById('propina-section');
let textPropina = document.getElementById('text-propina');

let usedPts = sessionStorage.getItem("usedPoints");
let finalPrice = sessionStorage.getItem("finalPrice");
let propinaSelecionada = sessionStorage.getItem("propinaSelecionada");

function setUp()
{
    if(finalPrice !== "null")
    {
        console.log("[INFO] setUp: precio final: " + finalPrice);
        
        valueDiscount.textContent = usedPts
        discSection.classList.remove('discount-hidden')
        totalSection.classList.remove('discount-hidden')

        finalPriceContainer.textContent = finalPrice;
    }

    if(propinaSelecionada !== "null")
    {
        console.log("[INFO] setUp: propina: " + propinaSelecionada);
        propinaSection.classList.add('propinaActive');
        textPropina.textContent = propinaSelecionada;
    }
}

function endCommand()
{
    let precioFinal = null;
    let propinaFinal = 0;

    console.log("[INFO] endCommand: entrando en endCommand");
    console.log("Puntos a usar : " + usedPts);

    // elimino los puntos gastados then agrego los puntos ganados
    console.log("[INFO] endCommand: entrando en exchangeUserPoints (delete)");
    updateUserPoints(0, usedPts).then(exchangeUserPoints());

    if(finalPrice !== "null")
    {
        precioFinal = finalPrice;
    }

    if(propinaSelecionada !== "null")
    {
        propinaFinal = propinaSelecionada;
    }
    
    let data = new URLSearchParams({
        accion: 'updateCartPrice',
        precioFinal: precioFinal,
        propina: propinaFinal
    });

    console.log("[INFO] endCommand: valor de data: " + data);

    fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: data
    })
    .then(response => response.json())
    .catch(err => console.log(err));

    //console.log("[INFO] endCommand: Eliminando 'finalPrice'.");
    // sessionStorage.removeItem("finalPrice");
    
    console.log("[INFO] endCommand: Clear session.");
    sessionStorage.clear();
}

function exchangeUserPoints()
{
    fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=moneySpent'
    }).then(response => response.json()).then(data => updateUserPoints(1, data.spent));
}

