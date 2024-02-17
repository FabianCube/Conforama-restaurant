<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <section class="container d-flex flex-column" style="margin-top: 90px; height: 70vh;">
        <div class="d-flex flex-column align-content-center justify-content-center">
            <h1 style="width: auto;">¡Gracias!</h1>
            <h2 style="width: auto;">Consulte su pedido aquí</h2>
			<?php
            $uid = $_SESSION['current_user']->getUsuario_id();
            // $url = "https://fabiandoizi.bernat2024.es/?controller=home&action=redirectDetailsPedidoQR&uid=$uid";
			$url = "localhost/Conforama-restaurant/?controller=home&action=redirectDetailsPedidoQR&uid=$uid";
            $qr_code_url = "http://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($url);
            ?>
            <img src="<?= $qr_code_url ?>" alt="Código QR" style="width: 100px; height: 100px;">
        </div>
        <div class="d-flex mt-4">
            <a class="btn btn-danger" href="<?= URL ?>">Volver al inicio</a>
        </div>
    </section>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>