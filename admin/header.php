<?php 

include 'connection.php';

$uquery = "SELECT * FROM user";
$uresult = $conn->query($uquery);
$uinfo = $uresult->fetch_assoc();

?>

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="dashboard.php" class="logo d-flex align-items-center">
            <img src="assets/img/tsd.ico" alt="" />
            <span class="d-none d-lg-block">TESDA Admin</span>
        </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="../images/<?= $uinfo['avatar'] ?>" alt="Profile" class="rounded-circle" />
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $uinfo['name'] ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $uinfo['name'] ?></h6>
                        <span><?= $uinfo['position'] ?></span>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="profile.php">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="logout.php">
                           <i class="bi bi-box-arrow-right"></i>
                           <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>