<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opiniones</title>
</head>

<body onload="cargarOpiniones()">
    <section style="margin-top: 90px;">
        <div>
            <p>Hola</p>
            <a href="<?= URL . "?controller=APIController&action=api" ?>">link</a>
        </div>
    </section>
</body>
<script>
    function cargarOpiniones() 
    {
        let resultado = fetch("http://localhost/conforama-restaurant/?controller=APIController&action=api", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(data => data.json())
            .then(resultado => console.log(resultado));
    }
</script>

</html>