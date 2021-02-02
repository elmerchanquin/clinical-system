<?php
require_once "../App/Classes/Url.php";
$page = $_SERVER['REQUEST_URI'];

$url = new Url();
$viewUrl = $url->urlIncluder($page);
?>