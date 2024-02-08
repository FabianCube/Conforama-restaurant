const API_URL = 'http://localhost/conforama-restaurant/?controller=API&action=api';
const modal = document.getElementById('container-modal-puntos');

function openModal()
{
    modal.style.display = "block";
}

function closeModal()
{
    modal.style.display = "none";
}

function getUserPoints()
{
    sessionStorage.getItem('')
    // post param -> getPoints
    const points = document.getElementById('points');

    $body = new URLSearchParams({
        accion: 'getPoints',
        uid: $uid
    });

    fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=getPoints'
    }).then(response => {
        const data = response.data;
        console.log(data);
    });

    points.innerHTML = data.toString();
}