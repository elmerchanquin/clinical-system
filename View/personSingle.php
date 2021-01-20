<?php
// Include database file
require_once '../App/Classes/Person.php';
require_once '../App/Classes/Connection.php';
?>
<!DOCTYPE html>
<html lang>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css"/>
    <style type="text/css">

      #canvas_1{
      background: url('../assets/img/anatomia.jpg');
      background-repeat: none;
      background-size: 100%;
      }

    </style>
    <script src="../main.js"></script>
</head>
<?php
include '../Views/parts/header.php';
?>
<body>
        <div class="cabecera">
            <h1>Persona</h1>
        </div>
        <div class="contenedor dividido">
            <div class="contenedor_datos_persona">
                <div class="titulo_caja">
                    <h2>
                        Datos Personales
                    </h2>
                </div>
                <div class="caja_datos_persona_nombre caja_sb">
                    <h3>
                        Nombre
                    </h3>
                </div>
                <div class="caja_sb">
                    <p>
                        Código N°
                    </p>
                </div>
                <div class="caja_sb">
                    <span>
                        Edad: edad
                    </span>
                    <span>
                        Sexo: 
                    </span>
                </div>
                <div class="caja_sb">
                    <p>
                        DPI: dpi
                    </p>
                </div>
                <div class="caja_sb">
                        <span>
                            Teléfono: 
                        </span>
                </div>
                <div class="caja_sb">
                    <p>
                        Residencia: 
                    </p>
                </div>
                <div class="dividido_mitad">
                    <div class="caja_sb">
                        <p>
                            Procedencia: 
                        </p>
                    </div>
                    <div class="caja_sb">
                        <p>
                            Escolaridad:
                        </p>
                        <p>
                            Estado Cívil:
                        </p>
                        <p>
                            Ocupación: 
                        </p>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
            </div>
            <div class="contenedor_registros">
            <div class="contenedor_historial">
                        <?php
                            print('
                                
                                <form method="POST" action="https://admin.clinica.gt/editar-persona/"><input type="hidden" name="codigo" value="'.$_POST['codigo'].'"><button type="submit">Editar Persona</button></a></form>
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
                   <?php
                   if (mysqli_num_rows($resultado3)) {
                    while ($fila = $resultado3->fetch_assoc()) {
                        print("<div class='caja caja_historial'>
                        <div>
                            <h3>Fecha</h3>
                            <span>
                                ".$fila['fecha']."
                            </span>
                        </div>
                        <div>
                            <h3>Diagnostico</h3>
                            <p>
                                ".$fila['diagnostico']."
                            </p>
                        </div>
                        <div>
                            <h3>Tratamiento</h3>
                            <span>
                                ".$fila['tratamiento']."
                            </span>
                        </div>
                        <div>                               
                            <form method='POST' action='https://admin.clinica.gt/editar-consulta/'><input type='hidden' name='codigo' value='".$fila['id']."'><button type='submit'>Editar Consulta</button></a></form>
                        </div>
                    </div>");
                   }
                   } else {
                       print('<b>
                       Aún no se ha creado ninguna consulta, crea la primera ahora.
                        </b>');
                   }
                   ?>
                    <div>
                            <form method="POST" action="https://admin.clinica.gt/consulta/"><input type="hidden" name="codigo" value="<?php print($_POST['codigo']) ?>"><button type="submit">NUEVA CONSULTA</button></a></form>
                    </div>
            </div>
        </div>
  </body>
</html>
