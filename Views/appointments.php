
<!DOCTYPE html>
<html lang>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include 'parts/header.php';
        if (isset($_POST['edit_form'])) {
            require 'Conexion.php';
            $code = $_POST['code'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $second_phone = $_POST['second_phone'];
            $mail = $_POST['mail'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $sql = "UPDATE `appointment` SET `name`='$name', `phone`='$phone', `second-phone`='$second_phone',
                        `mail`='$mail', `date`='$date', `time`='$time', 
                        `time-stamp`=CURRENT_TIMESTAMP WHERE `appointment`.`code`=$code";
                        
                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script type="text/javascript">
                            document.location = "https://admin.clinica.gt/appointments/";
                        </script> ');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);
        } elseif (isset($_POST['status_form'])) {
            require 'Conexion.php';
            $code = $_POST['code'];
            $status_change = $_POST['radio'];
            $sql = "UPDATE `appointment` SET `status`='$status_change' WHERE `appointment`.`code`=$code";
                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script type="text/javascript">
                            document.location = "https://admin.clinica.gt/appointments/";
                        </script> ');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);
        } else {
        }

    ?>
   <div class="cabecera">
        <div class="titulo">
            <h1>
                Citas
            </h1>
        </div>
    </div>
    <div class="contenedor">
    <div class="tabla">
        <table>
            <?php
            function appointment_list () {
                    print('
                    <tr>
                <th>
                    Nombre
                </th>
                <th>
                    Teléfono
                </th>
                <th>
                    Fecha
                </th>
                <th>
                    Hora
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Más
                </th>
            </tr>
                    ');
                    require 'Conexion.php';
                        $consulta = 'SELECT * FROM appointment';
                        $mysqli->set_charset("utf8");
                        $result = $mysqli->query($consulta);
                        
                    while ($row = $result->fetch_assoc()) {
                        if ($row['status'] == 1) {
                            $status = "Pendiente de confirmación";
                        } elseif ($row['status'] == 2) {
                            $status = "Confirmado";
                        } elseif ($row['status'] == 3) {
                            $status = "Cancelado";
                        } elseif ($row['status'] == 4) {
                            $status = 'Completado';
                        } else {
                            $status = 'Debe cambiar el estado';
                        }
                        echo  '
                            <tr>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['phone'] . '</td>
                                <td>' . $row['date'] . '</td>
                                <td>' . $row['time'] . '</td>
                                <td>' . $status . '</td>
                                <td>
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_' . $row['code'] . '">
  Ver todo
</button>

<!-- Modal -->
<div class="modal fade" id="modal_' . $row['code'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div>Nombre: ' . $row['name'] . '</div>
      <div>Teléfono: ' . $row['phone'] . '</div>
      <div>Teléfono secundario: ' . $row['second-phone'] . '</div>
      <div>Correo: ' . $row['mail'] . '</div>
      <div>Fecha: ' . $row['date'] . '</div>
      <div>Hora: ' . $row['time'] . '</div>
      <div>Estado: ' . $status . '</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit_modal_' . $row['code'] . '">
            Editar Cita
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#status_modal_' . $row['code'] . '">Cambiar estado</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit modal -->

<div class="modal fade" id="edit_modal_' . $row['code'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="EditForm' . $row['code'] . '" action="https://admin.clinica.gt/appointments/" method="POST">
                <input type="hidden" name="edit_form" value="true">
                <input type="hidden" name="code" value="' . $row['code'] . '">
                <div>
                <label for="name">Nombre:</label>
                <input type="text" placeholder="Nombre" value="' . $row['name'] . '" name="name">
                </div>
                <div>
                <label for="phone">Teléfono:</label>
                <input type="text" placeholder="Teléfono" value="' . $row['phone'] . '" name="phone">
                </div>
                <div>
                <label for="second_phone">Teléfono secundario:</label>
                <input type="text" placeholder="Teléfono secundario" value="' . $row['second-phone'] . '" name="second_phone">
                </div>
                <div>
                <label for="mail">Correo:</label>
                <input type="text" placeholder="Correo" value="' . $row['mail'] . '" name="mail">
                </div>
                <div>
                <label for="date">Fecha:</label>
                <input type="date" value="' . $row['date'] . '" name="date">
                </div>
                <div>
                <label for="time">Hora:</label>
                <input type="time" value="' . $row['time'] . '" name="time">
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="EditForm' . $row['code'] . '">
            Guardar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Status modal -->

<div class="modal fade" id="status_modal_' . $row['code'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="StatusForm' . $row['code'] . '" action="https://admin.clinica.gt/appointments/" method="POST">
                <input type="hidden" name="status_form" value="edit">
                <input type="hidden" name="code" value="' . $row['code'] . '">
                <div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radio" id="radio1" value="1" checked>
                <label class="form-check-label" for="radio1">
                  Pendiente  de confirmación
                </label>
              </div>
                <div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="radio2" value="2">
  <label class="form-check-label" for="radio2">
    Confirmado
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="radio3" value="3">
  <label class="form-check-label" for="radio3">
    Cancelado
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="radio4" value="4">
  <label class="form-check-label" for="radio4">
    Completado
  </label>
</div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="StatusForm' . $row['code'] . '">
            Guardar
        </button>
      </div>
    </div>
  </div>
</div>


                                </td>
                            </tr>
                            
                            
                            ';
                    }
                }

                appointment_list();
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