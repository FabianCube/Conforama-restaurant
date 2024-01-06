<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Ingredientes</h3>

    <form action="#" method="post">

        <?php foreach ($ingredientes_producto as $value) { ?>
            <label style="font-weight: bold;"><?= $value->getNombre_ingrediente() ?></label><br>
            <input type="text" name="precio_ingrediente" value="<?=$value->getPrecio_ingrediente()?>" hidden>
            <label>Suplemento: <?= $value->getPrecio_ingrediente() ?>€</label><br>
            <label>Cantidad: </label>
            <input type="number" min="0" max="3" name="cantidad_ingrediente" value="0"><br><br>
        <?php } ?>

        <input type="submit" value="Modificar">
    </form>

    <a type="button" href="<?= URL . "?controller=cart" ?>">volver</a>
</body>

</html>