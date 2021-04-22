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
    <link rel="stylesheet" type="text/css" media="screen" href="../public/estilos.css" />
</head>
<?php
include '../View/sections/header.php';
?>

<body>
    <div>
    </div>
    <div class="cabecera">
        <div class="titulo">
            <h1>
                Personas
            </h1>
        </div>
        <div class="busqueda">
            <form action="/" method="POST">
                <input type="search" name="search" autocomplete="off" placeholder="Buscar..." value="" required>
                <select name="metodo" id="">
                    <option value="codigo">Código</option>
                    <option value="nombre">Nombre</option>
                    <option value="dpi">DPI</option>
                </select>
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>
    <div class="contenedor">
        <div class="tabla">
            <table>
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
                    <th>
                        Ver todo
                    </th>
                </tr>
                <?php
                $people = $personObj->displayPerson();
                foreach ($people as $person) {
                ?>
                    <tr>
                        <td><?php print($person['name']); ?></td>
                        <td><?php print($person['phone']); ?></td>
                        <td>
                            <form method="POST" action="/add-checkup/"><input type="hidden" name="code" value="<?php print($person['codigo']); ?>"><button type="submit">Consulta</button></a></form>
                        </td>
                        <td>
                            <form method="POST" action="/view-person/"><input type="hidden" name="code" value="<?php print($person['codigo']); ?>"><button type="submit">Ver
                                    todo</button></a></form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>