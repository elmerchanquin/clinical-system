<?php
// Include database file
require_once '../App/Classes/Person.php';
require_once '../App/Classes/Connection.php';
$personObj = new Person();
if (isset($_POST['name'])) {
    $updatePerson = $personObj->updatePerson($_POST);
} else {
    print('nada');
}
?>
<!DOCTYPE html>
<html lang>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css" />
</head>
<?php
include '../Views/parts/header.php';
$person = $personObj->displaySiglePerson($_POST['code']);
?>

<body>
    <div class="cabecera">
        <div class="titulo">
            <h1>
                Editar Persona
            </h1>
        </div>
    </div>
    <div class="contenedor">
        <form action="/edit-person/" autocomplete="off" method='POST'>
            <div class="campo">
                <input type="hidden" value="<?php print($person['codigo']); ?>" name="code">
            </div>
            <div class="campo">
                <label for="identificacion">DPI</label>
                <input type="text" value="<?php print($person['countryId']); ?>" placeholder="DPI" name="countryId">
            </div>
            <div class="campo">
                <label for="name">Nombre:</label>
                <input type="text" value="<?php print($person['name']); ?>" placeholder="Nombre completo" name="name" required>
            </div>
            <div class="campo">
                <label for="telefono">Teléfono:</label>
                <input type="text" value="<?php print($person['phone']); ?>" placeholder="Télefono" name="phone" required>
            </div>
            <div class="campo">
                <label for="pais">País:</label>
                <input type="text" value="<?php print($person['country']); ?>" placeholder="País" name='country'>
            </div>
            <div class="campo">
                <label for="departamento">Departamento:</label>
                <input type="text" value="<?php print($person['department']); ?>" placeholder="Departamento" name="department">
            </div>
            <div class="campo">
                <label for="ciudad">Municipio:</label>
                <input type="text" value="<?php print($person['municipality']); ?>" placeholder="Ciudad" name="municipality">
            </div>
            <div class="campo">
                <label for="direccion">Dirección:</label>
                <input type="text" value="<?php print($person['address']); ?>" placeholder="Dirección" name="address">
            </div>
            <div class="campo">
                <label for="genero">Genero</label>
                <?php
                if ($person["gender"] == 1) {
                    print('
                            <input type="radio" name="gender" value="1" checked required><span>Hombre</span>
                            <input type="radio" name="gender" value="2" required> <span>Mujer</span>
                            ');
                } else {
                    print('
                            <input type="radio" name="gender" value="1" required><span>Hombre</span>
                            <input type="radio" name="gender" value="2" checked required> <span>Mujer</span>
                            ');
                }
                ?>
            </div>
            <div class="campo">
                <label for="estadoCivil">Estado Civil:</label>
                <?php
                    if ($person["maritalStatus"] == 1) {
                        print('
                        <select name="maritalStatus" id="">
                        <option value="1" selected>Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        </select>
                        ');
                    } elseif ($person["maritalStatus"] == 2) {
                        print('
                        <select name="maritalStatus" id="">
                        <option value="1">Soltero</option>
                        <option value="2" selected>Casado</option>
                        <option value="3">Divorciado</option>
                        </select>
                        ');
                    } else {
                        print('
                        <select name="maritalStatus" id="">
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3" selected>Divorciado</option>
                        </select>
                        ');
                    }
                    ?>
            </div>
            <div class="campo">
                <label for="ocupation">Ocupación:</label>
                <input type="text" name="ocupation" value="<?php print($person['ocupation']); ?>" placeholder="Ocupación">
            </div>
            <div class="campo">
                <label for="born">Fecha de nacimiento:</label>
                <input type="date" placeholder="Fecha de Nacimiento" value="<?php print($person['born']); ?>" name="born" max="" required>
            </div>
            <div class="campo">
                <label for="academic">Escolardad:</label>
                <select name="academic" id="">
                    <?php
                        if ($person["academic"] == 1) {
                            print('
                            <option value="1" selected>Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($person["academic"] == 2) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2" selected>Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($person["academic"] == 3) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3" selected>Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($person["academic"] == 4) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4" selected>Diversificado</option>
                            <option value="5">Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($person["academic"] == 5) {
                            print('
                            <option value="1">Ninguno</option>
                            <option value="2">Primaria</option>
                            <option value="3">Básicos</option>
                            <option value="4">Diversificado</option>
                            <option value="5" selected>Universidad</option>
                            <option value="6">Maestría, Postgrado o Doctorado</option>
                            ');
                        } elseif ($person["academic"] == 6) {
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
                <textarea name="medicalHistory" id="" cols="30" rows="5" placeholder="Antecedentes Médicos"><?php print($person['medicalHistory']); ?></textarea>
            </div>
            <div class="campo">
                <textarea name="surgicalHistory" id="" cols="30" rows="5" placeholder="Antecedentes Quirurgicos"><?php print($person['surgicalHistory']); ?></textarea>
            </div>
            <div class="campo">
                <textarea name="alergicHistory" id="" cols="30" rows="5" placeholder="Antecedentes Alergicos"><?php print($person['alergicHistory']); ?></textarea>
            </div>
            <div class="campo">
                <textarea name="traumaticHistory" id="" cols="30" rows="5" placeholder="Antecedentes Traumaticos"><?php print($person['traumaticHistory']); ?></textarea>
            </div>
            <div class="campo">
                <textarea name="gyneHistory" id="" cols="30" rows="5" placeholder="Antecedentes Gineco-obstreticos"><?php print($person['gyneHistory']); ?></textarea>
            </div>
            <div class="campo">
                <button type="submit" class="form-button">Actualizar</button>
            </div>
        </form>
    </div>
</body>

</html>