<?php 
session_start();
require_once("includes/connection.php");
require_once("../Login/function.php");

if (!isset($_SESSION["username"])) {
    header("location: ../Login/login.php");
    exit;
}

$user_data = check_login($conn);

//Waktu
$date  = date('Y-m-d');
$diff  = strtotime($date); $tgl_f = date("d F Y", $diff);
$clock = date('H:i:s');

//Total Orders
$query      = "SELECT * FROM pesan_masuk";
$result     = mysqli_query($conn, $query);
$message    = mysqli_num_rows($result);

//Total Product
$query      = "SELECT * FROM user_admin";
$result     = mysqli_query($conn, $query);
$admin    = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">


    <title>Welcome - Admin Fikri</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
    <!-- No Extra plugin used -->
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />

    <!-- FAVICON -->
    <link href="assets/img/content/aurora.png" rel="shortcut icon" />
</head>


<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <div class="wrapper">
        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="#" title="Message">
                        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"
                            width="30" height="33" viewBox="0 0 30 33">
                            <g fill="none" fill-rule="evenodd">
                                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                        </svg>
                        <span class="brand-name text-truncate">Message For Me</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">



                        <li class="has-sub active expand">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                                <div class="sub-menu">



                                    <li>
                                        <a class="sidenav-item-link" href="index.php">
                                            <span class="nav-text">Incoming Message</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link"
                                            href="my_profile/alladmin.php?id=<?= $user_data['id'] ?>">
                                            <span class="nav-text">My Profile</span>

                                        </a>
                                    </li>




                                </div>
                            </ul>
                        </li>

                        <li class="has-sub active expand">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#accessme" aria-expanded="false" aria-controls="portfolio">
                                <i class="mdi mdi-pencil-box-multiple"></i>
                                <span class="nav-text">Access Portfolio</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse show" id="accessme" data-parent="#sidebar-menu">
                                <div class="sub-menu">



                                    <li>
                                        <a class="sidenav-item-link" href="home/home.php">
                                            <span class="nav-text">Home</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="about_me/about.php">
                                            <span class="nav-text">About</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="my_gallery/gallery.php">
                                            <span class="nav-text">Gallery</span>

                                        </a>
                                    </li>




                                </div>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </aside>


        <div class="page-wrapper">
            <!-- Header -->
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
                                    <img src="assets/img/user/<?= $user_data['image']?>" class="user-image"
                                        alt="User Image" />
                                    <span class="d-none d-lg-inline-block"><?= $user_data['username']; ?></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <img src="assets/img/user/<?= $user_data['image']?>" class="img-circle"
                                            alt="User Image" />
                                        <div class="d-inline-block">
                                            <?= $user_data['username']; ?><small
                                                class="pt-1"><?= $user_data['email']; ?></small>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="my_profile/alladmin.php?id=<?= $user_data['id'] ?>">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
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
                    <!-- Top Statistics -->
                    <div class="row justify-content-center mb-4">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card card-mini mb-4 shadow-sm">
                                <div class="card-body">
                                    <h2 class="mb-1"><?= $message ?></h2>
                                    <p>Total Pesan Masuk</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card card-mini mb-4 shadow-sm">
                                <div class="card-body">
                                    <h2 class="mb-1"><?= $admin ?></h2>
                                    <p>Total Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-wrapper breadcrumb-contacts">
                        <div>
                            <h1>Dashboard</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <span class="mdi mdi-home"></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">Message</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Incoming Message For Me
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="pdfmessage.php" target="_blank" class="btn btn-success">
                                <i class="mdi mdi-download h5 mr-1"></i>
                                Export PDF
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                                    <h2>Incoming Message For Me</h2>
                                </div>

                                <div class="card-body">
                                    <div class="hoverable-data-table">
                                        <table id="tablePesan" class="table hover table-bordered nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr class="bg-light text-center">
                                                    <th>No</th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="bg-light text-center">
                                                    <th>No</th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </tfoot>

                                            <?php $no = 1; ?>
                                            <?php
                                                $stmt = $conn->prepare('SELECT * FROM pesan_masuk');
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                while ($row = $result->fetch_assoc()):
                                            ?>
                                            <tbody>
                                                <th class="text-center"><?= $no ?></th>
                                                <td class="text-center"><?= $row['id'] ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['subject'] ?></td>
                                                <td><?= $row['message'] ?></td>
                                                <td><?= $row['created_at'] ?></td>
                                            </tbody>
                                            <?php $no++ ?>
                                            <?php endwhile; ?>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pilih Logout di bawah ini jika Anda siap untuk mengakhiri sesi
                                    Anda saat ini. Pilih Cancel jika tidak ingin mengakhiri sesi.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" href="../Login/logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="assets/plugins/jquery/jquery.min.js"></script>
            <script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
            <script src="assets/plugins/data-tables/jquery.datatables.min.js"></script>
            <script src="assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>
            <script src="assets/js/sleek.bundle.js"></script>
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
            </script>
</body>

</html>