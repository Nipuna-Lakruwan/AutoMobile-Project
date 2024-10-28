<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/AutoMobile Project/assets/img/icon.png">
    <title>Cras Auto</title>
    <link rel="stylesheet" href="/AutoMobile Project/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/AutoMobile Project/User/assets/css/styles.css">
    <script src="/AutoMobile Project/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/AutoMobile Project/assets/js/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-sm fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/AutoMobile Project/User/assets/img/logo.svg" alt="Logo" style="width: 70px;">
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
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
                <?php
                    if(isset($_SESSION['auth'])) {
                ?>
                
                <div class="user-pic">
                    <img src= "<?php echo $_SESSION['auth_user']['profile_pic']; ?>" alt="User" id="subMenuBtn">
                </div>
                <?php
                    } else {
                ?>
                <div class="d-none d-lg-block">
                <button class="button" id="loginBtn">
                    <span class="button_lg">
                        <span class="button_sl"></span>
                        <span class="button_text">Sign In | Sign Up</span>
                    </span>
                    </button>
                    </div>
                <?php
                    }
                ?>

                <div class="navbar-dropdown" id="dropdown">
                    <div class="dropdown">
                        <ul class="nav-item-dropdown">
                            <li class="dropdown-item">
                                <a class="drop-link" href="#">Home</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drop-link" href="#">Services</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drop-link" href="#">Appointments</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drop-link" href="#">About</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drop-link" href="#">Contact Us</a>
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
                                <a href="/AutoMobile Project/Mechanic/profile.php" class= "sub-menu-link">
                                    <i class="fa-solid fa-user"></i>
                                    <p>Edit Profile</p>
                                    <span><i class="fa-solid fa-chevron-right"></i></span></a>
                            </li>

                            <li class="sub-menu-options">
                                <a href="/AutoMobile Project/Mechanic/calender.php" class= "sub-menu-link">
                                    <i class="fa-solid fa-bars"></i>
                                    <p>Dashboard</p>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </a>
                            </li>

                            <li class="sub-menu-options">
                                <a href="/AutoMobile Project/Mechanic/profile.php" class= "sub-menu-link">
                                    <i class="fa-solid fa-gear"></i>
                                    <p>Settings</p>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </a>
                            </li>

                            <li class="sub-menu-options">
                                <a href="/AutoMobile Project/Mechanic/logout.php" class= "sub-menu-link">
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