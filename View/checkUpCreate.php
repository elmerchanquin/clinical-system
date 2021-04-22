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
if (isset($_POST['date'])) {
    $checkUp = $checkUpObj->createCheckUp($_POST);
}
if (isset($_POST['code'])) {
    $person = $personObj->displaySiglePerson($_POST['code']);
} else {
    /* header("Location:/"); */
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
        <form action="/add-checkup/" method="POST" autocomplete="off">
            <div class="campo">
                <input type="hidden" value="<?php print($person['codigo']); ?>" name="personCode">
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
                <label for="pacientSD">Paciente:</label>
                <textarea name="pacientSD" id="" cols="30" rows="10" placeholder="Datos que el paciente indica"></textarea>
            </div>
            <div class="Historia">
                <label for="medicSD">Médico:</label>
                <textarea name="medicSD" id="" cols="30" rows="10" placeholder="Datos que el médico observa"></textarea>
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
                <input type="number" placeholder="Frecuencia cardiaca" step="" name="cardiacFreq">
            </div>
            <div class="campo">
                <label for="motivo">Frecuencia respiratoria:</label>
                <input type="number" placeholder="Frecuencia respiratoria" name="respiratoryRate">
            </div>
            <div class="campo">
                <label for="motivo">Temperatura:</label>
                <input type="number" placeholder="Temperatura en grados centigrados" step="00.01" name="temperature">
            </div>
            <div class="campo">
                <label for="bloodPress">Presión arterial:</label>
                <input type="text" placeholder="Presión arterial" name="bloodPress">
            </div>
            <div class="campo">
                <label for="pulse">Pulso:</label>
                <input type="text" placeholder="Pulso" name="pulse">
            </div>

            <div class="campo">
                <label for="oxSat">Saturación de oxigeno:</label>
                <input type="number" placeholder="Saturación de oxigeno" name="oxSat">
            </div>
            <h3>Nuevos Datos</h3>
            <div class="Historia">
                <label for="newData">Nuevos datos:</label>
                <textarea name="newData" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar"></textarea>
            </div>
            <h3>Procedimiento</h3>  
            <div class="campo">
                <label for="diagnosis">Diagnostico:</label>
                <input type="text" placeholder="Diagnostico" value="Sin Diagnostico" name="diagnosis">
            </div>
            <div class="Historia">
                <label for="treatment">Tratamiento:</label>
                <textarea name="treatment" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar"></textarea>
            </div>
            <h3>Otros</h3>
            <div class="historia">
                <label for="comments">Comentario:</label>
                <textarea name="comments" id="" cols="30" rows="10" placeholder="Comentarios del médico"></textarea>
            </div>
            <div class="historia">
                <label for="observations">Observaciones:</label>
                <textarea name="observations" id="" cols="30" rows="10" placeholder="Observaciones"></textarea>
            </div>
            <!-- PROXIMA CITA -->
            <div class="campo">
                <button type="submit" class="form-button">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>