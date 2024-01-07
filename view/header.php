<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/style/header.css">
</head>

<body>
    <header style="margin-top: 55px;">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                
                <div class="carousel-item active">
                    <img src="<?= image_url . "header.png" ?>" class="d-block w-100" alt="Image header conforama">
                </div>

                <div class="carousel-item">
                    <img src="<?= image_url . "header-2.png" ?>" class="d-block w-100" alt="Image header conforama">
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
</body>

</html>