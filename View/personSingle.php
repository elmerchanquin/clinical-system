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
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css" />
    <script src="../main.js"></script>
</head>
<?php
include '../Views/parts/header.php';
if (isset($_SESSION['viewPerson'])) {
    
    $_POST['code'] = $_SESSION['viewPerson'];
}
$person = $personObj->displaySiglePerson($_POST['code']);
$age = $personObj->age($person['born']);
$marital = $personObj->maritalStatus($person['maritalStatus']);
$academic = $personObj->academic($person['academic']);
?>

<body>
    <div class="cabecera">
        <h1>Elmer Alejandro Chanquín Pérez</h1>
    </div>
    <div class="contenedor dividido">
        <div class="contenedor_datos_persona">
            <div class="titulo_caja">
                <h2>
                    Datos Personales
                </h2>
            </div>
            <div class="caja_sb">
                <p>
                    Código: <?php print($person['codigo']);?>
                </p>
                <p>
                    Fecha de nacimiento:<?php print($person['born']);?>
                </p>
                <p>
                    Edad: <?php print($age);?> 
                </p>
                <p>
                    Genero: <?php print($person['gender']);?>
                </p>
                <p>
                    DPI: <?php print($person['countryId']);?>
                </p>
                <p>
                    Teléfono: <?php print($person['phone']);?>
                </p>
                <p>
                    Residencia: <?php print($person['address'].', '.$person['municipality'].', '.$person['department'].', '.$person['country'].'.');?>
                </p>
                <p>
                    Escolaridad: <?php print($academic);?>
                </p>
                <p>
                    Estado Cívil: <?php print($marital);?>
                </p>
                <p>
                    Ocupación: <?php print($person['ocupation']);?>
                </p>
            </div>
            <div class="accordion" id="accordionExample">
                <div>
                    <h3>Antecedentes</h3>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Médicos
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <?php print($person['medicalHistory']);?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Traumáticos
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <?php print($person['traumaticHistory']);?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Quirúrgicos
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <?php print($person['surgicalHistory']);?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourth">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth">
                            Alérgicos
                        </button>
                    </h2>
                    <div id="collapseFourth" class="accordion-collapse collapse" aria-labelledby="headingFourth" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <?php print($person['alergicHistory']);?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Ginecobstétricos
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <?php print($person['gyneHistory']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor_registros">
            <div class="contenedor_historial">
                <?php
                print('
                                
                                <form method="POST" action="/edit-person/"><input type="hidden" name="code" value="' . $_POST['code'] . '"><button type="submit">Editar Persona</button></a></form>
                                ');
                ?>
            </div>
            <div>
                <h2>
                    Historial Médico
                </h2>
            </div>
            <div class="contenedor_consultas">
                <h3>
                    Consultas
                </h3>
                <div>
                    <form method="POST" action="/consulta/"><input type="hidden" name="codigo" value="<?php print($_POST['code']) ?>"><button type="submit">NUEVA CONSULTA</button></a></form>
                </div>
            </div>
        </div>
</body>

</html>