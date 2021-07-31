<?php

session_start();
require_once("../function.php");

if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepsi Landing Page</title>
    <!-- IMPORT STYLE CSS -->
    <link rel="stylesheet" href="assets/css/landing_page.css">
    <!-- ICON WEB -->
    <link rel="icon web" href="assets/img/logonavbar.png">
</head>

<body>
    <section class="section">
        <nav>
            <a href="#"><img src="assets/img/logonavbar.png" class="logo-navbar"></a>
            <!-- <div class="toggle_menu" onclick="menuToggle()"></div> -->
            <ul class="menu">
                <li><a href="#" class="menu-nav">Home</a></li>
                <li><a href="#" class="menu-nav">View Product</a></li>
                <li><a href="#" class="menu-nav">What's New</a></li>
                <li><a href="#" class="menu-nav">Newsletter</a></li>
                <li><a href="#" class="menu-nav">Contact</a></li>
                <li><a href="../logout.php" class="btn-buy"><b>LOGOUT</b></a></li>
            </ul>
        </nav>

        <div class="content">
            <div class="text-content">
                <h2>That's What<br><span>I Like</span></h2>
                <p>
                    Pepsi. Diet Pepsi. Pepsi Zero Sugar. The gang’s all here. Compare flavors,
                    get nutritional facts and check out ingredients for all our Pepsi products.
                </p>
                <a href="#">View All Products</a>
            </div>
            <div class="img-content">
                <img src="assets/img/pepsisilver.png" alt="">
            </div>
        </div>

        <ul class="thumbnail">
            <li><img src="assets/img/pepsiblack.png" alt=""></li>
            <li><img src="assets/img/pepsiblue.png" alt=""></li>
            <li><img src="assets/img/pepsisilver.png" alt=""></li>
        </ul>

        <ul class="social-image">
            <li><a href="#" title="Pepsi Facebook"><img src="assets/img/facebook.png" alt=""></a></li>
            <li><a href="#" title="Pepsi Twitter"><img src="assets/img/twitter.png" alt=""></a></li>
            <li><a href="#" title="Pepsi Instagram"><img src="assets/img/instagram.png" alt=""></a></li>
        </ul>
    </section>
</body>

</html>