<!DOCTYPE html>
<html lang>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css"/>
    <script>
        window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.POSTMonth()  ; //obteniendo mes
        var dia = fecha.POSTDate(); //obteniendo dia
        var ano = fecha.POSTFullYear(); //obteniendo año
        if(dia<10)
            dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
            mes='0'+mes //agrega cero si el menor de 10
        document.POSTElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
    }
    </script>
</head>
<body>
<?php
    include 'parts/header.php';
    include 'Conexion.php';
    if (isset($_POST['codigo'])){
        $codigo = $_POST['codigo'];
    }
    $consulta = "SELECT * FROM consultas WHERE id=$codigo";
    $mysqli->set_charset("utf8");
    $query = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($query);
    ?>
        <div class="cabecera">
            <div class="titulo">
                <h1>
                    Editar Consulta
                </h1>
            </div>
        </div>
        <div class="contenedor">
        <form action="<?php echo "https://admin.clinica.gt/actualizar-consulta/"; ?>" method="POST" autocomplete="off">
                <div class="campo">
                    <input type="hidden" value="<?php print($resultado["id"])?>" name="id">
                </div>
                <h3>Datos Generales</h3>
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" value="<?php print($resultado["id_persona"])?>" disabled>
                </div>
                <div class="campo">
                    <label for="motivo">Motivo:</label>
                    <input type="text" value="<?php print($resultado["motivo"])?>" placeholder="Motivo" required name="motivo">
                </div>
                <div class="campo">
                    <label for="fecha">Fecha: (MES/ DÍA/ AÑO)</label>
                    <input type="date" value="<?php print($resultado["fecha"])?>" id="fechaActual" value="" placeholder="Fecha" name="fecha" required>
                </div>
                <h3>Datos Subjetivos</h3>
                <div class="Historia">
                    <label for="nombre">Paciente:</label>
                    <textarea name="subjetivo_paciente" id="" cols="30" rows="10" placeholder="Datos que el paciente indica"><?php print($resultado["subjetivo_paciente"])?></textarea>
                </div>
                <div class="Historia">
                    <label for="nombre">Médico:</label>
                    <textarea name="subjetivo_medico" id="" cols="30" rows="10" placeholder="Datos que el medico observa"><?php print($resultado["subjetivo_medico"])?></textarea>
                </div>
                <h3>Datos Objetivos</h3>
                <div class="campo">
                    <label for="motivo">Peso:</label>
                    <input type="number" value="<?php print($resultado["peso"])?>" placeholder="Peso del paciente en libras" step="00.01" name="peso">
                </div>
                <div class="campo">
                    <label for="motivo">Estatura:</label>
                    <input type="number" value="<?php print($resultado["estatura"])?>" placeholder="Estatura del paciente en centimetros" step="00.01" name="estatura">
                </div>
                <div class="campo">
                    <label for="motivo">Frecuencia cardiaca:</label>
                    <input type="number" value="<?php print($resultado["frecuencia_cardiaca"])?>" placeholder="Frecuencia cardiaca" step="" name="cardiaca">
                </div>
                <div class="campo">
                    <label for="motivo">Frecuencia respiratoria:</label>
                    <input type="number" value="<?php print($resultado["frecuencia_respiratoria"])?>" placeholder="Frecuencia respiratoria" name="respiratoria">
                </div>
                <div class="campo">
                    <label for="motivo">Temperatura:</label>
                    <input type="number" value="<?php print($resultado["temperatura"])?>" placeholder="Temperatura en grados centigrados" step="00.01" name="temperatura">
                </div>
                <div class="campo">
                    <label for="motivo">Presión arterial:</label>
                    <input type="text" value="<?php print($resultado["presion_arterial"])?>" placeholder="Presión arterial" name="arterial">
                </div>
                <div class="campo">
                    <label for="motivo">Pulso:</label>
                    <input type="text" value="<?php print($resultado["pulso"])?>" placeholder="Pulso" name="pulso">
                </div>
                
                <div class="campo">
                    <label for="motivo">Saturación de oxigeno:</label>
                    <input type="number" value="<?php print($resultado["saturacion_oxigeno"])?>"  placeholder="Saturación de oxigeno" name="oxigeno">
                </div>
                <h3>Nuevos Datos</h3>
                <div class="Historia">
                    <label for="nombre">Nuevos datos:</label>
                    <textarea name="nuevos" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar"><?php print($resultado["nuevos_datos"])?></textarea>
                </div>
                <div class="campo">
                    <label for="imagenes">Imagenes Máximo 1MB (Próximamente)</label>
                    <input type="file" name="imagenes" id="" multiple="" accept=".jpg, .png, .jpge" disabled>
                </div>
                <div class="campo">
                    <label for="videos">Video Máximo 150MB (Próximamente)</label>
                    <input type="file" name="video" id="" accept=".mp4, .mov, .webm" disabled>
                </div>
                <h3>Procedimiento</h3>
                <div class="campo">
                    <label for="nombre">Diagnostico:</label>
                    <input type="text" value="<?php print($resultado["diagnostico"])?>" placeholder="Diagnostico" name="diagnostico">
                </div>
                <div class="Historia">
                    <label for="nombre">Tratamiento:</label>
                    <textarea value="<?php print($resultado["tratamiento"])?>" name="tratamiento" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar"></textarea>
                </div>
                <h3>Otros</h3>
                <div class="historia">
                    <label for="comentario">Comentario:</label>
                    <textarea name="comentario" id="" cols="30" rows="10" placeholder="Comentarios del médico"><?php print($resultado["comentario"])?></textarea>
                </div>
                <div class="historia">
                    <label for="observaciones">Observaciones:</label>
                    <textarea name="observaciones" id="" cols="30" rows="10" placeholder="Observaciones"><?php print($resultado["observaciones"])?></textarea>
                </div>
                <!-- PROXIMA CITA -->
                <div class="campo">
                    <button type="submit" class="form-button">Guardar</button>
                </div>
            </form>
        </div>
</body>
</html>