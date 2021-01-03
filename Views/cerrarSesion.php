<?php
session_start();
session_destroy();
$server = $_SERVER['HTTP_HOST'];
?>
<script type='text/javascript'>
        window.location='<?php echo "http://$server/login/"; ?>'
        </script>
