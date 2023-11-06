<?php
    include_once 'model/ProductoDAO.php';
    include_once 'config/parameters.php';

    $producto_id = $_POST['producto_id'];
    $producto = ProductoDAO::getOneProduct($producto_id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar producto</title>

    <link rel="stylesheet" href="style/modify-style.css">
</head>
<body>
    <form action="<?=URL . "?controller=productos"?>">
        <input type="submit" value="volver artás">
    </form>

    <form action=<?=URL."?controller=productos&action=updateProduct"?> method="post">
        <label for="producto_id">ID roducto:</label>
        <input type="text" name="producto_id2" value="<?=$producto->getProducto_id()?>" disabled>
        <input type="text" name="producto_id" value="<?=$producto->getProducto_id()?>" hidden>

        <label for="nombre_producto">Nombre:</label>
        <input type="text" name="nombre_producto" value="<?=$producto->getNombre_producto()?>">

        <label for="descripcion">Descripcion del producto:</label>
        <textarea name="descripcion" cols="30" rows="6"><?=$producto->getDescripcion()?></textarea>

        <label for="precio_producto">Precio:</label>
        <input type="text" name="precio_producto" value="<?=$producto->getPrecio_producto()?>">

        <label for="categoria_id">Caregoría ID:</label>
        <input type="text" name="categoria_id" value="<?=$producto->getCategoria_id()?>">

        <input type="submit" name="productUpdated" value="Confirmar cambios">
    </form>
</body>
</html>