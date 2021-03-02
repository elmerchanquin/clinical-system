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
    $checkUpData = $checkUpObj->displyaSingleCheckUp($_POST['code']);   
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
        <form action="<?php echo "/add-checkup/"; ?>" method="POST" autocomplete="off">
            <div class="campo">
                <input type="hidden" value="<?php print($checkUpData['personCode']); ?>" name="personCode">
            </div>
            <h3>Datos Generales</h3>
            <div class="campo">
                <label for="name">Nombre:</label>
                <input name="name" type="text" value="<?php print($checkUpData['personCode']); ?>" disabled>
            </div>
            <div class="campo">
                <label for="reason">Motivo:</label>
                <input type="text" placeholder="Motivo" id="reason" value="<?php print($checkUpData['reason']); ?>" required name="reason">
            </div>
            <div class="campo">
                <label for="date">Fecha: (MES/DÍA/AÑO)</label>
                <input type="date" id="date" value="<?php print($checkUpData['date']); ?>" placeholder="Fecha" name="date" required>
            </div>
            <h3>Datos Subjetivos</h3>
            <div class="Historia">
                <label for="pacientSD">Paciente:</label>
                <textarea name="pacientSD" id="" cols="30" rows="10" placeholder="Datos que el paciente indica"><?php print($checkUpData['pacientSD']); ?></textarea>
            </div>
            <div class="Historia">
                <label for="medicSD">Médico:</label>
                <textarea name="medicSD" id="" cols="30" rows="10" placeholder="Datos que el médico observa"><?php print($checkUpData['medicSD']); ?></textarea>
            </div>
            <h3>Datos Objetivos</h3>
            <div class="campo">
                <label for="weight">Peso:</label>
                <input type="number" id="weight" placeholder="Peso del paciente en libras" value="<?php print($checkUpData['weight']); ?>" step="00.01" name="weight">
            </div>
            <div class="campo">
                <label for="height">Estatura:</label>
                <input type="number" if="height" placeholder="Estatura del paciente en centimetros" value="<?php print($checkUpData['height']); ?>" step="00.01" name="height">
            </div>
            <div class="campo">
                <label for="">Frecuencia cardiaca:</label>
                <input type="number" placeholder="Frecuencia cardiaca" step="" value="<?php print($checkUpData['cardiacFreq']); ?>" name="cardiacFreq">
            </div>
            <div class="campo">
                <label for="motivo">Frecuencia respiratoria:</label>
                <input type="number" placeholder="Frecuencia respiratoria" name="respiratoryRate" value="<?php print($checkUpData['respiratoryRate']); ?>">
            </div>
            <div class="campo">
                <label for="motivo">Temperatura:</label>
                <input type="number" placeholder="Temperatura en grados centigrados" step="00.01" name="temperature" value="<?php print($checkUpData['temperature']); ?>">
            </div>
            <div class="campo">
                <label for="bloodPress">Presión arterial:</label>
                <input type="text" placeholder="Presión arterial" name="bloodPress" value="<?php print($checkUpData['bloodPress']); ?>">
            </div>
            <div class="campo">
                <label for="pulse">Pulso:</label>
                <input type="text" placeholder="Pulso" name="pulse" value="<?php print($checkUpData['pulse']); ?>">
            </div>

            <div class="campo">
                <label for="oxSat">Saturación de oxigeno:</label>
                <input type="number" placeholder="Saturación de oxigeno" name="oxSat" value="<?php print($checkUpData['oxSat']); ?>">
            </div>
            <h3>Nuevos Datos</h3>
            <div class="Historia">
                <label for="newData">Nuevos datos:</label>
                <textarea name="newData" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar"><?php print($checkUpData['newData']); ?></textarea>
            </div>
            <h3>Procedimiento</h3>  
            <div class="campo">
                <label for="diagnosis">Diagnostico:</label>
                <input type="text" placeholder="Diagnostico" value="Sin Diagnostico" name="diagnosis" value="<?php print($checkUpData['diagnosis']); ?>">
            </div>
            <div class="Historia">
                <label for="treatment">Tratamiento:</label>
                <textarea name="treatment" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar"><?php print($checkUpData['treatment']); ?></textarea>
            </div>
            <h3>Otros</h3>
            <div class="historia">
                <label for="comments">Comentario:</label>
                <textarea name="comments" id="" cols="30" rows="10" placeholder="Comentarios del médico"><?php print($checkUpData['comments']); ?></textarea>
            </div>
            <div class="historia">
                <label for="observations">Observaciones:</label>
                <textarea name="observations" id="" cols="30" rows="10" placeholder="Observaciones"><?php print($checkUpData['observations']); ?></textarea>
            </div>
            <!-- PROXIMA CITA -->
            <div class="campo">
                <button type="submit" class="form-button">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>