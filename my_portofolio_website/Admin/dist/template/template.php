<?php 
require_once("../includes/connection.php");
require_once("../../Login/function.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../../Login/login.php");
    exit;
}

$user_data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
    <title>Muhammad Fikri</title>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
    <!-- No Extra plugin used -->
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="../assets/css/sleek.css" />

    <!-- FAVICON -->
    <link href="../assets/img/content/aurora.png" rel="shortcut icon" />

</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <aside class="left-sidebar bg-sidebar">
        <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
                <a href="#" title="Message">
                    <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                        height="33" viewBox="0 0 30 33">
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
                                    <a class="sidenav-item-link" href="../index.php">
                                        <span class="nav-text">Incoming Message</span>

                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link"
                                        href="../my_profile/alladmin.php?id=<?= $user_data['id'] ?>">
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
                                    <a class="sidenav-item-link" href="../home/home.php">
                                        <span class="nav-text">Home</span>

                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="../about_me/about.php">
                                        <span class="nav-text">About</span>

                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="../my_gallery/gallery.php">
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-danger" href="../../Login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
    <script src="../assets/plugins/data-tables/jquery.datatables.min.js"></script>
    <script src="../assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>
    <script src="../assets/js/sleek.bundle.js"></script>
</body>

</html>