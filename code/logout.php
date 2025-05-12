<?php
require_once('classes/login.php');
$validador = new Login();
$validador->logout();
header("Location: login.php");
exit();