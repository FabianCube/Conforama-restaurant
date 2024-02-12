let discSection = document.getElementById('discount-section');
let valueDiscount = document.getElementById('total-discount');

let usedPts = sessionStorage.getItem("usedPoints");

function setUp()
{
    discSection.classList.remove('discount-hidden')
    valueDiscount.textContent = usedPts
}

document.getElementById('finish-order').addEventListener("click", async () => {
    updateUserPoints(0, usedPts).then(() => exchangeUserPoints())
});

function exchangeUserPoints()
{
    fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=moneySpent'
    }).then(response => response.json()).then(data => updateUserPoints(1, data.spent));

}