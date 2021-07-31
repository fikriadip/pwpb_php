<?php 
require_once("../includes/connection.php");
require_once("../template/template.php");
require_once("function.php");

$user_data = check_login($conn);
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
                            <h1>Home</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0">
                                    <li class="breadcrumb-item">
                                        <a href="#">
                                            <span class="mdi mdi-home"></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Data Home
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalHome">
                                <i class="mdi mdi-plus h5 mr-1"></i>
                                Add New Home
                            </button>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                                    <h2>My Home</h2>
                                </div>

                                <div class="card-body">
                                    <div class="hoverable-data-table" id="showTable">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Add Modal -->
                    <div class="modal fade" id="modalHome" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Add
                                        Home</h4>
                                    <button type="button" class="close text-danger" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 id="message" class="text-success font-weight-bold"></h5>
                                    <form id="data-home" onsubmit="event.preventDefault()">
                                        <div class="form-group">
                                            <label for="title">Enter Title</label>
                                            <input type="text" class="form-control" id="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Enter Name</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Enter Description</label>
                                            <input type="text" class="form-control" id="desc">
                                        </div>
                                        <div class="form-group">
                                            <label for="job">Enter Job</label>
                                            <input type="text" class="form-control" id="job">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                id="btn_close">Close</button>
                                            <button type="submit" class="btn btn-primary" id="save_home">Save
                                                Home</button>
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
    <script src="js/my_home.js"></script>
</body>

</html>