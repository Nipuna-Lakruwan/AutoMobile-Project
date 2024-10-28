document.addEventListener('DOMContentLoaded', function() {
    const searchBox = document.getElementById('searchBox');
    const newBookingsBtn = document.getElementById('newBookingsBtn');
    const rowsPerPage = document.getElementById('rowsPerPage');
    const bookingsTable = document.getElementById('bookingsTable').getElementsByTagName('tbody')[0];
    let bookings = [
        {
            id: 1,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 2,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 3,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 4,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 5,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 6,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 7,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 8,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 9,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        {
            id: 10,
            title: 'Oil Change',
            name: 'Nipuna',
            vehicleRegisterNumber: 'WP CA-1234',
            bookingDate: '08/17/2024',
            note: 'Change engine oil and oil filter',
        },
        // Add more bookings objects as needed
    ];
  
    // Function to render table rows
    function renderTableRows(bookings) {
        bookingsTable.innerHTML = '';
        bookings.forEach(bookings => {
            let row = bookingsTable.insertRow();
            row.insertCell(0).innerText = bookings.id;
            row.insertCell(1).innerHTML = `<a href="#">${bookings.title}</a>`;
            row.insertCell(2).innerText = bookings.name;
            row.insertCell(3).innerText = bookings.vehicleRegisterNumber;
            row.insertCell(4).innerText = bookings.bookingDate;
            row.insertCell(5).innerText = bookings.note;
        });
    }
  
    // Initial render
    renderTableRows(bookings);
  
    // Search functionality
    searchBox.addEventListener('input', function() {
        const query = searchBox.value.toLowerCase();
        const filteredBookings = bookings.filter(bookings => 
            bookings.name.toLowerCase().includes(query) ||
            bookings.type.toLowerCase().includes(query) ||
            bookings.department.toLowerCase().includes(query)
        );
        renderTableRows(filteredBookings);
    });
  
      // Redirect to "New bookings" page when the button is clicked
      newBookingsBtn.addEventListener('click', function() {
        window.location.href = 'newBookings.html';
    });
  
    // Rows per page functionality (for demonstration purposes, it's static)
    rowsPerPage.addEventListener('change', function() {
        const rows = parseInt(rowsPerPage.value);
        const paginatedBookings = bookings.slice(0, rows);
        renderTableRows(paginatedBookings);
    });
  });