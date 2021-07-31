<?php
session_start();
include_once("../dist/includes/connection.php");
include_once("function.php");

if (isset($_COOKIE['jam']) && isset($_COOKIE['cars'])) {
    $jam = $_COOKIE['jam'];
    $cars = $_COOKIE['cars'];

    // get username based on id/ambil username berdasarkan id nya
    $result = mysqli_query($conn, "SELECT username FROM user_admin
    WHERE id = '$jam'");

    $row = mysqli_fetch_assoc($result);

    // check cookie and username
    // $cars adalah username yg sudah di acak dan akan mengacak username yang baru yang dari $row yg berisi username
    if ($cars === hash('sha256', $row['username'])) {
        $_SESSION['username'] = true;
    }
}


if (isset($_SESSION['username'])) {
    header("location: ../dist/index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (!empty($username) &&  !empty($password) && !is_numeric($username)) {
        // Read to database
        // $query = "SELECT * FROM user_admin WHERE username = '$username' limit 1";
        $query = "SELECT * FROM user_admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) === 1) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['password']) {
            // if (password_verify($password, $user_data['password'])) {
                
                // Create session 
                $_SESSION['username'] = $user_data['username'];

                if (isset($_POST['remember'])) {
                    // Create cookie
                    setcookie('jam', $user_data['id'], time()+1200);
                    setcookie('cars', hash('sha256', $user_data['username'])
                    ,time()+1200); // enkripsi string menjadi acak dengan hash and hash_algos
                }

                header("location: ../dist/index.php");
                die;
            }
        }
    } else {
        echo "<script>alert('Gagal Masuk. Periksa kembali username dan password anda!')</script>";
                    echo "<meta http-equiv ='refresh' content='1;url=login.php'>";
    }
    $error = true;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
                    <img src="images/SittingDoodle.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title">
                        Admin Login
                    </span>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <!-- <div class="text-center p-t-12">
                        <input id="remember" type="checkbox" class="rounded" name="remember">
                        <label for="remember" class="inline-flex items-center">Remember me</label>
                    </div> -->

                    <div class="container-login100-form-btn ">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

</body>

</html>