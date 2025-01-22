document.addEventListener('DOMContentLoaded', function () {
  const passwordField = document.getElementById('password');
  const togglePasswordButton = document.querySelector('.toggle-password');
  
  togglePasswordButton.addEventListener('click', function (event) {
      // Prevent the button from submitting the form
      event.preventDefault();
      
      // Toggle password visibility
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);

      // Toggle the icon
      this.innerHTML = type === 'password' 
          ? '<i class="fas fa-eye"></i>'
          : '<i class="fas fa-eye-slash"></i>';
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const fileInput = document.getElementById('fileInput');
  const wrapper = document.getElementById('wrapper');

  fileInput.addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              wrapper.style.backgroundImage = `url(${e.target.result})`;
          };
          reader.readAsDataURL(file);
      }
  });
});

// Functionality for the profile picture section
const profilePicture = document.querySelector('.profile-picture');
profilePicture.addEventListener('click', function () {
  const modal = document.getElementById('profile-modal');
  modal.style.display = 'flex';
});

// Close modal button
document.getElementById('close-modal').addEventListener('click', function () {
  const modal = document.getElementById('profile-modal');
  modal.style.display = 'none';
});

// "Take a Photo" button functionality
document.getElementById('take-photo').addEventListener('click', function () {
  const modal = document.getElementById('profile-modal');
  modal.style.display = 'none';
  // Open system camera
  alert('Opening system camera... (you can integrate this functionality)');
});

// "Select a Photo" button functionality
document.getElementById('select-photo').addEventListener('click', function () {
  const modal = document.getElementById('profile-modal');
  modal.style.display = 'none';
  // Open file selector dialog
  fileInput.click();
});

// Cropper.js functionality
let cropper;
fileInput.addEventListener('change', function(event) {
  const file = event.target.files[0];
  if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
          const image = document.getElementById('image-to-crop');
          image.src = e.target.result;
          const cropModal = document.getElementById('crop-modal');
          cropModal.style.display = 'flex';
          cropper = new Cropper(image, {
              aspectRatio: 1,
              viewMode: 1,
          });
      };
      reader.readAsDataURL(file);
  }
});

document.getElementById('crop-cancel').addEventListener('click', function () {
  const cropModal = document.getElementById('crop-modal');
  cropModal.style.display = 'none';
  cropper.destroy();
  cropper = null;
});

document.getElementById('crop-save').addEventListener('click', function () {
  const canvas = cropper.getCroppedCanvas();
  canvas.toBlob(function(blob) {
      const formData = new FormData();
      formData.append('profile_pic', blob, 'profile.jpg');

      fetch('/AutoMobile Project/Employee/functions/update_profile.php', {
          method: 'POST',
          body: formData,
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              alert('Profile picture updated successfully!');
              document.querySelector('.profile-picture img').src = data.profilePicUrl;
              const cropModal = document.getElementById('crop-modal');
              cropModal.style.display = 'none';
              cropper.destroy();
              cropper = null;
          } else {
              alert('Failed to update profile picture.');
          }
      });
  });
});