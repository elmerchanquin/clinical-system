<?php
include '../View/sections/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="main.js"></script>
    <style>
        body {
            height: 100%;
        }

        html {
            height: 100%;
        }

        .contenedor {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .centro {
            width: 500px;
            padding: 10px;
            box-shadow: 0px 0px 2px #2d2d2d;
            background: #fff;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <div class="centro">
            <h1>Error 404</h1>
            <h3>Lo sentimos esta página no existe, o se ha trasladado a otra ruta.</h3>
            <form action="" method="POST">
                <button type="submit" class="btn btn-primary" formaction="/">Ir al inicio</button>
            </form>
        </div>
    </div>
</body>

</html>