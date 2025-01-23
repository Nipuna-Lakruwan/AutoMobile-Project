<?php include'header.php'; ?>
<link rel="stylesheet" href="assets/css/main.css">

<div class="ContactUsH">
    <h1>Appointments</h1>
    <h4>Home / Appointments</h4>
    <hr>
</div>

<div class="AppmainCont">
    <div class="appLeftCont">
        <h2>REQUEST FOR AN APPOINTMENT</h2>
        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
        <div class="appPic">
            <img src="assets/images/testimaonial.png" alt="Customer 1" class="cusImg">
            <img src="assets/images/testimaonial-img-bg.png" alt="Customer 1" class="aboutBackground">    
        </div>
    </div>
    <div class="appRightCont">
        <div class="signUp">
            <h2>Sign-up Today</h2>
            <p>Become a valued part of our community. Sign up now to access personalized appointments, exclusive offers, and timely updates tailored just for you.</p>
            <button onclick="window.location.href='/AutoMobile Project/login.php'">Sign-up</button>
        </div>
        
        <div class="hotLine">
            <h2>Our hotline</h2>
            <p>Call us at 011-1234567</p>
            <button onclick="window.location.href='tel:+1234567890'"><i class="fa-solid fa-phone"></i> &nbsp Call Now</button>
        </div>
    </div>
</div>

&nbsp;



<?php
    include 'footer.php';
?>