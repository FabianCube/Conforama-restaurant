<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table class="table table-dark" style="margin-top: 90px;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ESTADO</th>
                <th scope="col">HORA PEDIDO</th>
                <th scope="col">PRECIO TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$pedido->getPedido_id()?></td>
                <td><?=$pedido->getEstado()?></td>
                <td><?=$pedido->getHora_pedido()?></td>
                <td><?=$pedido->getPrecio_total()?></td>
            </tr>
        </tbody>
    </table>

</body>

</html>