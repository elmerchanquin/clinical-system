<?php
// Include database file
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
    <div class="container">
        <h1>Nueva persona</h1>
        <?php
        if (isset($_POST['firstName'])) {
            if ($people = $personObj->createPerson($_POST) == true) {
                print($_POST['firstName'] . $_POST['secondName'] . " ha sido registrado satisfactoriamente.");
                print("¿Qué desea realizar ahora?");
                print('
                <form action="" method="POST">
                    <button type="submit" class="btn btn-primary" formaction="/edit-patient/">Completar información</button>
                </form>
                <form action="" method="POST">
                     <button type="submit" class="btn btn-primary" formaction="/add-checkup/">Agregar consulta</button>
                </form>
                ');
            } else {
                print('Registration failed!');
            }
        } else {
        ?>
            <div class="row">
                <div class="col">
                </div>
                <div class="col-6">
                    <form action="/new-patient/" autocomplete="off" method='POST'>
                        <div class="row">
                            <div class="col">
                                <label for="id" class="col-form-label-lg">DPI</label>
                                <input id="id" type="number" class="form-control-lg col-12" name="id">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="firstName" class="col-form-label-lg">Primer Nombre</label>
                                <input id="firstName" type="text" class="form-control-lg" name="firstName" required>
                            </div>
                            <div class="col">
                                <label for="secondName" class="col-form-label-lg">Segundo Nombre</label>
                                <input id="secondName" type="text" class="form-control-lg" name="secondName" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="firstLastname" class="col-form-label-lg">Primer Apellido</label>
                                <input id="firstLastname" type="text" class="form-control-lg" name="firstLastname" required>
                            </div>
                            <div class="col">
                                <label for="secondLastname" class="col-form-label-lg">Segundo Apellido</label>
                                <input id="secondLastname" type="text" class="form-control-lg" name="secondLastname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="phone" class="col-form-label-lg">Teléfono</label>
                                <input id="phone" type="phone" class="form-control-lg" name="phone">
                            </div>
                            <div class="col">
                                <label for="country" class="col-form-label-lg">País</label>
                                <select id="country" class="col-12 form-control-lg" name="country">
                                    <option selected>Guatemala</option>
                                    <option>Estados Unidos</option>
                                    <option>México</option>
                                    <option>El Salvador</option>
                                    <option>Honduras</option>
                                    <option>Nicaragua</option>
                                    <option>Costa Rica</option>
                                    <option>Panama</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="address" class="col-form-label-lg">Dirección</label>
                                <input id="address" type="text" class="form-control-lg col-12" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="gender" class="col-form-label-lg">Genero</label>
                                <div class="form-check">
                                    <input id="gender" class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Hombre
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input id="gender" class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Mujer
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="maritalStatus" class="col-form-label-lg">Estado Civil</label>
                                <select id="maritalStatus" class="col-12 form-control-lg" name="maritalStatus">
                                    <option disabled selected>Seleccionar</option>
                                    <option value="1">Soltero/a</option>
                                    <option value="2">Casado/a</option>
                                    <option value="3">Divorciado/a</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="ocupation" class="col-form-label-lg">Profesión</label>
                                <input id="ocupation" type="text" class="form-control-lg" name="ocupation" required>
                            </div>
                            <div class="col">
                                <label for="bornDate" class="col-form-label-lg">Fecha de Nacimiento</label>
                                <input id="bornDate" type="date" class="form-control-lg" name="bornDate" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="academic" class="col-form-label-lg">Nivel academico</label>
                                <select id="academic" class="col-12 form-control-lg" name="academic">
                                    <option selected value="1">Ninguno</option>
                                    <option value="2">Inicial</option>
                                    <option value="3">Primaria</option>
                                    <option value="4">Secundaria</option>
                                    <option value="5">Superior</option>
                                </select>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class=""></div>
                        <div class="row">
                            <div class="col-12">
                                <div></div>
                                <button class="btn btn-primary col-12 btn-lg" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                </div>
            </div>
    </div>
<?php
        }
?>
</body>

</html>