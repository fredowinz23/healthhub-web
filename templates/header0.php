<?php
session_start();
include_once($ROOT_DIR . "config/database.php");
include_once($ROOT_DIR . "config/Models.php");
$user = $_SESSION["user_session"];
$username = $user["username"];

$ownerId = $user["Id"];
$store_list = store()->list("ownerId=$ownerId");

?>
<style media="screen">
  .primary-color{
    background: #82a63c;
  }
  .btn-primary{
    background: #668c2e !important;
    border: #668c2e !important;
  }
</style>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Healthhub:  integrated system for patient charting and nurses scheduling for hospital system</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?=$ROOT_DIR;?>templates/css/styles.css" rel="stylesheet" />
        <link rel="shortcut icon" href="<?=$ROOT_DIR;?>user-templates/favicon.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark primary-color">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">PRACTICE CENTER</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form method="get" action="records.php" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" name="keyword" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><span class="dropdown-item"><?=$user["firstName"];?> <?=$user["lastName"];?> (<?=$user["role"];?>)</span></li>
                        <hr>
                          <li><a class="dropdown-item" href="../auth/process.php?action=user-logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                Home
                            </a>
                            <?php if ($user["role"]=="Admin"): ?>
                            <div class="sb-sidenav-menu-heading">Accounts:</div>
                                <a class="nav-link" href="users.php?role=Admin">
                                    Acounts
                                </a>
                            <?php endif; ?>


                            <?php if ($user["role"]=="Admin"): ?>
                            <div class="sb-sidenav-menu-heading">Courses:</div>
                                  <a class="nav-link" href="course-categories.php">
                                      Categories
                                  </a>
                            <?php endif; ?>

                            <div class="sb-sidenav-menu-heading">Products:</div>

                            <a class="nav-link" href="categories.php">
                                Categories
                            </a>


                            <?php if ($user["role"]=="Admin"): ?>
                                <a class="nav-link" href="">
                                    Orders
                                </a>
                            <?php endif; ?>


                            <div class="sb-sidenav-menu-heading">Others:</div>

                            <a class="nav-link" href="../auth/process.php?action=user-logout">
                                Logout
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer primary-color">
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
