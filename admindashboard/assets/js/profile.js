document.getElementById('uploadPicture').addEventListener('change', function(event) {
  const file = event.target.files[0];
  if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
          document.getElementById('profileImage').src = e.target.result;
      }
      reader.readAsDataURL(file);
  }
});

document.getElementById('saveChanges').addEventListener('click', function() {
  const username = document.getElementById('username').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;

  if (password !== confirmPassword) {
      alert("Passwords do not match!");
  } else {
      // Here, you would typically send the data to your server via an API
      alert("Changes saved successfully!");
      // Redirect to the main page
      window.location.href = "main.html"; // Replace with your main page URL
  }
});

document.getElementById('cancelChanges').addEventListener('click', function() {
  // Redirect to the main page without saving
  window.location.href = "index.html"; // Replace with your main page URL
});