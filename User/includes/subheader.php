<div class="sub-header d-none d-sm-block">
    <div class="main-pic">
        <img src="/AutoMobile Project/User/assets/img/blackcar.png" alt="car" style="width: 100%;">
    </div>
    <div class="profile-pic-container">
        <img src="<?php echo $_SESSION['auth_user']['profile_pic']; ?>" alt="Profile Picture" class="profile-pic">
    </div>
    <div class="user-name">
        <h1><?php echo $_SESSION['auth_user']['name']; ?></h1>
        <h4><?php echo $_SESSION['auth_user']['membership']; ?><i class="fa-solid fa-star"></i></h4>
    </div>
</div>