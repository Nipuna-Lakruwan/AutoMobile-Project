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

  // Redirect to "New Item" page when the button is clicked
  newItemBtn.addEventListener('click', function() {
      window.location.href = 'newItem.html'; // Adjust the URL as needed
  });

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

  // Function to view an item (you can customize the display as needed)
  window.viewItem = function(index) {
      const item = items[index];
      alert(`Viewing Item:\n\nID: ${item.id}\nName: ${item.name}\nCategory: ${item.category}\nQuantity: ${item.quantity}\nPrice: ${item.price}`);
  }

  // Function to edit an item
  window.editItem = function(index) {
      const item = items[index];
      const newName = prompt('Enter new name:', item.name);
      const newCategory = prompt('Enter new category:', item.category);
      const newQuantity = prompt('Enter new quantity:', item.quantity);
      const newPrice = prompt('Enter new price:', item.price);

      if (newName && newCategory && newQuantity && newPrice) {
          items[index] = {
              id: item.id,
              name: newName,
              category: newCategory,
              quantity: parseInt(newQuantity),
              price: newPrice
          };
          updateTable();
      }
  }

  // Function to delete an item
  window.deleteItem = function(index) {
      if (confirm('Are you sure you want to delete this item?')) {
          items.splice(index, 1);
          updateTable();
      }
  }

  // Initial table load
  updateTable();
});