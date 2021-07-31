<?php 
session_start();

require_once("../dist/includes/connection.php");

$_SESSION = [];
session_unset();

session_destroy();

setcookie('jam', '', time() - 3600);
setcookie('cars', '', time() - 3600);

header("location: login.php");

?>