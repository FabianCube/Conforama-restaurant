let discSection = document.getElementById('discount-section');
let totalSection = document.getElementById('discount-section-money-total');

let valueDiscount = document.getElementById('total-discount');
let finalPriceContainer = document.getElementById('total-discount-money-applied');

let usedPts = sessionStorage.getItem("usedPoints");
let finalPrice = sessionStorage.getItem("finalPrice");

function setUp()
{
    discSection.classList.remove('discount-hidden')
    totalSection.classList.remove('discount-hidden')
    valueDiscount.textContent = usedPts
    finalPriceContainer.textContent = finalPrice
}

document.getElementById('finish-order').addEventListener("click", (event) => {
    //event.preventDefault()
    updateUserPoints(0, usedPts).then(() => exchangeUserPoints())
    

    let data = new URLSearchParams({
        accion: 'updateCartPrice',
        finalPrice: finalPrice
    });

    fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: data
    });
    
    // sessionStorage.removeItem("finalPrice");
    //window.location.href = event.target.href;
});

function exchangeUserPoints()
{
    fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=moneySpent'
    }).then(response => response.json()).then(data => updateUserPoints(1, data.spent));
}