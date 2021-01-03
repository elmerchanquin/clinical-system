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
        var mes = fecha.getMonth()  ; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
            dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
            mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
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
    $consulta = "SELECT nombre, codigo FROM persona WHERE codigo=$codigo";
    $mysqli->set_charset("utf8");
    $query = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($query);
    ?>
        <div class="cabecera">
            <div class="titulo">
                <h1>
                    Nuevo Historial
                </h1>
            </div>
        </div>
        <div class="contenedor">
            <form action="https://admin.clinica.gt/nuevo-historial/" method="POST" autocomplete="off">
                <div class="campo">
                    <input type="hidden" value="<?php print($resultado["codigo"])?>" name="id" placeholder="Nombre del paciente">
                </div>
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" value="<?php print($resultado["nombre"])?>" disabled>
                </div>
                <div class="campo">
                    <label for="motivo">Motivo:</label>
                    <input type="text" placeholder="Motivo" name="motivo" required>
                </div>
                <div class="Historia">
                    <label for="nombre">Historia:</label>
                    <textarea name="historia" id="" cols="30" rows="10" placeholder="Historia" required></textarea>
                </div>
                <div class="campo">
                    <label for="fecha">Fecha: (MES/ DÍA/ AÑO)</label>
                    <input type="date" id="fechaActual" value="" placeholder="Fecha" name="fecha" required>
                </div>
                <div class="campo">
                    <label for="motivo">Peso:</label>
                    <input type="number" placeholder="Peso del paciente en libras" step="00.01" name="peso" required>
                </div>
                <div class="campo">
                    <label for="motivo">Estatura:</label>
                    <input type="number" placeholder="Estatura del paciente en centimetros" step="00.01" name="estatura" required>
                </div>
                <div class="campo">
                    <label for="motivo">Frecuencia cardiaca:</label>
                    <input type="number" placeholder="Frecuencia cardiaca" step="" name="cardiaca" required>
                </div>
                <div class="campo">
                    <label for="motivo">Frecuencia respiratoria:</label>
                    <input type="number" placeholder="Frecuencia respiratoria" name="respiratoria" required>
                </div>
                <div class="campo">
                    <label for="motivo">Temperatura:</label>
                    <input type="number" placeholder="Temperatura en grados centigrados" step="00.01" name="temperatura" required>
                </div>
                <div class="campo">
                    <label for="motivo">Presión arterial:</label>
                    <input type="text" placeholder="Presión arterial" name="arterial" required>
                </div>
                <div class="campo">
                    <label for="motivo">Pulso:</label>
                    <input type="text" placeholder="Pulso (Próximamente)" name="arterial" disabled>
                </div>
                
                <div class="campo">
                    <label for="motivo">Saturación de oxigeno:</label>
                    <input type="number" placeholder="Saturación de oxigeno" name="oxigeno" required>
                </div>
                <div class="campo">
                    <button type="submit" class="form-button">Continuar</button>
                </div>
            </form>
        </div>
  </body>
</html>
<?php
                        require 'Conexion.php';
                if (isset($_POST['motivo'])) {
                        $id_persona = $_POST['id'];
                        $motivo = $_POST['motivo'];
                        $historia = $_POST['historia'];
                        $peso = $_POST['peso'];
                        $estatura = $_POST['estatura'];
                        $temperatura = $_POST['temperatura'];
                        $fecha = $_POST['fecha'];
                        $cardiaca = $_POST['cardiaca'];
                        $respiratoria = $_POST['respiratoria'];
                        $oxigeno = $_POST['oxigeno'];
                        $arterial = $_POST['arterial'];




                        $sql = "INSERT INTO `historial` (`id`, `id_persona`, `fecha`, `motivo`, `historia`, `peso`,
                        `estatura`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `temperatura`, `presion_arterial`, `saturacion_oxigeno`)
                        VALUES (NULL, '$id_persona', '$fecha', '$motivo', '$historia', '$peso',
                        '$estatura', '$cardiaca', '$respiratoria', '$temperatura', '$arterial', '$oxigeno');";


                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script type="text/javascript">
                            document.location = "https://admin.clinica.gt/examen-fisico/";
                        </script> ');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);

                }

            ?>
