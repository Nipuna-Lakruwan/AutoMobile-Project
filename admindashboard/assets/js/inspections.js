document.addEventListener('DOMContentLoaded', function() {
  const searchBox = document.getElementById('searchBox');
  const newInspectionsBtn = document.getElementById('newInspectionsBtn');
  const rowsPerPage = document.getElementById('rowsPerPage');
  const inspectionsTable = document.getElementById('inspectionsTable').getElementsByTagName('tbody')[0];
  const recordInfo = document.getElementById('recordInfo');

  let inspections = [
      {
          id: 1,
          vehicleId: '1',
          date: '08/17/2024',
          time: '08:00',
          type: 'test',
          status: 'Pending'
      },
      {
          id: 2,
          vehicleId: '2',
          date: '08/17/2024',
          time: '08:00',
          type: 'test',
          status: 'Pending'
      },
      // Add more inspections objects as needed
  ];

  function updateRecordInfo(start, end, total) {
      recordInfo.innerText = `Showing ${start} to ${end} of ${total} total records`;
  }

  // Function to render table rows
  function renderTableRows(inspections) {
      inspectionsTable.innerHTML = '';
      let rows = parseInt(rowsPerPage.value) || inspections.length;
      let paginatedInspections = inspections.slice(0, rows);

      paginatedInspections.forEach((inspection, index) => {
          let row = inspectionsTable.insertRow();
          row.insertCell(0).innerText = inspection.id;
          row.insertCell(1).innerHTML = `<a href="#">${inspection.vehicleId}</a>`;
          row.insertCell(2).innerText = inspection.date;
          row.insertCell(3).innerText = inspection.time;
          row.insertCell(4).innerText = inspection.type;
          row.insertCell(5).innerText = inspection.status;

          let actionsCell = row.insertCell(6);
          actionsCell.innerHTML = `
              <button class="view-btn" data-id="${inspection.id}">View</button>
              <button class="edit-btn" data-id="${inspection.id}">Edit</button>
              <button class="delete-btn" data-id="${inspection.id}">Delete</button>
          `;
      });

      // Update the record info display
      let totalRecords = inspections.length;
      let showingTo = Math.min(rows, totalRecords);
      updateRecordInfo(1, showingTo, totalRecords);
      
      // Add event listeners for buttons
      document.querySelectorAll('.view-btn').forEach(btn => {
          btn.addEventListener('click', viewInspection);
      });
      document.querySelectorAll('.edit-btn').forEach(btn => {
          btn.addEventListener('click', editInspection);
      });
      document.querySelectorAll('.delete-btn').forEach(btn => {
          btn.addEventListener('click', deleteInspection);
      });
  }

  function viewInspection(event) {
      const id = event.target.getAttribute('data-id');
      alert('View inspection with ID: ' + id);
  }

  function editInspection(event) {
      const id = event.target.getAttribute('data-id');
      alert('Edit inspection with ID: ' + id);
  }

  function deleteInspection(event) {
      const id = event.target.getAttribute('data-id');
      inspections = inspections.filter(inspection => inspection.id != id);
      renderTableRows(inspections);
  }

  // Initial render
  renderTableRows(inspections);

  // Search functionality
  searchBox.addEventListener('input', function() {
      const query = searchBox.value.toLowerCase();
      const filteredInspections = inspections.filter(inspection => 
          inspection.vehicleId.toLowerCase().includes(query) ||
          inspection.type.toLowerCase().includes(query) ||
          inspection.status.toLowerCase().includes(query)
      );
      renderTableRows(filteredInspections);
  });

  // Redirect to "New Inspections" page when the button is clicked
  newInspectionsBtn.addEventListener('click', function() {
      window.location.href = 'newinspections.html';
  });

  // Rows per page functionality
  rowsPerPage.addEventListener('change', function() {
      renderTableRows(inspections);
  });
});