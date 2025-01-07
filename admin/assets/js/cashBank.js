document.addEventListener('DOMContentLoaded', function() {
    const searchBox = document.getElementById('searchBox');
    const newMeetingBtn = document.getElementById('newMeetingBtn');
    const rowsPerPage = document.getElementById('rowsPerPage');
    const meetingsTable = document.getElementById('meetingsTable').getElementsByTagName('tbody')[0];
  
    const newTransactionModal = document.getElementById('newTransactionModal');  // New Transaction Modal
    const viewTransactionModal = document.getElementById('viewTransactionModal'); // View Transaction Modal
    const closeNewTransactionModal = document.getElementsByClassName('close')[0]; // Close button inside new transaction modal
    const closeViewTransactionModal = document.getElementsByClassName('close')[1]; // Close button inside view transaction modal
    const newTransactionForm = document.getElementById('newTransactionForm'); // Form inside new transaction modal

    // Sample data for meetings
    const meetings = [
        {
            id: 1,
            transactionName: 'Deposit',
            transactionType: 'Deposit',
            transactionDate: '2022-10-10',
            amount: 1000,
            locationName: 'Colombo',
            managedBy: 'John Doe',
            approvedBy: 'Approver 1'
        }
        // Add more sample data as needed
    ];

    // Function to render table rows
    function renderTableRows(meetings) {
        meetingsTable.innerHTML = '';
        meetings.forEach(meeting => {
            let row = meetingsTable.insertRow();
            row.insertCell(0).innerText = meeting.id;
            row.insertCell(1).innerHTML = `<a href="#">${meeting.transactionName}</a>`;
            row.insertCell(2).innerText = meeting.transactionType;
            row.insertCell(3).innerText = meeting.transactionDate;
            row.insertCell(4).innerText = meeting.amount;
            row.insertCell(5).innerText = meeting.locationName;
            row.insertCell(6).innerText = meeting.managedBy;
            row.insertCell(7).innerText = meeting.approvedBy;
            row.insertCell(8).innerHTML = `
                <button class="editBtn">Edit</button>
                <button class="deleteBtn">Delete</button>
            `;
            // Add click event to view details modal
            row.addEventListener('click', function() {
                openViewTransactionModal(meeting);
            });
        });
    }

    // Function to open the View Transaction Modal with the selected row's details
    function openViewTransactionModal(meeting) {
        document.getElementById('transactionName').value = meeting.transactionName;
        document.getElementById('transactionType').value = meeting.transactionType;
        document.getElementById('transactionDate').value = meeting.transactionDate;
        document.getElementById('transactionAmount').value = meeting.amount;
        document.getElementById('transactionLocation').value = meeting.locationName;
        document.getElementById('transactionManagedBy').value = meeting.managedBy;
        document.getElementById('transactionApprovedBy').value = meeting.approvedBy;

        viewTransactionModal.style.display = 'block';
    }

    // Initial render
    renderTableRows(meetings);
  
    // Search functionality
    searchBox.addEventListener('input', function() {
        const query = searchBox.value.toLowerCase();
        const filteredMeetings = meetings.filter(meeting => 
            meeting.transactionName.toLowerCase().includes(query) ||
            meeting.transactionType.toLowerCase().includes(query) ||
            meeting.amount.toString().includes(query)
        );
        renderTableRows(filteredMeetings);
    });
  
    // Open modal on "New Transaction" button click
    newMeetingBtn.addEventListener('click', function() {
        newTransactionModal.style.display = 'block';
    });
  
    // Close New Transaction Modal when the user clicks on <span> (x)
    closeNewTransactionModal.onclick = function() {
        newTransactionModal.style.display = 'none';
    };
  
    // Close View Transaction Modal when the user clicks on <span> (x)
    closeViewTransactionModal.onclick = function() {
        viewTransactionModal.style.display = 'none';
    };

    // Close modal when the user clicks outside of the modal
    window.onclick = function(event) {
        if (event.target === newTransactionModal) {
            newTransactionModal.style.display = 'none';
        }
        if (event.target === viewTransactionModal) {
            viewTransactionModal.style.display = 'none';
        }
    };

    // Handle form submission for new transaction
    newTransactionForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const newTransaction = {
            id: meetings.length + 1,
            transactionName: document.getElementById('transactionName').value,
            transactionType: document.getElementById('transactionType').value,
            transactionDate: document.getElementById('transactionDate').value,
            amount: document.getElementById('amount').value,
            locationName: document.getElementById('locationName').value,
            managedBy: document.getElementById('managedBy').value,
            approvedBy: document.getElementById('approvedBy').value
        };

        meetings.push(newTransaction);
        renderTableRows(meetings);
        newTransactionModal.style.display = 'none';
        newTransactionForm.reset();
    });

    // Rows per page functionality
    rowsPerPage.addEventListener('change', function() {
        const rows = parseInt(rowsPerPage.value);
        const paginatedMeetings = meetings.slice(0, rows);
        renderTableRows(paginatedMeetings);
    });
});