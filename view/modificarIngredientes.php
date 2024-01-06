<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Producto_id -> <?= $producto_id ?></p>

    <?php foreach ($ingredientes as $value) { ?>
        <p>Ingrediente <?= $value->getProducto_id() ?></p>
    <?php } ?>
</body>

</html>