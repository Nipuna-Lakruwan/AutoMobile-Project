<?php include 'header.php'; ?>
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
        <form id="contactForm" class="contactForm">
            <div class="inputCont item1">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div class="inputCont item2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="inputCont item3">
                <label for="topic">Which topic best matches your question?</label>
                <input type="text" name="topic" id="topic" required>
            </div>

            <div class="inputCont item4">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" required>
            </div>

            <div class="inputCont item5">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="formMsg" required></textarea>
            </div>

            <button type="submit">SEND MESSAGE</button>
        </form>
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
                <td>
                    <a href="mailto:example@email.com" class="contactLink">example@email.com</a><br>
                    <a href="mailto:info@crasauto.com" class="contactLink">info@crasauto.com</a>
                </td>
            </tr>
            <tr class="trans">
                <td class="topic">Location :</td>
                <td>
                    <a href="https://www.google.com/maps/search/?api=1&query=1234+Street+Name,+City+Name,+United+States" target="_blank" class="contactLink">
                        1234 Street Name, City Name, United States
                    </a>
                </td>
            </tr>
            <tr class="black">
                <td class="topic">Phone :</td>
                <td>
                    <a href="tel:+94312260123" class="contactLink">(+94) 31 226 0123</a>
                </td>
            </tr>
            <tr class="trans">
                <td class="topic">Open Hours :</td>
                <td>Mon - Sat 9 A.M - 6 P.M</td>
            </tr>
        </table>
    </div>
</div>

<style>
    .contactLink {
        color: white;
        text-decoration: none;
    }
    .contactLink:visited {
        color: darkred;
    }
    .contactLink:hover {
        text-decoration: none;
    }
</style>

<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#contactForm").on("submit", function(e) {
            e.preventDefault();

            const formData = {
                name: $("#name").val(),
                email: $("#email").val(),
                topic: $("#topic").val(),
                subject: $("#subject").val(),
                message: $("#message").val()
            };

            $.ajax({
                type: "POST",
                url: "send_contact_form.php",
                data: formData,
                success: function(response) {
                    alert("Message sent successfully!");
                    $("#contactForm")[0].reset();
                },
                error: function() {
                    alert("There was an error sending your message. Please try again later.");
                }
            });
        });
    });
</script>