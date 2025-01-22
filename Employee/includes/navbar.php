<body>
    <div class="content">
        <!-- Navbar -->
        <nav>
            <div class="logo-container">
                <img src="/AutoMobile Project/Employee/assets/img/logo.png" alt="Cras Auto">
            </div>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <div class="profile-dropdown">
                <div onclick="toggle()" class="profile-dropdown-btn">
                    <div class="profile-img" style="background: url('<?php echo $_SESSION['auth_user']['profile_pic']; ?>'); background-size: cover;">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                    <span>
                        <?php echo $_SESSION['auth_user']['fname']; ?>
                        <i class="fa-solid fa-angle-down" style="margin: 0 0 0 10px;"></i>
                    </span>
                </div>
                <ul class="profile-dropdown-list">
                    <li class="profile-dropdown-list-item">
                        <a href="/AutoMobile Project/Employee/profile.php">
                            <i class="fa-regular fa-user"></i>
                            Edit Profile
                        </a>
                    </li>
                    <!-- <li class="profile-dropdown-list-item">
                        <a href="#">
                            <i class="fa-regular fa-envelope"></i>
                            Inbox
                        </a>
                    </li> -->
                    <!-- <li class="profile-dropdown-list-item">
                        <a href="/AutoMobile Project/admin/dashboard.php">
                            <i class="fa-solid fa-chart-line"></i>
                            Analytics
                        </a>
                    </li> -->
                    <!-- <li class="profile-dropdown-list-item">
                        <a href="#">
                            <i class="fa-solid fa-sliders"></i>
                            Settings
                        </a>
                    </li> -->
                    <!-- <li class="profile-dropdown-list-item">
                        <a href="#">
                            <i class="fa-regular fa-circle-question"></i>
                            Help & Support
                        </a>
                    </li> -->
                    <hr />
                    <li class="profile-dropdown-list-item">
                        <a href="/AutoMobile Project/Employee/logout.php">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Log out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End of Navbar -->
    </div>
</body>