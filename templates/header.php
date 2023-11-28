<!-- https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html -->
<?php
session_start();
include_once($ROOT_DIR . "config/database.php");
include_once($ROOT_DIR . "config/Models.php");
$user = $_SESSION["user_session"];
$username = $user["username"];
$account = account()->get("username='$username'");
$role = $account->role;

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health Hub</title>
  <link rel="shortcut icon" type="image/png" href="<?=$ROOT_DIR;?>templates/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="<?=$ROOT_DIR;?>templates/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.php" class="text-nowrap logo-img">
            <img src="<?=$ROOT_DIR;?>templates/assets/images/logos/dark-logo.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>

            <?php if ($role=="Admin"): ?>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">ACCOUNTS</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="accounts.php?role=Doctor" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Doctors</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="accounts.php?role=Head Nurse" aria-expanded="false">
                  <span>
                    <i class="ti ti-alert-circle"></i>
                  </span>
                  <span class="hide-menu">Head Nurses</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="accounts.php?role=Nurse" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Nurses</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="accounts.php?role=Admin" aria-expanded="false">
                  <span>
                    <i class="ti ti-file-description"></i>
                  </span>
                  <span class="hide-menu">Admins</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">SETTINGS</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="specialty.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-login"></i>
                  </span>
                  <span class="hide-menu">Specialties</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="department.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-user-plus"></i>
                  </span>
                  <span class="hide-menu">Department</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="symptoms.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-adjustments-alt"></i>
                  </span>
                  <span class="hide-menu">Symptoms</span>
                </a>
              </li>
            <?php endif; ?>

            <?php if ($role=="Head Nurse"): ?>

              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">NURSES</span>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="current-patients.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Current Patients</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="nurse-list.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Nurse List</span>
                </a>
              </li>


                <li class="sidebar-item">
                  <a class="sidebar-link" href="attendance.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Attendance</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="available-nurses.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Available Nurses</span>
                  </a>
                </li>


                <li class="sidebar-item">
                  <a class="sidebar-link" href="unavailable-nurses.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Unavailable Nurses</span>
                  </a>
                </li>
            <?php endif; ?>

            <?php if ($role=="Nurse"): ?>

              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">FORM</span>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="patient-form.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Patient Information</span>
                </a>
              </li>

                <li class="nav-small-cap">
                  <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                  <span class="hide-menu">RECORDS</span>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="assigned-patients.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Assigned Patients</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="admitted-patients.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Admitted Patients  </span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="patient-history.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Patient History</span>
                  </a>
                </li>
            <?php endif; ?>



            <?php if ($role=="Doctor"): ?>

              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">FORM</span>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="patient-form.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Patient Information</span>
                </a>
              </li>

                <li class="nav-small-cap">
                  <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                  <span class="hide-menu">RECORDS</span>
                </li>


                  <li class="sidebar-item">
                    <a class="sidebar-link" href="patient-list.php" aria-expanded="false">
                      <span>
                        <i class="ti ti-cards"></i>
                      </span>
                      <span class="hide-menu">Patient List  </span>
                    </a>
                  </li>

                  <li class="sidebar-item">
                    <a class="sidebar-link" href="admitted-patients.php" aria-expanded="false">
                      <span>
                        <i class="ti ti-cards"></i>
                      </span>
                      <span class="hide-menu">Admitted Patients  </span>
                    </a>
                  </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="patient-history.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Patient History</span>
                  </a>
                </li>

                <li class="nav-small-cap">
                  <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                  <span class="hide-menu">OTHERS</span>
                </li>


                <li class="sidebar-item">
                  <a class="sidebar-link" href="symptoms.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-adjustments-alt"></i>
                    </span>
                    <span class="hide-menu">Symptoms</span>
                  </a>
                </li>
            <?php endif; ?>

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?=$ROOT_DIR;?>templates/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="../auth/process.php?action=user-logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
