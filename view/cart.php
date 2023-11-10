<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de la compra | Conforama restaurant</title>
</head>
<body>
    <?php foreach ($_SESSION['items'] as $producto) { ?>
        <tr>
            <br>
            <br>
            <td><?=$producto->getProducto_carrito()->getProducto_id()?></td>
            <td><?=$producto->getProducto_carrito()->getNombre_producto()?></td>
        </tr>
    <?php } ?>

</body>
</html>