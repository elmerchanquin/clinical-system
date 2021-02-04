<?php
// Include database file
require_once '../App/Classes/CheckUp.php';
require_once '../App/Classes/Person.php';
require_once '../App/Classes/Connection.php';
$checkUpObj = new CheckUp();
$personObj = new Person();
?>
<!DOCTYPE html>
<html lang>
<?php
include '../Views/parts/header.php';
$person = $personObj->displaySiglePerson($_POST['code']);
if (isset($_POST['reason'])) {
    $checkUp = $checkUpObj->createCheckUp($_POST);
}
?>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css" />
    <script>
        window.onload = function() {
            var fecha = new Date(); //Fecha actual
            var mes = fecha.POSTMonth(); //obteniendo mes
            var dia = fecha.POSTDate(); //obteniendo dia
            var ano = fecha.POSTFullYear(); //obteniendo año
            if (dia < 10)
                dia = '0' + dia; //agrega cero si el menor de 10
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10
            document.POSTElementById('date').value = ano + "-" + mes + "-" + dia;
        }
    </script>
</head>

<body>
    <div class="cabecera">
        <div class="titulo">
            <h1>
                Consulta
            </h1>
        </div>
    </div>
    <div class="contenedor">
        <form action="<?php echo "/add-checkup/"; ?>" method="POST" autocomplete="off">
            <div class="campo">
                <input type="hidden" value="<?php print($person['codigo']); ?>" name="code">
            </div>
            <h3>Datos Generales</h3>
            <div class="campo">
                <label for="name">Nombre:</label>
                <input name="name" type="text" value="<?php print($person['name']); ?>" disabled>
            </div>
            <div class="campo">
                <label for="reason">Motivo:</label>
                <input type="text" placeholder="Motivo" id="reason" value="Control" required name="reason">
            </div>
            <div class="campo">
                <label for="date">Fecha: (MES/DÍA/AÑO)</label>
                <input type="date" id="date" value="" placeholder="Fecha" name="date" required>
            </div>
            <h3>Datos Subjetivos</h3>
            <div class="Historia">
                <label for="subPacient">Paciente:</label>
                <textarea name="subPacient" id="" cols="30" rows="10" placeholder="Datos que el paciente indica"></textarea>
            </div>
            <div class="Historia">
                <label for="subMedic">Médico:</label>
                <textarea name="subMedic" id="" cols="30" rows="10" placeholder="Datos que el médico observa"></textarea>
            </div>
            <h3>Datos Objetivos</h3>
            <div class="campo">
                <label for="weight">Peso:</label>
                <input type="number" id="weight" placeholder="Peso del paciente en libras" step="00.01" name="weight">
            </div>
            <div class="campo">
                <label for="height">Estatura:</label>
                <input type="number" if="height" placeholder="Estatura del paciente en centimetros" step="00.01" name="height">
            </div>
            <div class="campo">
                <label for="">Frecuencia cardiaca:</label>
                <input type="number" placeholder="Frecuencia cardiaca" step="" name="cardiaca">
            </div>
            <div class="campo">
                <label for="motivo">Frecuencia respiratoria:</label>
                <input type="number" placeholder="Frecuencia respiratoria" name="respiratoria">
            </div>
            <div class="campo">
                <label for="motivo">Temperatura:</label>
                <input type="number" placeholder="Temperatura en grados centigrados" step="00.01" name="temperatura">
            </div>
            <div class="campo">
                <label for="motivo">Presión arterial:</label>
                <input type="text" placeholder="Presión arterial" name="arterial">
            </div>
            <div class="campo">
                <label for="motivo">Pulso:</label>
                <input type="text" placeholder="Pulso" name="pulso">
            </div>

            <div class="campo">
                <label for="motivo">Saturación de oxigeno:</label>
                <input type="number" placeholder="Saturación de oxigeno" name="oxigeno">
            </div>
            <h3>Nuevos Datos</h3>
            <div class="Historia">
                <label for="nombre">Nuevos datos:</label>
                <textarea name="nuevos" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar"></textarea>
            </div>
            <div class="campo">
                <label for="imagenes">Imagenes Máximo 1MB</label>
                <input type="file" name="images" id="" multiple="" accept=".jpg, .png, .jpge" disabled>
            </div>
            <div class="campo">
                <label for="videos">Video Máximo 150MB</label>
                <input type="file" name="video" id="" accept=".mp4, .mov, .webm" disabled>
            </div>
            <h3>Procedimiento</h3>
            <div class="campo">
                <label for="nombre">Diagnostico:</label>
                <input type="text" placeholder="Diagnostico" value="Sin Diagnostico" name="diagnostico">
            </div>
            <div class="Historia">
                <label for="nombre">Tratamiento:</label>
                <textarea name="tratamiento" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar"></textarea>
            </div>
            <h3>Otros</h3>
            <div class="historia">
                <label for="comentario">Comentario:</label>
                <textarea name="comentario" id="" cols="30" rows="10" placeholder="Comentarios del médico"></textarea>
            </div>
            <div class="historia">
                <label for="observaciones">Observaciones:</label>
                <textarea name="observaciones" id="" cols="30" rows="10" placeholder="Observaciones"></textarea>
            </div>
            <!-- PROXIMA CITA -->
            <div class="campo">
                <button type="submit" class="form-button">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>