
function getProductos() 
{
    fetch('http://localhost/conforama-restaurant/?controller=API&action=api', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=getProductos'
    })
        .then(response => response.json())
        .then(data => showProductos(data))
        .catch(err => console.log(err));
}

function filtrarProductos() 
{
    console.log("entrando en filtrarProductos");

    fetch('http://localhost/conforama-restaurant/?controller=API&action=api', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'accion=getProductos'
    })
        .then(response => response.json())
        .then(productos => {
            // obtengo los checbox selecionados cada vez que hay un cambio de estado de estos.
            const checkboxes = document.querySelectorAll('#filtro-categorias input[type="checkbox"]:checked');
            const categoriasSeleccionadas = Array.from(checkboxes).map(checkbox => checkbox.value);

            // console.log(productos);

            const productosFiltrados = productos.filter(producto => {
                if (categoriasSeleccionadas.length === 0) 
                {
                    console.log("No hay filtros selecionados");
                    return true;
                }

                // comparo con los values de los checkbox selecionados, las categorias por las
                // que se quiere filtrar.
                return categoriasSeleccionadas.includes(producto.categoria_id.toString());
            });

            // console.log(productosFiltrados);
            showProductos(productosFiltrados);
        })
        .catch(err => console.log(err));
}

function showProductos(productos) 
{
    const container = document.getElementById('container-productos');
    container.innerHTML = '';

    productos.forEach(producto => {
        let content = `
        <div class="col-xl-4 col-lg-6">
            <div class="col-4 card mb-4 custom-card-hover" style="width: 256px; height: 468px;">
                <div class="container d-flex justify-content-center p-3" style="width: 200px; height: 180px;">
                    <img src="assets/images/${producto.url_img}" class="img-fluid" alt="Product image">
                </div>
                <div class="container d-flex justify-content-center">
                    <div class="custom-label-recomendado d-flex justify-content-center" style="width: 150px;">
                        <p class="custom-txt-recomendado">RECOMENDADO DEL MES</p>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between flex-column">
                    <div class="d-flex flex-row">
                        <div class="col-8">
                            <h5 class="card-title custom-title-card">${producto.nombre_producto}</h5>
                            <p class="card-text custom-description-product">${producto.descripcion}</p>
                            <p class="card-text custom-description-product-2">Vendido por Conforama</p>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <p class="card-text custom-product-price">${producto.precio_producto}€</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="" method="post">
                            <input name="producto_id" value="" hidden>
                            <button class="btn btn-danger d-flex align-items-center justify-content-center custom-btn-add-cart" style="width: 55px; height: 55px; border-radius: 50px;" type="submit">
                                <span class="material-symbols-outlined icon-cart" style="font-size: 36px;">add_shopping_cart</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        `;

        container.insertAdjacentHTML('beforeend', content);
    });
}
