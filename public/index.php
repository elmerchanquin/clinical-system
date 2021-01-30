<?php
$myurl= $_SERVER['REQUEST_URI'];
$server = $_SERVER['HTTP_HOST'];
function urlIncluder($page, $include)
{
    $myurl= $_SERVER['REQUEST_URI'];

    if ($myurl == $page) {
        include "../View/$include";
    }
}
urlIncluder('/login/', 'login.php');
urlIncluder('/', 'personIndex.php');
urlIncluder('/nueva-persona/', 'personCreate.php');
urlIncluder('/cerrar-sesion/', 'closeSesion.php');
urlIncluder('/view-person/', 'personSingle.php');
urlIncluder('/edit-person/', 'personUpdate.php');
?>