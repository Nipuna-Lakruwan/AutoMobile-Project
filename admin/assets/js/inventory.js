document.addEventListener('DOMContentLoaded', function() {
    const searchBox = document.getElementById('searchBox');
    const newItemBtn = document.getElementById('newMeetingBtn');
    const rowsPerPageSelect = document.getElementById('rowsPerPage');
    const itemsTable = document.getElementById('meetingsTable').getElementsByTagName('tbody')[0];
    const paginationSpan = document.querySelector('.pagination span');
    const prevButton = document.querySelector('.pagination-controls button:first-child');
    const nextButton = document.querySelector('.pagination-controls button:last-child');
  
    let items = [
        {
            id: '001',
            name: 'Engine Oil',
            category: 'Oil',
            quantity: 100,
            price: 'Rs.50,000'
        },
        {
            id: '002',
            name: 'Brake Pads',
            category: 'Brakes',
            quantity: 150,
            price: 'Rs.75,000'
        },
        // Add more item objects as needed
    ];
  
    let currentPage = 1;
    let rowsPerPageCount = parseInt(rowsPerPageSelect.value) || 10;

    // Function to render table rows
    function renderTableRows(items) {
        itemsTable.innerHTML = '';
        items.forEach((item, index) => {
            let row = itemsTable.insertRow();
            row.insertCell(0).innerText = item.id;
            row.insertCell(1).innerText = item.name;
            row.insertCell(2).innerText = item.category;
            row.insertCell(3).innerText = item.quantity;
            row.insertCell(4).innerText = item.price;
            row.insertCell(5).innerHTML = `
                <a href="#" onclick="viewItem(${index})">View</a> |
                <a href="#" onclick="editItem(${index})">Edit</a> |
                <a href="#" onclick="deleteItem(${index})">Delete</a>
            `;
        });
    }

    // Function to handle pagination
    function paginateItems(items, page, rows) {
        const start = (page - 1) * rows;
        const end = start + rows;
        return items.slice(start, end);
    }

    // Function to update pagination controls
    function updatePaginationControls(filteredItems) {
        const totalEntries = filteredItems.length;
        const totalPages = Math.ceil(totalEntries / rowsPerPageCount);
        paginationSpan.innerText = `Showing ${(currentPage - 1) * rowsPerPageCount + 1} to ${Math.min(currentPage * rowsPerPageCount, totalEntries)} of ${totalEntries} entries`;

        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
    }

    // Initial render
    function updateTable() {
        const filteredItems = items.filter(item => 
            item.name.toLowerCase().includes(searchBox.value.toLowerCase())
        );
        const paginatedItems = paginateItems(filteredItems, currentPage, rowsPerPageCount);
        renderTableRows(paginatedItems);
        updatePaginationControls(filteredItems);
    }

    // Search functionality
    searchBox.addEventListener('input', updateTable);

    // Rows per page functionality
    rowsPerPageSelect.addEventListener('change', function() {
        rowsPerPageCount = parseInt(rowsPerPageSelect.value) || 10;
        updateTable();
    });

    // Pagination controls functionality
    prevButton.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            updateTable();
        }
    });

    nextButton.addEventListener('click', function() {
        const filteredItems = items.filter(item => 
            item.name.toLowerCase().includes(searchBox.value.toLowerCase())
        );
        const totalPages = Math.ceil(filteredItems.length / rowsPerPageCount);
        if (currentPage < totalPages) {
            currentPage++;
            updateTable();
        }
    });

    // Function to view an item
    window.viewItem = function(index) {
        const item = items[index];
        const content = `
            <p><strong>ID:</strong> ${item.id}</p>
            <p><strong>Name:</strong> ${item.name}</p>
            <p><strong>Category:</strong> ${item.category}</p>
            <p><strong>Quantity:</strong> ${item.quantity}</p>
            <p><strong>Price:</strong> ${item.price}</p>
        `;
        document.getElementById('viewItemContent').innerHTML = content;
        showModal('viewItemModal');
    }

    // Function to edit an item
    window.editItem = function(index) {
        const item = items[index];
        document.getElementById('editItemName').value = item.name;
        document.getElementById('editItemCategory').value = item.category;
        document.getElementById('editItemQuantity').value = item.quantity;
        document.getElementById('editItemPrice').value = item.price;

        // Handle form submission
        document.getElementById('editItemForm').onsubmit = function(event) {
            event.preventDefault();
            const newName = document.getElementById('editItemName').value;
            const newCategory = document.getElementById('editItemCategory').value;
            const newQuantity = document.getElementById('editItemQuantity').value;
            const newPrice = document.getElementById('editItemPrice').value;

            if (newName && newCategory && newQuantity && newPrice) {
                items[index] = {
                    id: item.id,
                    name: newName,
                    category: newCategory,
                    quantity: parseInt(newQuantity),
                    price: newPrice
                };
                updateTable();
                closeModal('editItemModal');
            }
        }

        showModal('editItemModal');
    }

    // Function to delete an item
    window.deleteItem = function(index) {
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
        confirmDeleteButton.onclick = function() {
            items.splice(index, 1);
            updateTable();
            closeModal('deleteItemModal');
        };
        showModal('deleteItemModal');
    }

    // Function to show modal
    function showModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
    }

    // Function to close modal
    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    // Initial table load
    updateTable();

    // Open "Add New Item" Modal
    newItemBtn.addEventListener('click', function() {
        document.getElementById('addItemModal').style.display = 'block';
    });

    // Close modal when user clicks outside the modal
    window.addEventListener('click', function(event) {
        const modal = document.querySelector('.modal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});