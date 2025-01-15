// admin-profile.js

// Function to check if passwords match
function checkPasswordMatch() {
  const password = document.getElementById('adminPassword').value;
  const confirmPassword = document.getElementById('adminConfirmPassword').value;
  const feedbackMessage = document.getElementById('passwordFeedback');

  if (password !== confirmPassword) {
      feedbackMessage.textContent = "Passwords do not match!";
      feedbackMessage.style.color = "red";
  } else {
      feedbackMessage.textContent = "Passwords match!";
      feedbackMessage.style.color = "green";
  }
}

// Function to validate form before submission
function validateForm(event) {
  const name = document.getElementById('adminName').value;
  const email = document.getElementById('adminEmail').value;
  const password = document.getElementById('adminPassword').value;
  const confirmPassword = document.getElementById('adminConfirmPassword').value;
  
  if (!name || !email) {
      alert("Please fill out all required fields (Name and Email).");
      event.preventDefault(); // Prevent form submission
      return false;
  }

  // Check password match
  if (password !== confirmPassword) {
      alert("Passwords do not match!");
      event.preventDefault();
      return false;
  }

  // Optional: You can add more validations (e.g., email format, password strength) here.

  return true;
}

// Event listener to validate form before submission
document.getElementById('updateProfileForm').addEventListener('submit', validateForm);

// Real-time password matching feedback
document.getElementById('adminPassword').addEventListener('input', checkPasswordMatch);
document.getElementById('adminConfirmPassword').addEventListener('input', checkPasswordMatch);

// Toggle Password Visibility
function togglePassword(fieldId) {
  const passwordField = document.getElementById(fieldId);
  const icon = passwordField.nextElementSibling;

  if (passwordField.type === 'password') {
      passwordField.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
  } else {
      passwordField.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
  }
}

// Preview Profile Picture
function previewImage(event) {
  const reader = new FileReader();
  reader.onload = function () {
      const preview = document.getElementById('profilePreview');
      preview.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}