<!DOCTYPE html>
<html lang>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        include '../View/sections/header.php';
    ?>
        <div class="cabecera">
            <div class="titulo">
                <h1>
                    Nueva Cita
                </h1>
            </div>
        </div>
        <div class="contenedor">
            <form action="<?php echo "https://admin.clinica.gt/new-appointment/"; ?>" autocomplete="off" method='POST'>
                <div class="campo">
                    <label for="name">Nombre:</label>
                    <input type="text" placeholder="Nombre completo" name="name" required>
                </div>
                <div class="campo">
                    <label for="phone">Teléfono:</label>
                    <input type="text" placeholder="Télefono" name="phone">
                </div>
                <div class="campo">
                    <label for="second_phone">Teléfono secundario:</label>
                    <input type="text" placeholder="Teléfono secundario" name="second_phone">
                </div>
                <div class="campo">
                    <label for="mail">Correo electrónico:</label>
                    <input type="text" placeholder="Dirección de residencia" name="mail">
                </div>
                <div class="campo">
                    <label for="date">Fecha:</label>
                    <input type="date" placeholder="Fecha" name="date" required>
                </div>
                <div class="campo">
                    <label for="time">Hora:</label>
                    <input type="time" placeholder="Hora" name="time" required>
                </div>
                <div class="campo">
                    <button type="submit" class="form-button">Guardar</button>
                </div>
            </form>
        </div>
</body>
</html>