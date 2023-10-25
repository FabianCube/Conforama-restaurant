<?php
include_once 'model/ProductoDAO.php';

    $productos = ProductoDAO::getAllProducts();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <td><?=$producto->getNOMBRE_PRODUCTO()?></td>
            <td><?=$producto->getDESCRIPCION()?></td>
            <td><?=$producto->getPRECIO_PRODUCTO()?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>