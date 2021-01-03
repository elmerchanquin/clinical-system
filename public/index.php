<?php
$myurl= $_SERVER['REQUEST_URI'];
$server = $_SERVER['HTTP_HOST'];

if ($myurl == '/') {
    include '../Views/personas.php';
} elseif ($myurl == '/nueva-persona/') {
    include '../Views/nuevaPersona.php';
} elseif ($myurl == '/historial/') {
    include '../Views/personas.php';
} elseif ($myurl == '/nuevo-historial/') {
    include '../Views/nuevoHistorial.php';
} elseif ($myurl == '/ver-todo/') {
    include '../Views/verTodo.php';
} elseif ($myurl == '/consulta/') {
    include '../Views/consulta.php';
} elseif ($myurl == '/examen-fisico/') {
    include '../Views/examenFisico.php';
} elseif ($myurl == '/registrado/') {
    include '../Views/registrado.php';
} elseif ($myurl == '/login/') {
    include '../Views/login.php';
} elseif ($myurl == '/cerrar-sesion/') {
    include '../Views/cerrarSesion.php';
} elseif ($myurl == '/cerrar-sesion/') {
    include '../Views/cerrarSesion.php';
} elseif ($myurl == '/editar-persona/') {
    include '../Views/editarPersonas.php';
} elseif ($myurl == '/actualizar-persona/') {
    include '../Views/actualizarPersona.php';
} elseif ($myurl == '/editar-consulta/') {
    include '../Views/editarConsultas.php';
} elseif ($myurl == '/actualizar-consulta/') {
    include '../Views/actualizarConsulta.php';
} elseif ($myurl == '/new-appointment/') {
    include '../Views/newAppointment.php';
} elseif ($myurl == '/appointments/') {
    include '../Views/appointments.php';
}
else {
    include '../Views/error404.php';
}

?>