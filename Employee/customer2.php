<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/customers2.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('customer.php')">
            <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
            Back
        </h2>
    </div>
    <div class="item home">
        <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
    </div>
    <div class="item name">
        <h1>Customers</h1>
        <hr>
    </div>
</div>

<div class="makeAppointments">
    <h2>Search Results...</h2>
    <hr class="search-hr">
    <h2 class="cusName"></h2>
    <hr class="underline">

    <form id="customerForm">
        <div class="form-group-cus">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name">
        </div>
        <div class="form-group-cus">
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name">
        </div>
        <div class="form-group-cus">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>
        <div class="form-group-cus">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone">
        </div>
    </form>

    <h2 class="pushright address"> Address </h2>
    <form>
        <div class="form-group-cus">
            <label for="address">Street No.</label>
            <input type="text" id="address" name="address">
        </div>
        <div class="form-group-cus">

        </div>

        <div class="form-group-cus">
            <label for="StreetName">Street Name</label>
            <input type="text" id="StreetName" name="StreetName">
        </div>
        <div class="form-group-cus">
            <label for="City">City</label>
            <input type="text" id="City" name="City">
        </div>
        <div class="form-group-cus">
            <label for="District">District</label>
            <input type="text" id="District" name="District">
        </div>
        <div class="form-group-cus">
            <label for="PostalCode">Postal Code</label>
            <input type="text" id="PostalCode" name="PostalCode">
        </div>
    </form>

    <h1 class="pushright additional"> Additional Information </h1>
    <h3 class="pushright">Profile Picture</h3>

    <form>
        <div class="form-group-cus">
            <div class="profile-pic">
                <img id="profilePic" src="assets/img/default.jpg" alt="profile" onclick="openProfilePicModal()">
            </div>
        </div>

        <div class="form-group-cus">
            <button class="btn" type="button" onclick="updateCustomerInfo()">Edit Info</button>
        </div>
    </form>
</div>

<!-- Profile Picture Modal -->
<div id="profilePicModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeProfilePicModal()">&times;</span>
        <h2>Change Profile Picture</h2>
        <form id="profilePicForm" enctype="multipart/form-data">
            <input type="file" id="newProfilePic" name="newProfilePic" accept="image/*" onchange="previewImage(event)">
            <div id="crop-container" style="display:none;">
                <img id="image-to-crop" style="max-width: 100%;">
            </div>
            <button type="button" onclick="uploadProfilePic()">Upload</button>
        </form>
    </div>
</div>

<hr class="search-hr">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    let cropper;

    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const customerId = urlParams.get('customerId');
        if (customerId) {
            fetchCustomerDetails(customerId);
        }
    });

    function fetchCustomerDetails(customerId) {
        $.get("/AutoMobile Project/Employee/fetch_customer_details.php", { customerId }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                const customer = data.data;
                $(".cusName").text(`${customer.fname} ${customer.lname}`);
                $("#first-name").val(customer.fname);
                $("#last-name").val(customer.lname);
                $("#email").val(customer.email);
                $("#phone").val(customer.phone);
                $("#address").val(customer.address_no);
                $("#StreetName").val(customer.street);
                $("#City").val(customer.city);
                $("#District").val(customer.district);
                $("#PostalCode").val(customer.zip_code);
                if (customer.profile_pic) {
                    $("#profilePic").attr("src", "/AutoMobile Project/Employee/assets/img/profile_pics/" + customer.profile_pic);
                }
            } else {
                showAlert(data.message, "error");
            }
        });
    }

    function openProfilePicModal() {
        $("#profilePicModal").show();
    }

    function closeProfilePicModal() {
        $("#profilePicModal").hide();
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        $("#crop-container").hide();
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $("#image-to-crop").attr("src", e.target.result);
                $("#crop-container").show();
                cropper = new Cropper(document.getElementById('image-to-crop'), {
                    aspectRatio: 1,
                    viewMode: 1,
                    minContainerWidth: 300,
                    minContainerHeight: 300,
                });
            };
            reader.readAsDataURL(file);
        }
    }

    function uploadProfilePic() {
        const canvas = cropper.getCroppedCanvas();
        canvas.toBlob(function(blob) {
            const formData = new FormData();
            formData.append('newProfilePic', blob, 'profile.jpg');
            formData.append('customerId', new URLSearchParams(window.location.search).get('customerId'));

            $.ajax({
                url: "/AutoMobile Project/Employee/upload_profile_pic.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.status === "success") {
                        $("#profilePic").attr("src", "/AutoMobile Project/Employee/assets/img/profile_pics/" + data.fileName);
                        closeProfilePicModal();
                        showAlert("Profile picture updated successfully", "success");
                    } else {
                        showAlert(data.message, "error");
                    }
                },
                error: function() {
                    showAlert("An error occurred while uploading the profile picture", "error");
                }
            });
        });
    }

    function updateCustomerInfo() {
        const customerId = new URLSearchParams(window.location.search).get('customerId');
        const customerData = {
            customerId,
            fname: $("#first-name").val(),
            lname: $("#last-name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            address_no: $("#address").val(),
            street: $("#StreetName").val(),
            city: $("#City").val(),
            district: $("#District").val(),
            zip_code: $("#PostalCode").val()
        };

        $.post("/AutoMobile Project/Employee/update_customer_details.php", customerData, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                showAlert("Customer information updated successfully", "success");
            } else {
                showAlert(data.message, "error");
            }
        });
    }

    function showAlert(message, type) {
        const alertBox = document.createElement("div");
        alertBox.className = `alert ${type}`;
        alertBox.textContent = message;
        document.body.appendChild(alertBox);

        setTimeout(() => {
            alertBox.remove();
        }, 3000);
    }
</script>

<style>
    .alert {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px;
        border-radius: 5px;
        z-index: 1000;
        color: #fff;
        font-size: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .alert.success {
        background-color: #4CAF50;
    }
    .alert.error {
        background-color: #f44336;
    }

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1000; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
</body>
</html>