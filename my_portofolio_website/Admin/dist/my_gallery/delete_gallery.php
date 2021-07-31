<?php 

include('../includes/connection.php');
require_once("../../Login/function.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../../Login/login.php");
    exit;
}

if (isset($_GET['id'])) {

    header('location: gallery.php');
}



$id = $_GET['id'];
$delete = "DELETE FROM gallery WHERE id='$id'";
$result = mysqli_query($conn, $delete);
?>