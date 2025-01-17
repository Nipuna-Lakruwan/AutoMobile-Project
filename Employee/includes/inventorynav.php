<div class="navbar">
    <button>
        <div class="nav-item" onclick="redirectTo('inventory.php')">
            <div class="badge" id="requestCount">0</div>
            <i class="fa-solid fa-message fa-3x" style=" color: #ffffff;"></i>
            <p>Requests</p>
        </div>
    </button>

    <button>
        <div class="nav-item" onclick="redirectTo('addItem.php')">
            <i class="fa-solid fa-cart-plus fa-3x" style=" color: #ffffff;"></i>
            <p>Add Items</p>
        </div>
    </button>

    <button>
        <div class="nav-item" onclick="redirectTo('editItem.php')">
            <i class="fa-solid fa-pen-to-square fa-3x" style=" color: #ffffff;"></i>
            <p>Edit Item</p>
        </div>
    </button>

    <button>
        <div class="nav-item" onclick="redirectTo('inventorySummary.php')">
            <i class="fa-solid fa-clipboard-list fa-3x" style=" color: #ffffff;"></i>
            <p>Summary</p>
        </div>
    </button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        fetchRequestCount();
    });

    function fetchRequestCount() {
        $.get("/AutoMobile Project/Employee/fetch_inventory_request_count.php", function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                $("#requestCount").text(data.data);
            }
        });
    }
</script>