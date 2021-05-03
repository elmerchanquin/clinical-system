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
                Facturas
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="tabla">
            <table>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Nit
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Imprimir
                    </th>
                </tr>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#1">1</a></li>
                    <li class="page-item"><a class="page-link" href="#2">2</a></li>
                    <li class="page-item"><a class="page-link" href="#3">3</a></li>
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