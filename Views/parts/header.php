<?php
    session_start();
    if (isset($_SESSION['user'])) {
    } else {
        $server = $_SERVER['HTTP_HOST'];
    echo "
            <script type='text/javascript'>
            window.location='https://$server/login/'
            </script>
            ";
    }
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<header>
        <div class="logo">
                <a href="<?php
                $server = $_SERVER['HTTP_HOST'];
                echo "https://$server/"; ?>">
                    <img src="<?php
                    if ($myurl == '/') {
                        print('public/assets/img/logo.jpg');
                    } else {
                        print('../assets/img/logo.jpg');
                    }
                    ?>" alt="" height="50px">
                </a>
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo "https://$server/"; ?>">Personas</a></li>
                <li><a href="<?php echo "https://$server/nueva-persona/"; ?>">Nueva Persona</a></li>
                <li><a href="<?php echo "https://$server/appointments/"; ?>">Citas</a></li>
                <li><a href="<?php echo "https://$server/new-appointment/"; ?>">Nueva Cita</a></li>
                <li><a href="<?php echo "https://$server/cerrar-sesion/"; ?>">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>