<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/style/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/style/global.css">
    <link rel="stylesheet" href="assets/style/infoPedidos.css">
</head>

<body>

    <section class="container pt-3" style="margin-top: 90px; max-width: 1170px; min-height: 65vh;">
        <div class="row">
            <div class="col-4">
                <div class="list-group">
                    <a href="<?= URL . "?controller=account" ?>" class="list-group-item list-group-item-action">Administrar Usuarios</a>
                    <a href="<?= URL . "?controller=account&action=productosAdmin" ?>" class="list-group-item list-group-item-action">Administrar Productos</a>
                    <a href="<?= URL . "?controller=account&action=pedidosAdmin" ?>" class="list-group-item list-group-item-action">Administrar Pedidos</a>
                    <a href="<?= URL . "?controller=login&action=logout" ?>" class="list-group-item list-group-item-action">
                        <span style="color: red;">Cerrar sesión</span>
                    </a>
                </div>
            </div>
            <div class="col-8">
                <div class="row d-flex flex-row w-100">
                    <h3 class="title">MODIFICAR PRODUCTO</h3>
                    <a href="<?= URL . "?controller=account&action=productosAdmin" ?>">< Volver atrás</a>
                </div>
                <hr style="margin-top: 0;">

                <form action=<?= URL . "?controller=productos&action=updateProduct" ?> method="post">                    
                    <ul class="list-group">
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Producto ID </strong></div>
                            <input type="text" name="producto_id" value="<?= $producto->getProducto_id() ?>">
                        </li>
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Nombre </strong></div>
                            <input type="text" name="nombre_producto" value="<?= $producto->getNombre_producto() ?>">
                        </li>
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Descripcion </strong></div>
                            <textarea name="descripcion" cols="30" rows="6"><?= $producto->getDescripcion() ?></textarea>
                        </li>
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Precio </strong></div>
                            <input type="text" name="precio_producto" value="<?= $producto->getPrecio_producto() ?>">
                        </li>
                        <li class="list-group-item d-flex">
                            <div style="width: 100px;"><strong>Categoria ID </strong></div>
                            <input type="text" name="categoria_id" value="<?= $producto->getCategoria_id() ?>">
                        </li>

                        <div>
                            <input type="submit" name="modificar-producto" value="Modificar">
                            <input type="submit" name="eliminar-producto" value="Eliminar producto" style="background-color: red;">
                        </div>
                    </ul>
                </form>
            </div>
        </div>
    </section>

</body>

</html>