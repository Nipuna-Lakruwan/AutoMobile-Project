document.getElementById('addAttendee').addEventListener('click', function() {
  const table = document.getElementById('attendeesTable').getElementsByTagName('tbody')[0];
  const newRow = table.insertRow();

  const attendeeCell = newRow.insertCell(0);
  const attendeeInput = document.createElement('input');
  attendeeInput.type = 'text';
  attendeeInput.placeholder = 'Enter Attendee Name';
  attendeeCell.appendChild(attendeeInput);

  const typeCell = newRow.insertCell(1);
  const typeSelect = document.createElement('select');
  const option1 = document.createElement('option');
  option1.value = 'Participant';
  option1.text = 'Participant';
  const option2 = document.createElement('option');
  option2.value = 'Observer';
  option2.text = 'Observer';
  typeSelect.add(option1);
  typeSelect.add(option2);
  typeCell.appendChild(typeSelect);

  const statusCell = newRow.insertCell(2);
  const statusSelect = document.createElement('select');
  const statusOption1 = document.createElement('option');
  statusOption1.value = 'Present';
  statusOption1.text = 'Present';
  const statusOption2 = document.createElement('option');
  statusOption2.value = 'Absent';
  statusOption2.text = 'Absent';
  statusSelect.add(statusOption1);
  statusSelect.add(statusOption2);
  statusCell.appendChild(statusSelect);
});

document.getElementById('cancelBtn').addEventListener('click', function() {
  if (confirm('Are you sure you want to cancel? Any unsaved changes will be lost.')) {
      window.location.href = 'meeting.html'; // Replace 'meeting.html' with the actual URL
  }
});

document.getElementById('meetingForm').addEventListener('submit', function(event) {
  event.preventDefault();
  alert('Meeting saved successfully!');
  window.location.href = 'meeting.html'; // Replace 'meeting.html' with the actual URL
});