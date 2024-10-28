document.addEventListener('DOMContentLoaded', function() {
  const searchBox = document.getElementById('searchBox');
  const newMeetingBtn = document.getElementById('newMeetingBtn');
  const rowsPerPage = document.getElementById('rowsPerPage');
  const meetingsTable = document.getElementById('meetingsTable').getElementsByTagName('tbody')[0];
  let meetings = [
      {
          id: 1,
          name: 'To discuss the new project',
          type: 'test',
          startDate: '08/17/2024',
          endDate: '08/18/2024',
          department: 'IT',
          location: 'Conference Room 1',
          organizedBy: 'Nipuna',
          reporter: 'Nipuna'      
        },
        {
            id: 2,
            name: 'To discuss the new project',
            type: 'test',
            startDate: '08/17/2024',
            endDate: '08/18/2024',
            department: 'IT',
            location: 'Conference Room 1',
            organizedBy: 'Nipuna',
            reporter: 'Nipuna'      
            },
      // Add more meeting objects as needed
  ];

  // Function to render table rows
  function renderTableRows(meetings) {
      meetingsTable.innerHTML = '';
      meetings.forEach(meeting => {
          let row = meetingsTable.insertRow();
          row.insertCell(0).innerText = meeting.id;
          row.insertCell(1).innerHTML = `<a href="#">${meeting.name}</a>`;
          row.insertCell(2).innerText = meeting.type;
          row.insertCell(3).innerText = meeting.startDate;
          row.insertCell(4).innerText = meeting.endDate;
          row.insertCell(5).innerText = meeting.department;
          row.insertCell(6).innerText = meeting.location;
          row.insertCell(7).innerText = meeting.organizedBy;
          row.insertCell(8).innerText = meeting.reporter;
      });
  }

  // Initial render
  renderTableRows(meetings);

  // Search functionality
  searchBox.addEventListener('input', function() {
      const query = searchBox.value.toLowerCase();
      const filteredMeetings = meetings.filter(meeting => 
          meeting.name.toLowerCase().includes(query) ||
          meeting.type.toLowerCase().includes(query) ||
          meeting.department.toLowerCase().includes(query)
      );
      renderTableRows(filteredMeetings);
  });

    // Redirect to "New Meetings" page when the button is clicked
    newMeetingBtn.addEventListener('click', function() {
      window.location.href = 'newMeeting.html';
  });

  // Rows per page functionality (for demonstration purposes, it's static)
  rowsPerPage.addEventListener('change', function() {
      const rows = parseInt(rowsPerPage.value);
      const paginatedMeetings = meetings.slice(0, rows);
      renderTableRows(paginatedMeetings);
  });
});