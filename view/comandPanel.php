<?php
include_once 'model/ProductoDAO.php';
include_once 'config/parameters.php';

$productos = ProductoDAO::getAllProducts();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </tr>
        <?php
        foreach ($productos as $producto) {?>
        <tr>
            <td><?=$producto->getNombre_producto()?></td>
            <td><?=$producto->getDescripcion()?></td>
            <td><?=$producto->getPrecio_producto()?></td>
            <td>
                <form action=<?= URL."?controller=productos&action=modificar" ?> method="post">
                    <input name="producto_id" value="<?=$producto->getProducto_id()?>" hidden>
                    <button type="submit">Modificar</button>
                </form>
            </td>
            <td>
                <form action=<?= URL."?controller=productos&action=eliminar" ?> method="post">
                    <input name="producto_id" value="<?=$producto->getProducto_id()?>" hidden>
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            
        </tr>
        <?php } ?>
    </table>
</body>
</html>