<?php 
require_once("../includes/connection.php");
require_once("../template/template.php");

$user_data = check_login($conn);

if (isset($_POST['save_about'])) {
    $add_image = $_FILES['pImage']['name'];
    $add_title = $_POST['pTitle'];
    $add_name = $_POST['pName'];
    $add_description = $_POST['pDesc'];
    $source = $_FILES['pImage']['tmp_name'];
    $folder = '../assets/img/content/';

    if ($add_image != "") {
        move_uploaded_file($source,$folder.$add_image);
        $insert = "INSERT INTO about (profile_image, profile_title, profile_name, profile_description) 
        VALUES ('$add_image','$add_title','$add_name','$add_description')";
        $result = mysqli_query($conn, $insert);

        if ($insert) {
            echo "<script>alert('Data Berhasil Di Tambah!');window.location='about.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Di Tambah!');window.location='about.php';</script>";
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
            <div class="content-wrapper">
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

                <div class="content">
                    <div class="breadcrumb-wrapper breadcrumb-contacts">
                        <div>
                            <h1>About Me</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <span class="mdi mdi-home"></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">About Me</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Data About Me
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAbout">
                                <i class="mdi mdi-plus h5 mr-1"></i>
                                Add About Me
                            </button>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                                    <h2>About Me</h2>
                                </div>

                                <div class="card-body">
                                    <div class="hoverable-data-table">
                                        <table id="tablePesan" class="table hover table-bordered nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr class="bg-light text-center">
                                                    <th>No</th>
                                                    <th>Id</th>
                                                    <th>Profile Image</th>
                                                    <th>Profile Title</th>
                                                    <th>Profile Name</th>
                                                    <th>Profile Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="bg-light text-center">
                                                    <th>No</th>
                                                    <th>Id</th>
                                                    <th>Profile Image</th>
                                                    <th>Profile Title</th>
                                                    <th>Profile Name</th>
                                                    <th>Profile Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>

                                            <?php
                                                $no = 1;
                                                $stmt = $conn->prepare('SELECT * FROM about');
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                while ($row = $result->fetch_assoc()):
                                            ?>
                                            <tbody>
                                                <th class="text-center"><?= $no ?></th>
                                                <td class="text-center"><?= $row['id'] ?></td>
                                                <td align="center"><img
                                                        src="../assets/img/content/<?= $row['profile_image']; ?>" alt=""
                                                        class="shadow-sm" width="100"></td>
                                                <td><?= $row['profile_title'] ?></td>
                                                <td><?= $row['profile_name'] ?></td>
                                                <td><?= $row['profile_description'] ?></td>
                                                <td align="center"><a href="update_about.php?id=<?= $row['id'] ?>"
                                                        class="btn btn-warning btn-m m-1 mt-2 mr-2 "
                                                        title="Edit Gallery"><i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="delete_about.php?id=<?= $row['id'] ?>"
                                                        class="btn btn-danger btn-m m-1 mt-2 mr-2"
                                                        title="Delete Gallery"
                                                        onclick="return confirm('Anda Yakin Ingin Menghapus?')"><i
                                                            class="mdi mdi-trash-can"></i></a>
                                                </td>
                                            </tbody>
                                            <?php $no++ ?>
                                            <?php endwhile; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="modalAbout" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Add
                                        About Me</h4>
                                    <button type="button" class="close text-danger" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 id="message" class="text-danger font-weight-bold"></h5>
                                    <form action="" method="POST" id="data-gallery" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="title">Enter Profile Title</label>
                                            <input type="text" class="form-control" id="title" name="pTitle">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Enter Profile Name</label>
                                            <input type="text" class="form-control" id="name" name="pName">
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Enter Profile Description</label>
                                            <input type="text" class="form-control" id="desc" name="pDesc">
                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="pImage">Enter Product Image</label>
                                                            <input type="url" class="form-control" id="pImage"
                                                                name="pImage"> -->
                                            <label for="pimg">Enter Profile Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="pimg" name="pImage"
                                                    lang="es" onchange="previewFile(this)">
                                                <label class=" custom-file-label" for="pimg">Select
                                                    Image</label>
                                            </div>
                                        </div>
                                        <img id="previewImg" src="" alt=""
                                            style="max-width: 180px; margin-top: 5px; margin-bottom: 8px;"
                                            class="shadow-sm">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                id="btn_close">Close</button>
                                            <button type="submit" class="btn btn-primary" name="save_about">Save
                                                About Me</button>
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
    $(document).on("click", "#btn_close", function() {
        $("#data-gallery, #previewImg").trigger("reset");
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