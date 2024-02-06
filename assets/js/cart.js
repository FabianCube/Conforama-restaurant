let modal = document.getElementById('container-modal-puntos');

function openModal()
{
    modal.style.display = "block";
}

function closeModal()
{
    modal.style.display = "none";
}

modal.addEventListener("click", (event) => {
    if(event.target)
    {   
        closeModal()
    }
})