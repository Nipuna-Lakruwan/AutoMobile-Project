<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/inventory.css">

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('home.php')">
            <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
            Back
        </h2>
    </div>
    <div class="item home">
        <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
    </div>
    <div class="item name">
        <h1>Inventory System</h1>
        <hr>
    </div>
</div>

<div class="invenContainer">
    <?php include 'includes/inventorynav.php' ?>

    <div class="line"></div>

    <div class="formcontainer">
        <h2>Edit Items</h2>
        <hr class="topicLine">
        <div class="form">
            <form id="editItemForm">
                <input type="hidden" id="itemId" name="itemId">
                <div class="form-group">
                    <label for="itemName">Item Name</label>
                    <input type="text" id="itemName" name="itemName" required>
                    <ul id="itemNameSuggestions" class="suggestions"></ul>
                </div>
                <div class="form-group">
                    <label for="brandName">Brand Name</label>
                    <input type="text" id="brandName" name="brandName" required>
                    <ul id="brandNameSuggestions" class="suggestions"></ul>
                </div>
                <div class="form-group">
                    <label for="itemCode">Item Code</label>
                    <input type="text" id="itemCode" name="itemCode" readonly>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" id="category" name="category" required>
                </div>
                <div class="form-group">
                    <label for="itemqty">Item Quantity</label>
                    <input type="number" id="itemqty" name="itemqty" required>
                </div>
                <div class="form-group">
                    <label for="byingPrice">Buying Price</label>
                    <input type="number" id="byingPrice" name="byingPrice" required>
                </div>
                <div class="form-group">
                    <label for="sellingPrice">Selling Price</label>
                    <input type="number" id="sellingPrice" name="sellingPrice" required>
                </div>
                <button type="submit" class="submit">Edit Item</button>
            </form>
        </div>
    </div>
</div>

<style>
    .suggestions {
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        max-height: 200px;
        overflow-y: auto;
        width: 25%; /* Adjust width to match input box */
        z-index: 1000;
        margin-top: 24px; /* Add some space between input and suggestions */
    }

    .suggestions li {
        padding: 10px;
        cursor: pointer;
    }

    .suggestions li:hover {
        background-color: #f0f0f0;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    $(document).ready(function() {
        $("#itemName").on("input", function() {
            const searchTerm = $(this).val();
            if (searchTerm.length > 0) {
                $.post("/AutoMobile Project/Employee/fetch_item_suggestions.php", { searchTerm, field: 'item_name' }, function(response) {
                    const data = JSON.parse(response);
                    if (data.status === "success") {
                        let suggestions = "";
                        data.data.forEach((item) => {
                            suggestions += `<li onclick="selectItemName('${item}')">${item}</li>`;
                        });
                        $("#itemNameSuggestions").html(suggestions).show();
                    }
                });
            } else {
                $("#itemNameSuggestions").hide();
            }
        });

        $("#brandName").on("input", function() {
            const searchTerm = $(this).val();
            if (searchTerm.length > 0) {
                $.post("/AutoMobile Project/Employee/fetch_item_suggestions.php", { searchTerm, field: 'brand' }, function(response) {
                    const data = JSON.parse(response);
                    if (data.status === "success") {
                        let suggestions = "";
                        data.data.forEach((item) => {
                            suggestions += `<li onclick="selectBrandName('${item}')">${item}</li>`;
                        });
                        $("#brandNameSuggestions").html(suggestions).show();
                    }
                });
            } else {
                $("#brandNameSuggestions").hide();
            }
        });

        $("#editItemForm").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
            $.post("/AutoMobile Project/Employee/inventEditItem.php", formData, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    showAlert(data.message, "success");
                    $("#editItemForm")[0].reset();
                } else {
                    showAlert(data.message, "error");
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                showAlert("Request failed: " + textStatus + ", " + errorThrown, "error");
            });
        });
    });

    function selectItemName(itemName) {
        $("#itemName").val(itemName);
        $("#itemNameSuggestions").hide();
        fetchItemDetails();
    }

    function selectBrandName(brandName) {
        $("#brandName").val(brandName);
        $("#brandNameSuggestions").hide();
        fetchItemDetails();
    }

    function fetchItemDetails() {
        const itemName = $("#itemName").val();
        const brandName = $("#brandName").val();
        if (itemName && brandName) {
            $.post("/AutoMobile Project/Employee/fetch_item_details.php", { itemName, brandName }, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    $("#itemId").val(data.data.item_id);
                    $("#itemCode").val(data.data.item_id); // Use item_id as item code
                    $("#category").val(data.data.category);
                    $("#itemqty").val(data.data.quantity);
                    $("#byingPrice").val(data.data.unit_buying_price);
                    $("#sellingPrice").val(data.data.unit_price);
                } else {
                    showAlert(data.message, "error");
                }
            });
        }
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
</style>
</body>
</html>