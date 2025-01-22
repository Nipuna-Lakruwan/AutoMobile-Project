<?php
include 'includes/header.php';
include 'includes/navbar.php';
include '../config/dbconnection.php';

$appId = isset($_GET['appId']) ? $_GET['appId'] : null;
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/billing.css">

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('billingOptions.php')">
            <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
            Back
        </h2>
    </div>
    <div class="item home">
        <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
    </div>
    <div class="item name">
        <h1>Billing</h1>
        <hr>
    </div>
</div>

<div class="main-container">
    <div class="left-section">
        <div class="search-bar">
            <div class="search-wrapper" style="position: relative;">
                <input type="text" id="itemSearch" placeholder="Search item...">
            </div>
            <ul id="itemSuggestions" class="suggestions"></ul>
        </div>

        <table id="itemsTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="itemsTableBody" class="hidden">
                <!-- Rows will be added dynamically here -->
            </tbody>
        </table>
    </div>

    <div class="line"></div>
    <div class="right-section">
        <div class="sum-container">
            <h1>Summary</h1>
            <table id="summaryTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody id="summaryTableBody">
                    <!-- Summary rows will be added here dynamically -->
                </tbody>
            </table>
            <hr>
            <div class="total">Rs. 0.00</div>
            <a href="#" class="checkout-btn" onclick="checkout()">Checkout</a>
        </div>
    </div>
</div>

<style>
    .hidden {
        display: none;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    let summaryItems = [];
    const appId = "<?php echo $appId; ?>";

    // Search for items
    $("#itemSearch").on("input", function() {
        const searchTerm = $(this).val();
        if (searchTerm.length > 0) {
            $.post("/AutoMobile Project/Employee/billing_handler.php", {
                action: "search_item",
                searchTerm
            }, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    let suggestions = "";
                    data.data.forEach((item) => {
                        suggestions += `<li onclick="selectItem(${item.item_id})">${item.item_name}</li>`;
                    });
                    $("#itemSuggestions").html(suggestions).show();
                }
            });
        } else {
            $("#itemSuggestions").hide();
        }
    });

    // Hide suggestions when clicking outside
    $(document).on("click", function(event) {
        if (!$(event.target).closest("#itemSearch, #itemSuggestions").length) {
            $("#itemSuggestions").hide();
        }
    });

    // Select item and add to items table
    function selectItem(itemId) {
        $.post("/AutoMobile Project/Employee/billing_handler.php", {
            action: "get_item_details",
            itemId
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                const item = data.data;
                const newRow = `
                    <tr>
                        <td>${summaryItems.length + 1}</td>
                        <td>${item.item_id}</td>
                        <td>${item.item_name}</td>
                        <td>
                            <div class="qty-buttons">
                                <button onclick="decrementQty(this)">-</button>
                                <input type="number" value="1" min="1" onchange="updateQty(this)">
                                <button onclick="incrementQty(this)">+</button>
                            </div>
                        </td>
                        <td>Rs. ${item.unit_price}</td>
                        <td class="bin"><i class="fa-regular fa-trash-can" style="color: #831100;" onclick="removeItem(this)"></i></td>
                    </tr>
                `;
                $("#itemsTableBody").append(newRow).removeClass('hidden');
                addToSummary(item.item_id, item.item_name, 1, item.unit_price);
            }
            $("#itemSuggestions").hide();
        });
    }

    // Increment quantity
    function incrementQty(button) {
        let input = button.previousElementSibling;
        let currentValue = parseInt(input.value);
        input.value = currentValue + 1;
        updateSummary(button, currentValue + 1);
    }

    // Decrement quantity
    function decrementQty(button) {
        let input = button.nextElementSibling;
        let currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
            updateSummary(button, currentValue - 1);
        } else {
            removeItem(button);
        }
    }

    // Update quantity
    function updateQty(input) {
        let newQty = parseInt(input.value);
        if (newQty < 1) {
            newQty = 1;
            input.value = 1;
        }
        updateSummary(input, newQty);
    }

    // Add item to summary
    function addToSummary(itemId, itemName, qty, price) {
        summaryItems.push({ itemId, itemName, qty, price });
        updateSummaryTable();
    }

    // Update summary table
    function updateSummaryTable() {
        let summaryHTML = "";
        let total = 0;
        summaryItems.forEach((item, index) => {
            const itemTotal = item.qty * item.price;
            total += itemTotal;
            summaryHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.itemName}</td>
                    <td>${item.qty}</td>
                    <td>Rs. ${itemTotal.toFixed(2)}</td>
                </tr>
            `;
        });
        $("#summaryTableBody").html(summaryHTML);
        $(".total").text(`Rs. ${total.toFixed(2)}`);
    }

    // Update summary when quantity changes
    function updateSummary(element, newQty) {
        const row = $(element).closest("tr");
        const itemId = row.find("td:eq(1)").text();
        const item = summaryItems.find(item => item.itemId == itemId);
        item.qty = newQty;
        updateSummaryTable();
    }

    // Remove item from summary
    function removeItem(button) {
        const row = $(button).closest("tr");
        const itemId = row.find("td:eq(1)").text();
        summaryItems = summaryItems.filter(item => item.itemId != itemId);
        row.remove();
        if (summaryItems.length === 0) {
            $("#itemsTableBody").addClass('hidden');
        }
        updateSummaryTable();
    }

    // Checkout and update appointment status
    function checkout() {
        if (appId) {
            $.post("/AutoMobile Project/Employee/billing_handler.php", {
                action: "checkout",
                appId,
                summaryItems
            }, function(response) {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    alert("Checkout successful!");
                    window.location.href = 'pendingAppointments.php';
                } else {
                    alert("Checkout failed: " + data.message);
                }
            });
        } else {
            alert("No appointment selected for billing.");
        }
    }
</script>
</body>
</html>