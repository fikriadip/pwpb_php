<?php
session_start();
require_once("function.php");
// require_once("Admin/function.php");

if (isset($_SESSION['login'])) {
    header("location: Admin/landing_page.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users_pwpb 
    WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])){
            // SET SESSION
            $_SESSION['login'] = true;
            echo "<script>alert('Berhasil Login!');window.location='Admin/landing_page.php';</script>";
            // header("Location: Admin/landing_page.php");
            exit;
        };
    }

    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="Admin/assets/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Admin/assets/vendor/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Admin/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Admin/assets/vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Admin/assets/vendor/css-hamburgers/hamburgers.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Admin/assets/vendor/select2/select2.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/util.css" />
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/main.css" />
    <!--===============================================================================================-->
</head>

<body>

    <?php if(isset($error)) : ?>
    <div class="alert bg-danger alert-dismissible fade show text-center text-white" role="alert">
        Kesalahan Saat Login, silahkan ulang lagi
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif;  ?>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="Admin/assets/images/img-01.png" alt="IMG" />
                </div>

                <form class="login100-form validate-form" action="" method="POST">
                    <span class="login100-form-title"> Login </span>

                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input class="input100" type="text" name="username" placeholder="Username" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="login">Login</button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="register.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="Admin/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="Admin/assets/vendor/bootstrap/js/popper.js"></script>
    <script src="Admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="Admin/assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="Admin/assets/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $(".js-tilt").tilt({
        scale: 1.1,
    });
    </script>
    <!--===============================================================================================-->
    <script src="Admin/assets/js/main.js"></script>
</body>

</html>