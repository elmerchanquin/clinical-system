<?php
// Include database file
require_once '../App/Classes/CheckUp.php';
require_once '../App/Classes/Person.php';
require_once '../App/Classes/Connection.php';
$personObj = new Person();
?>
<!DOCTYPE html>
<html lang>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php
    include '../View/sections/header.php';
    ?>
    <div class="cabecera">
        <div class="titulo">
            <h1>
                Nueva persona
            </h1>
        </div>
    </div>
    <div class="contenedor">
        <form action="/new-person/" autocomplete="off" method='POST'>
            <div class="campo">
                <input type="text" placeholder="DPI/CUI" name="identificacion">
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
                    <input type="date" placeholder="Fecha de Nacimiento" name="nacimiento" max="<?php echo date('d') . "/" . date('m') . "/" . date('Y'); ?>" required>
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
    </div>
</body>

</html>