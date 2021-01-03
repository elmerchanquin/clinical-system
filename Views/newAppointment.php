<!DOCTYPE html>
<html lang>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css"/>
</head>
<body>
    <?php
        include 'parts/header.php';
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
<?php
                        require 'Conexion.php';
                if (isset($_POST['name'])) {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $second_phone = $_POST['second_phone'];
                        $mail = $_POST['mail'];
                        $date = $_POST['date'];
                        $time = $_POST['time'];


                        $sql = "INSERT INTO `appointment` (`name`, `phone`, `second-phone`,
                        `mail`, `date`, `time`) VALUES ('$name', '$phone', '$secod_phone', '$mail',
                        '$date', '$time');";


                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script type="text/javascript">
                            document.location = "https://admin.clinica.gt/appointments/";
                        </script> ');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);


                }

?>
</body>
</html>