<?php
                         require 'Conexion.php';
                         if (isset($_POST['fecha'])) {
                             require 'Conexion.php';
                             /* Generales */
                                 $id = $_POST['id'];
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


                        $sql = "UPDATE `consultas` SET `fecha`='$fecha', `subjetivo_paciente`='$subjetivo_paciente', `nuevos_datos`='$nuevos',
                        `diagnostico`='$diagnostico', `tratamiento`='$tratamiento', `motivo`='$motivo', 
                        `subjetivo_medico`='$subjetivo_medico', `peso`='$peso', `estatura`='$estatura', `frecuencia_cardiaca`='$cardiaca',
                        `frecuencia_respiratoria`='$respiratoria', `temperatura`='$temperatura', `presion_arterial`='$arterial',
                        `pulso`='$pulso', `saturacion_oxigeno`='$oxigeno', `comentario`='$comentario',
                        `observaciones`='$observaciones' WHERE `consultas`.`id`=$id";

                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script type="text/javascript">
                            document.location = "https://admin.clinica.gt/";
                        </script> ');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);


                }

            ?>