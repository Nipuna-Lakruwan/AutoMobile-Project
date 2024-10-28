document.addEventListener('DOMContentLoaded', function() {
  const searchBox = document.getElementById('searchBox');
  const newInvoiceBtn = document.getElementById('newInvoiceBtn');
  const rowsPerPageSelect = document.getElementById('rowsPerPage');
  const statusFilter = document.getElementById('statusFilter');
  const dateStart = document.getElementById('dateStart');
  const dateEnd = document.getElementById('dateEnd');
  const invoicesTable = document.getElementById('invoicesTable').getElementsByTagName('tbody')[0];
  const paginationSpan = document.querySelector('.pagination span');
  const prevButton = document.querySelector('.pagination-controls button:first-child');
  const nextButton = document.querySelector('.pagination-controls button:last-child');
  const exportBtn = document.getElementById('exportBtn');
  const pdfBtn = document.getElementById('pdfBtn');
  const totalAmountSpan = document.getElementById('totalAmount');

  let invoices = [
      {
          id: 'INV001',
          customerName: 'John Doe',
          date: '2024-08-17',
          amount: '500000',
          status: 'Paid'
      },
      {
          id: 'INV002',
          customerName: 'Jane Smith',
          date: '2024-08-18',
          amount: '300000',
          status: 'Unpaid'
      },
      {
          id: 'INV003',
          customerName: 'Alice',
          date: '2024-08-19',
          amount: '700000',
          status: 'Paid'
      },
      {
          id: 'INV004',
          customerName: 'Bob',
          date: '2024-08-20',
          amount: '200000',
          status: 'Unpaid'
      },
      // Add more invoices objects as needed
  ];
  
  let currentPage = 1;
  let rowsPerPageCount = parseInt(rowsPerPageSelect.value) || 10;
  let currentSortColumn = null;
  let currentSortOrder = 'asc'; // or 'desc'

  // Function to render table rows
  function renderTableRows(invoices) {
      invoicesTable.innerHTML = '';
      invoices.forEach((invoice, index) => {
          let row = invoicesTable.insertRow();
          row.insertCell(0).innerText = invoice.id;
          row.insertCell(1).innerText = invoice.customerName;
          row.insertCell(2).innerText = invoice.date;
          row.insertCell(3).innerText = `Rs.${invoice.amount}`;
          row.insertCell(4).innerText = invoice.status;
          row.insertCell(5).innerHTML = `
              <a href="#" onclick="viewInvoice(${index})">View</a> |
              <a href="#" onclick="editInvoice(${index})">Edit</a> |
              <a href="#" onclick="deleteInvoice(${index})">Delete</a>
          `;
          // Highlight unpaid invoices
          if (invoice.status.toLowerCase() === 'unpaid') {
              row.style.backgroundColor = 'darkred'; // Light red
          }
      });
  }

  // Function to handle pagination
  function paginateItems(invoices, page, rows) {
      const start = (page - 1) * rows;
      const end = start + rows;
      return invoices.slice(start, end);
  }

  // Function to update pagination controls
  function updatePaginationControls(filteredInvoices) {
      const totalEntries = filteredInvoices.length;
      const totalPages = Math.ceil(totalEntries / rowsPerPageCount);
      paginationSpan.innerText = `Showing ${(currentPage - 1) * rowsPerPageCount + 1} to ${Math.min(currentPage * rowsPerPageCount, totalEntries)} of ${totalEntries} entries`;

      prevButton.disabled = currentPage === 1;
      nextButton.disabled = currentPage === totalPages;
  }

  // Function to sort the table
  function sortTable(column) {
      currentSortOrder = currentSortColumn === column && currentSortOrder === 'asc' ? 'desc' : 'asc';
      currentSortColumn = column;

      invoices.sort((a, b) => {
          let aValue = a[column].toString().toLowerCase();
          let bValue = b[column].toString().toLowerCase();

          if (currentSortOrder === 'asc') {
              return aValue > bValue ? 1 : -1;
          } else {
              return aValue < bValue ? 1 : -1;
          }
      });

      updateTable();
  }

  // Function to filter invoices
  function filterInvoices() {
      let filteredInvoices = invoices.filter(invoice => 
          (invoice.customerName.toLowerCase().includes(searchBox.value.toLowerCase()) ||
          invoice.id.toLowerCase().includes(searchBox.value.toLowerCase())) &&
          (statusFilter.value === 'All' || invoice.status === statusFilter.value) &&
          (!dateStart.value || new Date(invoice.date) >= new Date(dateStart.value)) &&
          (!dateEnd.value || new Date(invoice.date) <= new Date(dateEnd.value))
      );

      return filteredInvoices;
  }

  // Function to calculate total amount
  function calculateTotalAmount(filteredInvoices) {
      const total = filteredInvoices.reduce((sum, invoice) => sum + parseFloat(invoice.amount), 0);
      totalAmountSpan.innerText = `Total Amount: Rs.${total.toLocaleString()}`;
  }

  // Function to export data to CSV
  function exportToCSV() {
      const filteredInvoices = filterInvoices();
      let csvContent = 'ID,Customer Name,Date,Amount,Status\n';
      
      filteredInvoices.forEach(invoice => {
          csvContent += `${invoice.id},${invoice.customerName},${invoice.date},Rs.${invoice.amount},${invoice.status}\n`;
      });

      const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'invoices.csv';
      a.click();
      URL.revokeObjectURL(url);
  }

  // Function to view invoices as PDF
  function viewAsPDF() {
      const { jsPDF } = window.jspdf;
      const filteredInvoices = filterInvoices();
      const doc = new jsPDF();

      doc.setFontSize(12);
      doc.text('Invoices Report', 14, 10);

      let y = 20;
      filteredInvoices.forEach(invoice => {
          doc.text(`ID: ${invoice.id}`, 14, y);
          doc.text(`Customer Name: ${invoice.customerName}`, 14, y + 10);
          doc.text(`Date: ${invoice.date}`, 14, y + 20);
          doc.text(`Amount: Rs.${invoice.amount}`, 14, y + 30);
          doc.text(`Status: ${invoice.status}`, 14, y + 40);
          y += 50;
          if (y > 250) {
              doc.addPage();
              y = 20;
          }
      });

      doc.save('invoices.pdf');
  }

  // Event listeners
  searchBox.addEventListener('input', updateTable);
  newInvoiceBtn.addEventListener('click', () => {
      // Code to open a form to add a new invoice
  });

  rowsPerPageSelect.addEventListener('change', function() {
      rowsPerPageCount = parseInt(this.value);
      updateTable();
  });

  statusFilter.addEventListener('change', updateTable);
  dateStart.addEventListener('change', updateTable);
  dateEnd.addEventListener('change', updateTable);

  prevButton.addEventListener('click', function() {
      if (currentPage > 1) {
          currentPage--;
          updateTable();
      }
  });

  nextButton.addEventListener('click', function() {
      const totalEntries = filterInvoices().length;
      const totalPages = Math.ceil(totalEntries / rowsPerPageCount);
      if (currentPage < totalPages) {
          currentPage++;
          updateTable();
      }
  });

  exportBtn.addEventListener('click', exportToCSV);
  pdfBtn.addEventListener('click', viewAsPDF);

  // Initial table render
  updateTable();
  
  function updateTable() {
      const filteredInvoices = filterInvoices();
      const paginatedInvoices = paginateItems(filteredInvoices, currentPage, rowsPerPageCount);
      renderTableRows(paginatedInvoices);
      updatePaginationControls(filteredInvoices);
      calculateTotalAmount(filteredInvoices);
  }
});