<?php
    $server = $_SERVER['HTTP_HOST'];
    require_once '../App/Classes/Login.php';
    $loginObj = new Login();
    $loginObj -> RedirectIfIsLogged();
    
    if (isset($_POST['user'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];
        var_dump($loginObj -> giveAccess($user, $password));
    }
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clinical System - Clínica Esperanza</title>
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
                    <input type="text" placeholder="Usuario:" name="user" value="<?php if (isset($_POST['user'])){print($_POST['user']);} ?>" required>
                </div>
                <div class="campo_login">
                    <input type="password" placeholder="Contraseña:" name="password" required>
                </div>
                <button>Iniciar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
