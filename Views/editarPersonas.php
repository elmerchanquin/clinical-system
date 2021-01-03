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
        include 'parts/header.php';
        include 'Conexion.php';
        /* Trae código de la persona para mostrar datos en pantalla */
        if (isset($_POST['codigo'])){
            $codigo = $_POST['codigo'];
            $consulta = "SELECT * FROM persona WHERE codigo=$codigo";
            $mysqli->set_charset("utf8");
            $query = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_array($query);
        } else {
            print("Necesita ingresar con el código de la persona.");
        } 
    
    ?>
        <div class="cabecera">
            <div class="titulo">
                <h1>
                    Editar Persona
                </h1>
            </div>
        </div>
        <div class="contenedor">
            <form action="<?php echo "https://admin.clinica.gt/actualizar-persona/"; ?>" autocomplete="off" method='POST'>
            <div class="campo">
                    <input type="hidden" value="<?php print($resultado["codigo"])?>" name="codigo">
            </div>
            <div class="campo">
                    <label for="identificacion">DPI</label>
                    <input type="text" value="<?php print($resultado["identificacion"])?>" placeholder="DPI" name="identificacion">
                </div>
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" value="<?php print($resultado["nombre"])?>" placeholder="Nombre completo" name="nombre" required>
                </div>
                <div class="campo">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" value="<?php print($resultado["telefono"])?>" placeholder="Télefono" name="telefono" required>
                </div>
                <div class="campo">
                    <label for="pais">País:</label>
                    <input type="text" value="<?php print($resultado["pais"])?>" placeholder="País" name='pais'>
                </div>
                <div class="campo">
                    <label for="departamento">Departamento:</label>
                    <input type="text" value="<?php print($resultado["departamento"])?>" placeholder="Departamento" name="departamento">
                </div>
                <div class="campo">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" value="<?php print($resultado["ciudad"])?>" placeholder="Ciudad" name="ciudad">
                </div>
                <div class="campo">
                    <label for="direccion">Dirección:</label>
                    <input type="text" value="<?php print($resultado["direccion"])?>" placeholder="Dirección de residencia" name="direccion">
                </div>
                <div class="campo">
                    <label for="genero">Genero</label>
                    <?php
                        if ($resultado["genero"] == 1) {
                            print('
                            <input type="radio" name="genero" value="1" checked required><span>Hombre</span>
                            <input type="radio" name="genero" value="2" required> <span>Mujer</span>
                            ');
                        } else {
                            print('
                            <input type="radio" name="genero" value="1" required><span>Hombre</span>
                            <input type="radio" name="genero" value="2" checked required> <span>Mujer</span>
                            ');
                        }
                    ?>
                </div>
                <div class="campo">
                    <label for="estadoCivil">Estado Civil:</label>
                    <?php
                    if ($resultado["estado_civil"] == 1) {
                        print('
                        <select name="estadoCivil" id="">
                        <option value="1" selected>Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        </select>
                        ');
                    } elseif ($resultado["estado_civil"] == 2) {
                        print ('
                        <select name="estadoCivil" id="">
                        <option value="1">Soltero</option>
                        <option value="2" selected>Casado</option>
                        <option value="3">Divorciado</option>
                        </select>
                        ');
                    } else {
                        print('
                        <select name="estadoCivil" id="">
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3" selected>Divorciado</option>
                        </select>
                        ');
                    }
                    ?>
                </div>
                <div class="campo">
                    <input type="text" name="ocupacion" value="<?php print($resultado["ocupacion"])?>" placeholder="Ocupación">
                </div>
                <div class="campo">
                    <input type="date" placeholder="Fecha de Nacimiento" value="<?php print($resultado["nacimiento"])?>" name="nacimiento" max="<?php echo date('d')."/".date('m')."/".date('Y');?>" required>
                </div>
                <div class="campo">
                    <select name="escolaridad" id="">
                    <?php
                        if ($resultado["escolaridad"] == 1) {
                            print('
                            <option value="1" selected>Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($resultado["escolaridad"] == 2) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2" selected>Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($resultado["escolaridad"] == 3) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3" selected>Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($resultado["escolaridad"] == 4) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4" selected>Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($resultado["escolaridad"] == 5) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5" selected>Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($resultado["escolaridad"] == 6) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6" selected>Maestría, Postgrado o Doctorado</option>
                            ');
                        } else {
                            print('
                            <option value="1" selected>Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        }
                    ?>
                    </select>
                </div>
                <div class="campo">
                    <textarea name="at-medicos" id="" cols="30" rows="5" placeholder="Antecedentes Médicos"><?php print($resultado["antecedentes_medicos"])?></textarea>
                </div>
                <div class="campo">
                    <textarea name="at-quirurgicos" id="" cols="30" rows="5"  placeholder="Antecedentes Quirurgicos"><?php print($resultado["antecedentes_quirurgicos"])?></textarea>
                </div>
                <div class="campo">
                    <textarea name="at-alergicos" id="" cols="30" rows="5"  placeholder="Antecedentes Alergicos"><?php print($resultado["antecedentes_alergicos"])?></textarea>
                </div>
                <div class="campo">
                    <textarea name="at-traumaticos" id="" cols="30" rows="5" placeholder="Antecedentes Traumaticos"><?php print($resultado["antecedentes_traumaticos"])?></textarea>
                </div>
                <div class="campo">
                    <textarea name="at-gineco" id="" cols="30" rows="5" placeholder="Antecedentes Gineco-obstreticos"><?php print($resultado["antecedentes_gineco_obstetricos"])?></textarea>
                </div>
                <div class="campo">
                    <button type="submit" class="form-button">Actualizar</button>
                </div>
            </form>
        </div>
</body>
</html>