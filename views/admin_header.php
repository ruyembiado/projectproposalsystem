<?php
@include('../config/config.php');
if (!isset($_SESSION['isLogin'])) :
    setFlash('failed', 'Please login first!');
    redirect('login');
endif;
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/datatable.css">
    <link rel="stylesheet" href="../public/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>

<body>
    <!--   SIDE BAR   --->
    <div class="sidebar">
        <div class="logo-details">
            &nbsp;&nbsp;&nbsp;
            <img src="../public/assets/img/logo.png" width="40px" alt="">
            &nbsp;&nbsp;&nbsp;
            <span class="logo_name">ISATU</span>
        </div>
        <ul class="nav-links">
            <li>
                <a id="dashboard" class="Links" href="admin_index.php">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../public/assets/img/m2.png" width="21px" alt="">
                    &nbsp;&nbsp;&nbsp;
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <!-- <li>
                    <a id="campus" href="admin_manage_campus.php" class="Links">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="../public/assets/img/m2.png" width="21px" alt="">
                        &nbsp;&nbsp;&nbsp;
                        <span class="links_name">Campus</span>
                    </a>
                </li> -->
            <li>
                <a id="department" href="admin_manage_college.php" class="Links">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../public/assets/img/m2.png" width="21px" alt="">
                    &nbsp;&nbsp;&nbsp;
                    <span class="links_name">Colleges</span>

                </a>
            </li>
            <li>
                <a id="department" href="admin_manage_department.php" class="Links">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../public/assets/img/m2.png" width="21px" alt="">
                    &nbsp;&nbsp;&nbsp;
                    <span class="links_name">Departments</span>

                </a>
            </li>
            <li>
                <a id="position" href="admin_manage_position.php" class="Links">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../public/assets/img/m2.png" width="21px" alt="">
                    &nbsp;&nbsp;&nbsp;
                    <span class="links_name">Positions</span>

                </a>
            </li>
            <li>
                <a id="employee" href="admin_manage_employee.php" class="Links">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../public/assets/img/m2.png" width="21px" alt="">
                    &nbsp;&nbsp;&nbsp;
                    <span class="links_name">Employees</span>

                </a>
            </li>
            <!-- <li>
                    <a id="course" href="admin_manage_course.php" class="Links">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="../public/assets/img/m2.png" width="21px" alt="">
                        &nbsp;&nbsp;&nbsp;
                        <span class="links_name">Courses</span>

                    </a>
                </li> -->
            <!-- <li>
                    <a id="student" href="admin_manage_student.php" class="Links">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="../public/assets/img/m2.png" width="21px" alt="">
                        &nbsp;&nbsp;&nbsp;
                        <span class="links_name">Students</span>

                    </a>
                </li> -->
            <!-- <li>
                <a href="recent.html">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../public/assets/img/m2.png" width="21px" alt="">
                    &nbsp;&nbsp;&nbsp;
                    <span class="links_name">Recent Acc</span>

                </a>
            </li> -->

            </u>
    </div>
    <!--   TOP BAR   --->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>

            <!-- <div class="search-box">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search'></i>
                </div> -->
            <div class="profile-details" style="padding: 5px !important;">
                <span class="admin_name"><?php echo $_SESSION['admin_name'] ?></span>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex text-light text-bold" style="padding: 5px !important;" data-bs-toggle="dropdown">
                        <span class="d-flex align-self-center justify-content-between"><i class="fa fa-cog text-dark" style="font-size: 18px;"></i></span>
                        <i class='bx bx-chevron-down'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end rounded bg-light rounded-0 rounded-bottom m-0" style="border: 1px solid lightgray;">
                        <a href="#" class="dropdown-item d-flex align-items-center justify-content-start text-dark side-link">
                            <i class="fa fa-user pe-2" style="font-size: 18px;"></i> My Profile
                        </a>
                        <a href="../actions/logout.php" class="dropdown-item d-flex align-items-center justify-content-start text-dark logout side-link"><i class="fas fa-power-off pe-2" style="font-size: 18px;"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </nav>