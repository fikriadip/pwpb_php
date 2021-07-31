<?php 
require_once("../includes/connection.php");
require_once("../template/template.php");

$user_data = check_login($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM home WHERE id ='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);

}

if (isset($_POST['update_home'])) {
    $update_title = $_POST['updateTitle'];
    $update_name = $_POST['updateName'];
    $update_desc = $_POST['updateDesc'];
    $update_job = $_POST['updateJob'];

        $update = "UPDATE home SET title ='$update_title', my_name = '$update_name', my_description = '$update_desc', my_job = '$update_job'
        WHERE id = '$id'";
        $result = mysqli_query($conn, $update);

        if ($update) {
            echo "<script>alert('Home Berhasil Di Update!');window.location='home.php';</script>";
        } else {
            echo "<script>alert('Home Gagal Di Update!');window.location='home.php';</script>";
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
                            <h1>Update Home</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <span class="mdi mdi-home"></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">Edit Home</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Data Home
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
                                        Home <?= $data['title']; ?></h3>
                                </div>
                                <div class="card-body">
                                    <h5 id="update_message" class="text-danger font-weight-bold"></h5>
                                    <div class="alert alert-danger" role="alert" id="up-alert" hidden>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="updateTitle">Update Title</label>
                                            <input type="hidden" class="form-control" id="updateId" name="id">
                                            <input type="text" class="form-control" id="updatepTitle"
                                                value="<?= $data['title']; ?>" name="updateTitle">
                                        </div>
                                        <div class="form-group">
                                            <label for="updateName">Update Name</label>
                                            <input type="text" class="form-control" id="updateName"
                                                value="<?= $data['my_name']; ?>" name="updateName">
                                        </div>
                                        <div class="form-group">
                                            <label for="updateDesc">Update Description</label>
                                            <input type="text" class="form-control" id="updateDesc"
                                                value="<?= $data['my_description']; ?>" name="updateDesc">
                                        </div>
                                        <div class="form-group">
                                            <label for="updateJob">Update Job</label>
                                            <input type="text" class="form-control" id="updateJob"
                                                value="<?= $data['my_job']; ?>" name="updateJob">
                                        </div>
                                        <div class="footer">
                                            <button type="submit" class="btn btn-primary float-right"
                                                name="update_home">Update
                                                Home</button>
                                            <a href="home.php" class="btn btn-danger float-right mr-2">Back</a>
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
</body>

</html>