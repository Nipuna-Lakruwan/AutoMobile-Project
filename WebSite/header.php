<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="/AutoMobile Project/assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
    // Determine the current page
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>
    <div class="header">
        <nav class="navbar navbar-expand-sm fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/images/logo.svg" alt="Logo" style="width: 70px;">
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'main.php') ? 'active' : ''; ?>" href="main.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'service.php') ? 'active' : ''; ?>" href="service.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'appointment.php') ? 'active' : ''; ?>" href="appointment.php">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'AboutUs.php') ? 'active' : ''; ?>" href="AboutUs.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'contactUs.php') ? 'active' : ''; ?>" href="contactUs.php">Contact Us</a>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="../../login.php">
                                <button class="button" id="loginBtn">
                                    <span class="button_lg">
                                        <span class="button_sl"></span>
                                        <span class="button_text"><a href="/AutoMobile Project/login.php" class="button">Sign In | Sign Up</a></span>
                                    </span>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="d-none d-lg-block">
                    <button class="button" id="loginBtn">
                        <span class="button_lg">
                            <span class="button_sl"></span>
                            <span class="button_text">Sign In | Sign Up</span>
                        </span>
                    </button>
                </div>

                <div class="navbar-dropdown" id="dropdown">
                    <div class="dropdown">
                        <ul class="nav-item-dropdown">
                            <li class="dropdown-item">
                                <a class="drop-link <?php echo ($currentPage == 'main.php') ? 'active' : ''; ?>" href="main.php">Home</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drop-link <?php echo ($currentPage == 'service.php') ? 'active' : ''; ?>" href="service.php">Services</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drop-link <?php echo ($currentPage == 'appointment.php') ? 'active' : ''; ?>" href="appointment.php">Appointments</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drop-link <?php echo ($currentPage == 'AboutUs.php') ? 'active' : ''; ?>" href="AboutUs.php">About</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drop-link <?php echo ($currentPage == 'contactUs.php') ? 'active' : ''; ?>" href="contactUs.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="dropdown-toggle" onclick="togglenav()">
                    <i class="lni lni-menu"></i>
                </button>

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="<?php echo $_SESSION['auth_user']['profile_pic']; ?>" alt="User">
                            <div class="user-names">
                                <h3><?php echo $_SESSION['auth_user']['fname']; ?></h3>
                                <h5><?php echo $_SESSION['auth_user']['lname']; ?></h5>
                            </div>
                        </div>
                        <hr>
                        <ul class="sub-menu-list">
                            <li class="sub-menu-options">
                                <a href="/AutoMobile Project/User/profile.php" class="sub-menu-link">
                                    <i class="fa-solid fa-user"></i>
                                    <p>Edit Profile</p>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </a>
                            </li>

                            <li class="sub-menu-options">
                                <a href="/AutoMobile Project/User/vehicle.php" class="sub-menu-link">
                                    <i class="fa-solid fa-bars"></i>
                                    <p>Dashboard</p>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </a>
                            </li>

                            <li class="sub-menu-options">
                                <a href="/AutoMobile Project/User/setting.php" class="sub-menu-link">
                                    <i class="fa-solid fa-gear"></i>
                                    <p>Settings</p>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </a>
                            </li>

                            <li class="sub-menu-options">
                                <a href="/AutoMobile Project/User/logout.php" class="sub-menu-link">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <p>Log Out</p>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>