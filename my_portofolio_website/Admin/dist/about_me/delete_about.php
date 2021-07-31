<?php 

include_once('../includes/connection.php');
require_once("../../Login/function.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../../Login/login.php");
    exit;
}

if (isset($_GET['id'])) {

    header('location: about.php');
}

$id = $_GET['id'];
$delete = "DELETE FROM about WHERE id='$id'";
$result = mysqli_query($conn, $delete);
?>