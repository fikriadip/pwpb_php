<?php 
require_once("../includes/connection.php");
require_once("../template/template.php");

$user_data = check_login($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user_admin WHERE id ='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);

}

if (isset($_POST['btn_update'])) {
    $update_username = $_POST['updateName'];
    $update_email = $_POST['updateEmail'];
    $update_image = $_FILES['updateImage']['name'];
    $source = $_FILES['updateImage']['tmp_name'];
    $folder = '../assets/img/user/';

    if ($update_image != "") {
        move_uploaded_file($source,$folder.$update_image);
        $update = "UPDATE user_admin SET username ='$update_username', email = '$update_email', image = '$update_image'
        WHERE id = '$id'";
        $result = mysqli_query($conn, $update);

        if ($update) {
            echo "<script>alert('Profile Berhasil Di Update!');window.location='../index.php';</script>";
        } else {
            echo "<script>alert('Profile Gagal Di Update!');window.location='../index.php';</script>";
        }
    }
    else {
        $update = "UPDATE user_admin SET username ='$update_username', email = '$update_email'
        WHERE id = '$id'";
        $result = mysqli_query($conn, $update);

        if ($update) {
            // header("location: index.php");
            echo "<script>alert('Profile Berhasil Di Update!');window.location='../index.php';</script>";
        } else {
            echo "<script>alert('Profile Gagal Di Update!');window.location='../index.php';</script>";
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="wrapper">
        <div class="page-wrapper">
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <div class="navbar-right ml-auto">
                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="../assets/img/user/<?= $user_data['image']?>" class="user-image"
                                        alt="User Image" />
                                    <span class="d-none d-lg-inline-block"><?= $user_data['username']; ?></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <img src="../assets/img/user/<?= $user_data['image']?>" class="img-circle"
                                            alt="User Image" />
                                        <div class="d-inline-block">
                                            <?= $user_data['username']; ?><small
                                                class="pt-1"><?= $user_data['email']; ?></small>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="../my_profile/alladmin.php?id=<?= $user_data['id'] ?>">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../index.php">
                                            <i class="mdi mdi-email"></i> Message
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a href="#" data-toggle="modal" data-target="#logoutModal"> <i
                                                class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <div class="content-wrapper">
                <div class="content">
                    <div class="bg-white border rounded">
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-xl-3">
                                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                                    <div class="card text-center widget-profile px-0 border-0">
                                        <div class="card-img mx-auto rounded-circle">
                                            <img src="../assets/img/user/<?= $user_data['image']; ?>" alt="Admin Image"
                                                width="100px" height="100px">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="py-2 text-dark"><?= $user_data['username']; ?></h4>

                                        </div>
                                    </div>
                                    <hr class="w-100">
                                    <div class="contact-info pt-4">
                                        <h5 class="text-dark mb-1">Contact Information</h5>
                                        <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                                        <p><?= $user_data['email']; ?></p>
                                        <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                                        <p>089888939912</p>
                                        <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
                                        <p class="pb-3 social-button">
                                            <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                            <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                                                <i class="mdi mdi-linkedin"></i>
                                            </a>
                                            <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                            <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
                                                <i class="mdi mdi-instagram"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9">
                                <div class="profile-content-right py-5">
                                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="settings-tab" data-toggle="tab"
                                                href="#settings" role="tab" aria-controls="settings"
                                                aria-selected="false">Settings</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <button data-toggle="modal" data-target="#add_admin">Add
                                                New
                                                Admin</button>
                                        </li> -->
                                    </ul>

                                    <div class="tab-content px-3 px-xl-5" id="myTabContent">
                                        <div class="tab-pane fade show active" id="settings" role="tabpanel"
                                            aria-labelledby="settings-tab">
                                            <div class="mt-5">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group row mb-6">
                                                        <label for="coverImage"
                                                            class="col-sm-4 col-lg-2 col-form-label">Update
                                                            Image</label>
                                                        <div class="col-sm-8 col-lg-10">
                                                            <div class="custom-file mb-1">
                                                                <input type="file" class="custom-file-input"
                                                                    id="coverImage" name="updateImage"
                                                                    value="<?= $data['image']; ?>"
                                                                    onchange="previewFile(this)">
                                                                <label class="custom-file-label" for="coverImage">Select
                                                                    Image...</label>
                                                                <div class="invalid-feedback">Example invalid custom
                                                                    file feedback</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img src="../assets/img/user/<?= $data["image"] ?>" width="110"
                                                        class="mr-5 shadow-sm">
                                                    <img id="previewImg" src="" alt=""
                                                        style="max-width: 180px; margin-top: 5px; margin-bottom: 8px;"
                                                        class="shadow-sm">

                                                    <div class="row mb-2 mt-5">
                                                        <div class="col-lg-6">
                                                            <label for="usName" class="text-dark mb-2 h5">Update
                                                                Username</label>
                                                            <div class="input-group mb-4">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="mdi mdi-account text-primary"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" id="usName"
                                                                    name="updateName" value="<?= $data['username']; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label for="adEmail" class="text-dark mb-2 h5">Update
                                                                Email</label>
                                                            <div class="input-group mb-4">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="mdi mdi-email text-primary"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" id="adEmail"
                                                                    name="updateEmail" value="<?= $data['email']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-5">
                                                        <button type="submit" class="btn btn-primary mb-2 btn-pill"
                                                            name="btn_update">Update
                                                            Profile</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#tablePesan').DataTable({
            "aLengthMenu": [
                [10, 20, 30, 50, 75, -1],
                [10, 20, 30, 50, 75, "All"]
            ],
            "pageLength": 10,
            "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
        });
    });

    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    </script>
</body>

</html>