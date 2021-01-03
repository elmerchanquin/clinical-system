        <?php
                        require 'Conexion.php';
                if (isset($_POST['nombre'])) {
                        $codigo = $_POST['codigo'];
                        $nombre = $_POST['nombre'];
                        $telefono = $_POST['telefono'];
                        $identificacion = $_POST['identificacion'];
                        $pais = $_POST['pais'];
                        $departamento = $_POST['departamento'];
                        $ciudad = $_POST['ciudad'];
                        $direccion = $_POST['direccion'];
                        $genero = $_POST['genero'];
                        $estado = $_POST['estadoCivil'];
                        $ocupacion = $_POST['ocupacion'];
                        $escolaridad = $_POST['escolaridad'];
                        $nacimiento = $_POST['nacimiento'];
                        $atMedicos = $_POST['at-medicos'];
                        $atQuirurgicos = $_POST['at-quirurgicos'];
                        $atTraumaticos = $_POST['at-traumaticos'];
                        $atAlergicos = $_POST['at-alergicos'];
                        $atGineco = $_POST['at-gineco'];


                        $sql = "UPDATE `persona`    
                                SET `nombre`='$nombre', `identificacion`='$identificacion', `telefono`=$telefono, `direccion`='$direccion', 
                                `pais`='$pais', `departamento`='$departamento', `ciudad`='$ciudad', `genero`='$genero', `escolaridad`=$escolaridad, `nacimiento`='$nacimiento', `estado_civil`=$estado, 
                                `ocupacion`='$ocupacion', `updated_at`=CURRENT_TIMESTAMP, antecedentes_medicos='$atMedicos',
                                `antecedentes_traumaticos`='$atTraumaticos', `antecedentes_quirugico`='$atQuirurgicos', `antecedentes_alergicos`='$atAlergicos',
                                `antecedentes_gineco_obstetricos`='$atGineco'
                                WHERE `persona`.`codigo`=$codigo";

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