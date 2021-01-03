
<!DOCTYPE html>
<html lang>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="estilos.css"/>
</head>
<body>
    <?php
        include 'parts/header.php';
    ?>
    <div>
    </div>
    <div class="cabecera">
        <div class="titulo">
            <h1>
                Personas
            </h1>
        </div>
        <div class="busqueda">
            <form action="https://admin.clinica.gt/" method="POST">
                <input type="search" name="busqueda" autocomplete="off" placeholder="Buscar..." value="<?php if(isset($_POST['busqueda'])) { print($_POST['busqueda']);}?>" required>
                    <select name="metodo" id="">
                        <?php if($_POST['metodo'] == 'codigo') {
                                print('<option value="codigo">Código</option>
                                <option value="nombre">Nombre</option>
                                <option value="dpi">DPI</option>');
                            }   elseif ($_POST['metodo'] == 'dpi') {
                                print('<option value="dpi">DPI</option>
                                <option value="nombre">Nombre</option>
                                <option value="codigo">Código</option>');
                            }   else {
                                print('<option value="nombre">Nombre</option>
                                <option value="codigo">Código</option>
                                <option value="dpi">DPI</option>');
                            }
                            ?>
                    </select>
                <input type="submit" value="Buscar">
            </form>
         </div>
    </div>
    <div class="contenedor">
    <div class="tabla">
        <table>
            <?php
            function tablaPersonas () {
                    print('
                    <tr>
                <th>
                    Nombre
                </th>
                <th>
                    Teléfono
                </th>
                <th>
                    Consulta
                </th>
                <th >
                    Ver todo
                </th>
            </tr>
                    ');
                    require 'Conexion.php';
                        $consulta = 'SELECT * FROM persona';
                        $mysqli->set_charset("utf8");
                        $resultado = $mysqli->query($consulta);
                    while ($fila = $resultado->fetch_assoc()) {
                        echo  '
                            <tr>
                                <td>' . $fila['nombre'] . '</td>
                                <td>' . $fila['telefono'] . '</td>
                                <td><form method="POST" action="https://admin.clinica.gt/consulta/"><input type="hidden" name="codigo" value="' . $fila['codigo'] . '"><button type="submit">Consulta</button></a></form></td>
                                <td><form method="POST" action="https://admin.clinica.gt/ver-todo/"><input type="hidden" name="codigo" value="' . $fila['codigo'] . '"><button type="submit">Ver todo</button></a></form></td>
                            </tr>';
                    }
                }

            function buscarPersonas () {
                require 'Conexion.php';
                $consulta = $_POST['busqueda'];
                $metodo = $_POST['metodo'];
                require 'Conexion.php';
                        if ($metodo == 'nombre') {
                            $consulta = 'SELECT * FROM persona WHERE nombre REGEXP "'.$consulta.'"';
                        }   elseif ($metodo == 'codigo') {
                            $consulta = 'SELECT * FROM persona WHERE codigo REGEXP "'.$consulta.'"';
                        }   else {
                            $consulta = 'SELECT * FROM persona WHERE identificacion REGEXP "'.$consulta.'"';
                        }
                        $mysqli->set_charset("utf8");
                        $resultado = $mysqli->query($consulta);

                        if (mysqli_num_rows($resultado)) {
                            print('
                    <tr>
                <th>
                    Código
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Teléfono
                </th>
                <th>
                    Identificación
                </th>
                <th>
                    Nuevo historial
                </th>
                <th >
                    Ver todo
                </th>
            </tr>
                    ');
                            while ($fila = $resultado->fetch_assoc()) {
                                echo  '
                                    <tr>
                                        <td>' . $fila['codigo'] . '</td>
                                        <td>' . $fila['nombre'] . '</td>
                                        <td>' . $fila['telefono'] . '</td>
                                        <td>' . $fila['identificacion'] . '</td>
                                        <td><form method="POST" action="https://admin.clinica.gt/consulta/"><input type="hidden" name="codigo" value="' . $fila['codigo'] . '"><button type="submit">Consulta</button></a></form></td>
                                        <td><form method="POST" action="https://admin.clinica.gt/ver.todo/"><input type="hidden" name="codigo" value="' . $fila['codigo'] . '"><button type="submit">Ver todo</button></a></form></td>
                                    </tr>';
                        }
                    } else {
                        print('<b>
                        No se ha encontrado registros que concuerden con los parametros de busqueda. 😰
                         </b>');
                    }
            }
            if (isset($_POST['busqueda'])) {
                buscarPersonas();
            } else {
                tablaPersonas();
            }
            ?>
        </table>
    </div>
    </div>
</body>
</html>