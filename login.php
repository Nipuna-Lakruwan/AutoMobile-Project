<?php 
    if(isset($_SESSION["auth_user"])) {
        header("Location: /AutoMobile Project/User/vehicle.php");
        exit();
    }
    include 'User/includes/header.php';
    include 'functions/alert.php';
?>

    <link rel="stylesheet" href="/AutoMobile Project/assets/css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <video autoplay muted loop id="myVideo">
        <source src="assets/video/background.mp4" type="video/mp4">
    </video>

    <!-- Header Section -->
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>

        <div class="from-box login">
            <h2 class="animation" style="--i:0; --j:20;">Login</h2>
            <form action="/AutoMobile Project/functions/auth.php" method="POST">
                <div class="input-box animation" style="--i:1; --j:21;">
                    <input type="text" name="email" required>
                    <label>Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:22;">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock'></i>
                </div>
                <button type="submit" name="login_btn" class="btn animation" style="--i:3; --j:23;">Login</button>
                <div class ="logreg-link animation" style="--i:4; --j:24;">
                    <p>Don't have an account? <a href="#" class="register-link">Sign Up</a></p>
                </div>
                    
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2>
            <p class="animation" style="--i:1; --j:21;">Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
        </div>

        <div class="from-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
            <form action="/AutoMobile Project/functions/auth.php" method="POST">
                <div class="FLname animation" style="--i:18; --j:1;">
                <div class="input-box">
                    <input type="text" name="F_name" required>
                    <label>First Name</label>
                </div>
                <div class="input-box">
                    <input type="text" name="L_name" required>
                    <label>Last Name</label>
                    <i class='bx bxs-user'></i>
                </div>
                </div>
                <div class="input-box animation" style="--i:19; --j:2;">
                    <input type="text" name="Email" required>
                    <label>Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="password" name="Password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock'></i>
                </div>
                <div class="input-box animation" style="--i:21; --j:4;">
                    <input type="password" name="Re-Password" required>
                    <label>Re-enter Password</label>
                    <i class='bx bxs-lock'></i>
                </div>
                <button type="submit" name="register_btn" class="btn animation" style="--i:21; --j:5;">Sign Up</button>
                <div class ="logreg-link animation" style="--i:22; --j:6;">
                    <p>Already have an account? <a href="#" class="login-link">Sign In</a></p>
                </div>    
            </form>
        </div>
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Welcome Back!</h2>
            <p class="animation"style="--i:18; --j:1;">Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
        </div>
    </div>    

    <script src="/AutoMobile Project/assets/js/index.js"></script>
</body>