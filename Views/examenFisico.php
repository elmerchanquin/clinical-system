<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
    } else {
        $server = $_SERVER['HTTP_HOST'];
    echo "
            <script type='text/javascript'>
            window.location='http://$server/login/'
            </script>
            ";
    }
?>
<!DOCTYPE html>
<html lang>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css"/>
    <style>
    html {
        height: 100%;
    }
    body {
        height: 100%;
    }
    .contenedor_examen {
        height: 100%;
    }
    </style>

</head>
    <script>
    var code = <?php $codigo = 5; print($codigo); ?>
    </script>
<body>
    <div class="contenedor_examen">
        <div class="contenedor_canvas" id="c_c">
            <canvas id="canvas_1" width="712" height="634"></canvas>
        </div>
         <div class="contenedor_izquierdo"  id="examen">
         <h2>
            Comentarios <!-- <?php print($resultado["nombre"])?> -->
         </h2>
         <!-- <form action="<?php echo "http://$server/examen-fisico/"; ?>" method="POST" autocomplete="off" class="caja" id="comentario">
        <div class="campo">
            <input type="hidden" value="<?php print($resultado["id"])?>" name="cod_historial">
        </div>
        <div class="campo">
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
            <input id="cordenadas_x" type="hidden">
            <input id="cordenadas_y" type="hidden">
        <div class="campo">
            <input type="file" id="files" name="files[]" multiple="true " />
                <br />
            <output id="list"></output>
        </div>
        <div>

        </div>
            <div class="campo">
                <button name="" class="form-button">Guardar</button>
            </div>
        </form> -->
         </div>
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
                        $arterial = $_POST['id'];




                        $sql = "INSERT INTO `historial` (`id`, `id_persona`, `fecha`, `motivo`, `historia`, `peso`,
                        `estatura`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `temperatura`, `presion_arterial`, `saturacion_oxigeno`)
                        VALUES (NULL, '$id_persona', '$fecha', '$motivo', '$historia', '$peso',
                        '$estatura', '$cardiaca', '$respiratoria', '$temperatura', '$arterial', '$oxigeno');";


                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script type="text/javascript">
                            document.location = "http://'.$server.'/examen-fisico/";
                        </script> ');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);


                }

            ?>

            <script src="../main.js"></script>