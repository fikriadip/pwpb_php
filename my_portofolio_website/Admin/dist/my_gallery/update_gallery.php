<?php 
require_once("../includes/connection.php");
require_once("../template/template.php");

$user_data = check_login($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM gallery WHERE id ='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);

}

if (isset($_POST['btn_update'])) {
    $update_image = $_FILES['updateImage']['name'];
    $update_desc = $_POST['updateDescription'];
    $update_created = $_POST['updateDibuat'];
    $source = $_FILES['updateImage']['tmp_name'];
    $folder = '../assets/img/content/';

    if ($update_image != "") {
        move_uploaded_file($source,$folder.$update_image);
        $update = "UPDATE gallery SET image_gallery ='$update_image', description = '$update_desc', created_at = '$update_created'
        WHERE id = '$id'";
        $result = mysqli_query($conn, $update);

        if ($update) {
            echo "<script>alert('Gallery Berhasil Di Update!');window.location='gallery.php';</script>";
        } else {
            echo "<script>alert('Gallery Gagal Di Update!');window.location='gallery.php';</script>";
        }
    }else {
        $update = "UPDATE gallery SET description = '$update_desc', created_at = '$update_created'
        WHERE id = '$id'";
        $result = mysqli_query($conn, $update);

        if ($update) {
            echo "<script>alert('Gallery Berhasil Di Update!');window.location='gallery.php';</script>";
        } else {
            echo "<script>alert('Gallery Gagal Di Update!');window.location='gallery.php';</script>";
        }
    }   
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
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
                    <div class="breadcrumb-wrapper breadcrumb-contacts">
                        <div>
                            <h1>Update Gallery</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <span class="mdi mdi-home"></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">Edit Gallery</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Data Gallery
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <!-- DataTales Example -->
                        <div class="col-12 col-sm-12 col-md-10 col-lg-6">
                            <div class="card shadow mb-4" style="border-radius: 10px;">
                                <!-- Update Product -->
                                <div class="card-header">
                                    <h3 class="card-title text-center text-primary font-weight-bold">Edit
                                        Gallery <?= $data['description']; ?></h3>
                                </div>
                                <div class="card-body">
                                    <h5 id="update_message" class="text-danger font-weight-bold"></h5>
                                    <div class="alert alert-danger" role="alert" id="up-alert" hidden>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="updateDesc">Update Description</label>
                                            <input type="hidden" class="form-control" id="updateId" name="id">
                                            <input type="text" class="form-control" id="updatepDesc"
                                                value="<?= $data['description']; ?>" name="updateDescription">
                                        </div>
                                        <div class="form-group">
                                            <label for="updateDibuat">Update Tahun Dibuat</label>
                                            <input type="number" class="form-control" id="updateDibuat"
                                                value="<?= $data['created_at']; ?>" name="updateDibuat">
                                        </div>
                                        <div class="form-group">
                                            <label for="updateImage">Update Gallery Image. Lewatkan Jika Tidak Merubah
                                                Image</label>
                                            <!-- <input type="url" class="form-control" id="updatepImage"
                                                                name="updatepImage"> -->
                                            <div class="custom-file mb-2">
                                                <input type="file" class="custom-file-input" id="updateImage" lang="es"
                                                    name="updateImage" value="<?= $data['image_gallery']; ?>"
                                                    onchange="previewFile(this)">
                                                <label class=" custom-file-label" for="updateImage">Select
                                                    Image</label>
                                            </div>
                                            <img src="../assets/img/content/<?= $data["image_gallery"] ?>" width="120">
                                            <img id="previewImg" src="" alt=""
                                                style="max-width: 180px; margin-top: 5px; margin-bottom: 8px;"
                                                class="shadow-sm ml-2">
                                        </div>

                                        <div class="footer">
                                            <button type="submit" class="btn btn-primary float-right"
                                                name="btn_update">Update
                                                Gallery</button>
                                            <a href="gallery.php" class="btn btn-danger float-right mr-2">Back</a>
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

    <script>
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