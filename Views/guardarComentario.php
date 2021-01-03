<?php
$cordenadaX = $_POST['cordenada_x'];
$cordenadaY = $_POST['cordenada_y'];
$comentario = $_POST['comentario'];
$imagen = $_POST['imagen'];
$codigoHistorial = $_POST['codigo'];

require ('conexion.php');

    $sql = "INSERT "

?>

<?php
$nombre=$_FILES['archivo']['name'];
$guardado=$_FILES['archivo']['tmp_name'];

    if (!file_exists('archivos')) {
        mkdir('archivos', 0777, true);
        if(file_exists('archivos')){
            if(move_uploaded_file($guardado, 'archivos/' .$nombre)){
                echo "Archivo Guardado";
                print($nombre);
            } else {
                echo "Archivo no se pudo guardar";
            }
        }

    } else {
        if(move_uploaded_file($guardado, 'archivos/' .$nombre)){
            echo "Archivo Guardado";
            print($nombre);
        } else {
            echo "Archivo no se pudo guardar";
        }
    }