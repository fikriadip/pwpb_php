<?php 
session_start();

require_once("function.php");

$_SESSION = [];
session_unset();

session_destroy();

setcookie('login', '', time() - 8);

header("location: login.php");

?>