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
        <div class="cabecera">
            <div class="titulo">
                <h1>
                    Consulta
                </h1>
            </div>
        </div>
        <div class="contenedor">
            <form action="<?php echo "https://admin.clinica.gt/consulta/"; ?>" method="POST" autocomplete="off">
                <div class="campo">
                    <input type="hidden" value="" name="codigo" placeholder="Nombre del paciente">
                </div>
                <h3>Datos Generales</h3>
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" value="" disabled>
                </div>
                <div class="campo">
                    <label for="motivo">Motivo:</label>
                    <input type="text" placeholder="Motivo" value="Control" required name="motivo">
                </div>
                <div class="campo">
                    <label for="fecha">Fecha: (MES/ DÍA/ AÑO)</label>
                    <input type="date" id="fechaActual" value="" placeholder="Fecha" name="fecha" required>
                </div>
                <h3>Datos Subjetivos</h3>
                <div class="Historia">
                    <label for="nombre">Paciente:</label>
                    <textarea name="subjetivo_paciente" id="" cols="30" rows="10" placeholder="Datos que el paciente indica"></textarea>
                </div>
                <div class="Historia">
                    <label for="nombre">Médico:</label>
                    <textarea name="subjetivo_medico" id="" cols="30" rows="10" placeholder="Datos que el medico observa"></textarea>
                </div>
                <h3>Datos Objetivos</h3>
                <div class="campo">
                    <label for="motivo">Peso:</label>
                    <input type="number" placeholder="Peso del paciente en libras" step="00.01" name="peso">
                </div>
                <div class="campo">
                    <label for="motivo">Estatura:</label>
                    <input type="number" placeholder="Estatura del paciente en centimetros" step="00.01" name="estatura">
                </div>
                <div class="campo">
                    <label for="motivo">Frecuencia cardiaca:</label>
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
<?php
                        
                if (isset($_POST['fecha'])) {
                    require 'Conexion.php';
                    /* Generales */
                        $id_persona = $_POST['codigo'];
                        $fecha = $_POST['fecha'];
                        $motivo = $_POST['motivo'];
                    /* Subjetivos */
                        $subjetivo_paciente = $_POST['subjetivo_paciente'];
                        $subjetivo_medico = $_POST['subjetivo_medico'];

                    /* Objetivos */
                        $peso = $_POST['peso'];
                        $estatura = $_POST['estatura'];
                        $cardiaca = $_POST['cardiaca'];
                        $respiratoria = $_POST['respiratoria'];
                        $temperatura = $_POST['temperatura'];
                        $arterial = $_POST['arterial'];
                        $pulso = $_POST['pulso'];
                        $oxigeno = $_POST['oxigeno'];

                    /* Nuevos */
                        $nuevos = $_POST['nuevos'];

                        $diagnostico = $_POST['diagnostico'];
                        $tratamiento = $_POST['tratamiento'];

                    /* Comentarios */
                        $comentario = $_POST['comentario'];
                        $observaciones = $_POST['observaciones'];

                        $sql = "INSERT INTO `consultas`(`id`, `fecha`, `id_persona`, `subjetivo_paciente`, `nuevos_datos`,
                        `diagnostico`, `tratamiento`, `motivo`, `subjetivo_medico`, `peso`, `estatura`, `frecuencia_cardiaca`,
                        `frecuencia_respiratoria`, `temperatura`, `presion_arterial`, `pulso`, `saturacion_oxigeno`, `comentario`,
                        `observaciones`) VALUES (NULL,'$fecha','$id_persona','$subjetivo_paciente','$nuevos','$diagnostico','$tratamiento',
                        '$motivo','$subjetivo_medico','$peso','$estatura','$cardiaca','$respiratoria','$temperatura','$arterial',
                        '$pulso','$oxigeno','$comentario','$observaciones')";


                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script>
                            window.onload=function(){
                                document.forms["miformulario"].submit();
                            }
                            </script>
                        <form name="miformulario" action="https://'.$server.'/ver-todo/" method="POST">
                            <input type="hidden" value="'. $_POST["codigo"] .'" name="codigo">
                        </form>');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);

                }

            ?>
