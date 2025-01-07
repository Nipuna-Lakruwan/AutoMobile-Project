// Variables for modals and buttons
const addBookingModal = document.getElementById('addBookingModal');
const closeAddBookingModalBtn = document.getElementById('closeAddBookingModal');
const newBookingsBtn = document.getElementById('newBookingsBtn');

const viewBookingModal = document.getElementById('viewBookingModal1');
const closeBookingModal1Btn = document.getElementById('closeBookingModal1');

const nextStepBtn = document.getElementById('nextStepBtn');
const step1 = document.getElementById('step1');
const step2 = document.getElementById('step2');
const submitAddBookingForm = document.getElementById('submitAddBookingForm');

// Table for bookings
const bookingsTableBody = document.querySelector('#bookingsTable tbody');

// Add event listener to open Add Booking Modal
newBookingsBtn.addEventListener('click', () => {
  addBookingModal.style.display = 'block';
  step1.style.display = 'block';
  step2.style.display = 'none';
});

// Close Add Booking Modal
closeAddBookingModalBtn.addEventListener('click', () => {
  addBookingModal.style.display = 'none';
});

// Navigate to next step in Add Booking Modal
nextStepBtn.addEventListener('click', () => {
  step1.style.display = 'none';
  step2.style.display = 'block';
});

// Close View Booking Modal
closeBookingModal1Btn.addEventListener('click', () => {
  viewBookingModal.style.display = 'none';
});

// Add new booking (this is a mock-up, you can replace it with backend integration)
submitAddBookingForm.addEventListener('click', (e) => {
  e.preventDefault();

  // Get form data
  const vehicleRegistration = document.getElementById('vehicleRegistration').value;
  const vehicleCustomerName = document.getElementById('vehicleCustomerName').value;
  const bookingDate = document.getElementById('bookingDate').value;
  const note = document.getElementById('note').value;

  // Add a new row to the table
  const newRow = document.createElement('tr');
  newRow.innerHTML = `
    <td>${Math.floor(Math.random() * 1000)}</td>
    <td>New Booking</td>
    <td>${vehicleCustomerName}</td>
    <td>${vehicleRegistration}</td>
    <td>${bookingDate}</td>
    <td>${note}</td>
    <td>
      <button class="view-btn">View</button>
    </td>
  `;

  bookingsTableBody.appendChild(newRow);

  // Close modal
  addBookingModal.style.display = 'none';
});

// Close modal when clicking outside of it
window.addEventListener('click', (event) => {
  if (event.target === addBookingModal) {
    addBookingModal.style.display = 'none';
  }
  if (event.target === viewBookingModal) {
    viewBookingModal.style.display = 'none';
  }
});

// Search Functionality
const searchBox = document.getElementById('searchBox');
searchBox.addEventListener('input', () => {
  const searchTerm = searchBox.value.toLowerCase();
  const rows = bookingsTableBody.querySelectorAll('tr');

  rows.forEach((row) => {
    const cells = Array.from(row.querySelectorAll('td'));
    const matches = cells.some((cell) =>
      cell.textContent.toLowerCase().includes(searchTerm)
    );
    row.style.display = matches ? '' : 'none';
  });
});