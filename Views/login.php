<?php

    $server = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css">
    <script src="main.js"></script>
    <style>
        body {
            height: 100%;
        }
        html {
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="contenedor_login">
        <div class="centro">
            <img src="../assets/img/logo.jpg" alt="" height="50px">
            <form action="<?php echo "https://$server/login/"; ?>" method="POST">
                <div class="campo_login">
                    <input type="text" placeholder="Usuario:" name="usuario" required>
                </div>
                <div class="campo_login">
                    <input type="password" placeholder="Contraseña:" name="contrasena" required>
                    <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
                </div>
                <button>Iniciar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    require 'Conexion.php';
    $sql = "SELECT usuario, contrasena FROM usuarios WHERE usuario = '" . $usuario . "'";
    $resultado = $mysqli->query($sql);
    if ($fila = $resultado->fetch_assoc()) {
        $dbUsuario = $fila['usuario'];
        $dbContrasena = $fila['contrasena'];
        if ($dbContrasena == $contrasena) {
            session_start();
            $_SESSION['usuario'] = $dbUsuario;
            print("<script type='text/javascript'>
            window.location='https://$server/'
            </script>");
        }
    } else {

    }

}
?>