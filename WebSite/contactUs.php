<?php include'header.php'; ?>
<link rel="stylesheet" href="assets/css/main.css">

<div class="ContactUsH">
    <h1>Contact Us</h1>
    <h4>Home / Contact Us</h4>
    <hr>
</div>

<div class="helpCont">
    <div class="helpDis">
        <h2>How can we help?</h2>
        <p>We're committed to addressing your concerns and inquiries with the utmost care. Let us know how we can assist you, and our team will get back to you promptly!</p>
    </div>
    <div class="helpForm">
        <form action="contactUs.php" method="post" class="contactForm">
            <div class="inputCont item1">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div class="inputCont item2">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            </div>

            <div class="inputCont item3">
            <label for="subject">Which topic best matches your question?</label>
            <input type="email" name="email" id="email" required>
            </div>

            <div class="inputCont item4">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" required>
            </div>

            <div class="inputCont item5">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="formMsg" required></textarea>
            </div>

            </form> 

            <button type="submit">SEND MESSAGE</button>
    </div>
</div>

<div class="contactDetails">
    <div class="conDetailsLeft">
        <h2>Contact Us</h2>
        <p>We're committed to addressing your concerns and inquiries with the utmost care. Let us know how we can assist you, and our team will get back to you promptly!</p>
    </div>
    <div class="conDetailsRight">
            <table class="contactTable">
                <tr class="black">
                    <td class="topic">Email :</td>
                    <td>example@email.com <br>
                        info@crasauto.com
                    </td>
                </tr>
                <tr class="trans">
                    <td class="topic">Location :</td>
                    <td>1234 Street Name, City Name, 
                        <br>United States</td>
                </tr>
                <tr class="black">
                    <td class="topic">Phone :</td>
                    <td>(+94) 31 226 0123</td>
                </tr>
                <tr class="trans">
                    <td class="topic">Open Hours :</td>
                    <td>Mon - Sat 9 A.M - 6 P.M</td>
                </tr>
            </table>
    </div>
</div>






<?php
    include 'footer.php';
?>