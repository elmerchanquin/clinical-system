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

    </div>
    <div class="container">
        <div class="title">
            <h1>
                Escritorio
            </h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Pacientes</div>
                    <div class="card-body">
                        <h5 class="card-title">Pacientes registrados</h5>
                        <p class="card-text">17 Pacientes registrados.</p>
                        <p class="card-text">Existen pacientes con datos generales faltantes. <a href="#">Completar datos ahora.</a></p>
                        <form action="" method="POST">
                        <button type="submit" class="btn btn-primary" formaction="/new-patient/">Ingresar nuevo paciente</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Consultas</div>
                    <div class="card-body">
                        <h5 class="card-title">Consultas del día</h5>
                        <p class="card-text">Elmer Chanquín. <a href="#">Ver consulta.</a></p>
                        <p class="card-text">Alejandro Pérez. <a href="#">Ver consulta.</a></p>
                        <form action="" method="POST">
                        <button type="submit" class="btn btn-primary" formaction="/add-checkup/">Agregar consulta</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Citas</div>
                    <div class="card-body">
                        <h5 class="card-title">Citas del día</h5>
                        <p class="card-text">4 Pacientes tienen cita hoy.</p>
                        <p class="card-text">Elmer Chanquín <a href="#">Ver.</a></p>
                        <p class="card-text">Alejandro Pérez <a href="#">Ver.</a></p>
                        <p class="card-text">Alejandro Chanquín <a href="#">Ver.</a></p>
                        <p class="card-text">Elmer Pérez <a href="#">Ver.</a></p>
                        <form action="" method="POST">
                        <button type="submit" class="btn btn-primary" formaction="/new-appointment/">Nueva cita</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>