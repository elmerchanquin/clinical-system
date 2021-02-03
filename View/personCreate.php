<?php
?>
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
    if ($_SERVER['REQUEST_URI'] == '/nueva-persona') {
        header("Location:/nueva-persona/");
    }
        include '../Views/parts/header.php';
    ?>
        <div class="cabecera">
            <div class="titulo">
                <h1>
                    Nueva Persona
                </h1>
            </div>
        </div>
        <div class="contenedor">
            <form action="https://admin.clinica.gt/nueva-persona/" autocomplete="off" method='POST'>
            <div class="campo">
                    <input type="text" placeholder="Identificacción del país" name="identificacion">
                </div>
                <div class="campo">
                    <input type="text" placeholder="Nombre completo" name="nombre" required>
                </div>
                <div class="campo">
                    <input type="text" placeholder="Télefono" name="telefono">
                </div>
                <div class="campo">
                    <input type="text" placeholder="País" name='pais' value="Guatemala">
                </div>
                <div class="campo">
                <div class="campo">
                    <input type="text" placeholder="Dirección" name="direccion">
                </div>
                <div class="campo">
                    <label for="genero">Genero</label>
                    <input type="radio" name="genero" value="1" checked required><span>Hombre</span>
                    <input type="radio" name="genero" value="2" required> <span>Mujer</span>
                </div>
                <div class="campo">
                    <select name="estadoCivil" id="">
                        <option disabled selected>Selecionar estado civil</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                    </select>
                </div>
                <div class="campo">
                    <input type="text" name="ocupacion" placeholder="Ocupación">
                </div>
                <div class="campo">
                    <label for="naciemiento">Fecha de nacimiento:</label>
                    <input type="date" placeholder="Fecha de Nacimiento" name="nacimiento" max="<?php echo date('d')."/".date('m')."/".date('Y');?>" required>
                </div>
                <div class="campo">
                    <select name="escolaridad" id="">
                        <option disabled selected>Escolaridad</option>
                        <option value="1">Ninguno</option>
                        <option value="2">Primaria</option>
                        <option value="3">Básicos</option>
                        <option value="4">Diversificado</option>
                        <option value="5">Universidad</option>
                        <option value="6">Maestría, Postgrado o Doctorado</option>
                    </select>
                </div>
                <div class="campo">
                    <textarea name="at-medicos" id="" cols="30" rows="5" placeholder="Antecedentes Médicos"></textarea>
                </div>
                <div class="campo">
                    <textarea name="at-quirurgicos" id="" cols="30" rows="5" placeholder="Antecedentes Quirúrgicos"></textarea>
                </div>
                <div class="campo">
                    <textarea name="at-alergicos" id="" cols="30" rows="5" placeholder="Antecedentes Alérgicos"></textarea>
                </div>
                <div class="campo">
                    <textarea name="at-traumaticos" id="" cols="30" rows="5" placeholder="Antecedentes Traumáticos"></textarea>
                </div>
                <div class="campo">
                    <textarea name="at-gineco" id="" cols="30" rows="5" placeholder="Antecedentes Ginecobstétricos"></textarea>
                </div>
                <div class="campo">
                    <button type="submit" class="form-button">Guardar</button>
                </div>
            </form>
            <?php
                        require 'Conexion.php';
                if (isset($_POST['nombre'])) {
                        $nombre = $_POST['nombre'];
                        $telefono = $_POST['telefono'];
                        $identificacion = $_POST['identificacion'];
                        $pais = $_POST['pais'];
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


                        $sql = "INSERT INTO `persona` (`codigo`, `nombre`, `identificacion`, `telefono`, `direccion`, `pais`,
                         `genero`, `escolaridad`, `nacimiento`, `estado_civil`, `ocupacion`, `updated_at`,
                        `antecedentes_medicos`, `antecedentes_traumaticos`, `antecedentes_quirugico`,
                        `antecedentes_alergicos`, `antecedentes_gineco_obstetricos`) VALUES (NULL, '$nombre', '$identificacion',
                          '$telefono', '$direccion', '$pais', '$genero', '$escolaridad', '$nacimiento', '$estado',
                         '$ocupacion', CURRENT_TIMESTAMP, '$atMedicos', '$atTraumaticos', '$atQuirurgicos', '$atAlergicos', '$atGineco');";


                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script type="text/javascript">
                            document.location = "https://admin.clinica.gt/registrado/";
                        </script> ');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);


                }

            ?>
        </div>
</body>
</html>
