<?php 
require_once("../includes/connection.php");
require_once("../template/template.php");

$user_data = check_login($conn);

if (isset($_POST['btn_save'])) {
    $gallery_image = $_FILES['gImage']['name'];
    $gallery_description = $_POST['gDescription'];
    $gallery_dibuat = $_POST['gDibuat'];
    $source = $_FILES['gImage']['tmp_name'];
    $folder = '../assets/img/content/';

    if ($gallery_image != "") {
        move_uploaded_file($source,$folder.$gallery_image);
        $insert = "INSERT INTO gallery (image_gallery, description, created_at) 
        VALUES ('$gallery_image','$gallery_description','$gallery_dibuat')";
        $result = mysqli_query($conn, $insert);

        if ($insert) {
            echo "<script>alert('Gallery Berhasil Di Tambah!');window.location='gallery.php';</script>";
        } else {
            echo "<script>alert('Gallery Gagal Di Tambah!');window.location='gallery.php';</script>";
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
                    <div class="breadcrumb-wrapper breadcrumb-contacts">
                        <div>
                            <h1>Gallery</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <span class="mdi mdi-home"></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">Gallery</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Data Gallery
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalGallery">
                                <i class="mdi mdi-plus h5 mr-1"></i>
                                Add New Gallery
                            </button>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                                    <h2 class="mb-1">Gallery And Project Me</h2>
                                    <a href="pdfgallery.php" class="btn btn-success" target="_blank">
                                        <i class="mdi mdi-download h5 mr-1"></i>
                                        Export PDF
                                    </a>
                                </div>

                                <div class="card-body">
                                    <div class="hoverable-data-table">
                                        <table id="tablePesan" class="table hover table-bordered nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr class="bg-light text-center">
                                                    <th>No</th>
                                                    <th>Id</th>
                                                    <th>Image Gallery</th>
                                                    <th>Description</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="bg-light text-center">
                                                    <th>No</th>
                                                    <th>Id</th>
                                                    <th>Image Gallery</th>
                                                    <th>Description</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>

                                            <?php $no = 1; ?>
                                            <?php
                                                $stmt = $conn->prepare('SELECT * FROM gallery');
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                while ($row = $result->fetch_assoc()):
                                            ?>
                                            <tbody>
                                                <th class="text-center"><?= $no ?></th>
                                                <td class="text-center"><?= $row['id'] ?></td>
                                                <td align="center"><img
                                                        src="../assets/img/content/<?= $row['image_gallery']; ?>" alt=""
                                                        class="shadow-sm" width="100"></td>
                                                <td><?= $row['description'] ?></td>
                                                <td><?= $row['created_at'] ?></td>
                                                <td align="center"><a href="update_gallery.php?id=<?= $row['id'] ?>"
                                                        class="btn btn-warning btn-m m-1 mt-4 mr-2 "
                                                        title="Edit Gallery"><i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="delete_gallery.php?id=<?= $row['id'] ?>"
                                                        class="btn btn-danger btn-m m-1 mt-4 mr-2"
                                                        title="Delete Gallery"
                                                        onclick="return confirm('Anda Yakin Ingin Menghapus Gallery Ini?')"><i
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
                    <div class="modal fade" id="modalGallery" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Add New
                                        Gallery</h4>
                                    <button type="button" class="close text-danger" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 id="message" class="text-danger font-weight-bold"></h5>
                                    <form action="" method="POST" id="data-gallery" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="desc">Enter Description</label>
                                            <input type="text" class="form-control" id="desc" name="gDescription">
                                        </div>
                                        <div class="form-group">
                                            <label for="created">Enter Date Created</label>
                                            <input type="number" class="form-control" id="created" name="gDibuat"
                                                min="1">
                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="pImage">Enter Product Image</label>
                                                            <input type="url" class="form-control" id="pImage"
                                                                name="pImage"> -->
                                            <label for="galleryimg">Enter Gallery Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="galleryimg"
                                                    name="gImage" lang="es" onchange="previewFile(this)">
                                                <label class=" custom-file-label" for="galleryimg">Select
                                                    Image</label>
                                            </div>
                                        </div>
                                        <img id="previewImg" src="" alt=""
                                            style="max-width: 180px; margin-top: 5px; margin-bottom: 8px;"
                                            class="shadow-sm">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                id="btn_close">Close</button>
                                            <button type="submit" class="btn btn-primary" name="btn_save">Save
                                                Gallery</button>
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