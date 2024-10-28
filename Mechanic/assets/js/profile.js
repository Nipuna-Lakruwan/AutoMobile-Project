// Functionality to toggle password visibility
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
                wrapper.style.backgroundSize = 'cover'; // Ensure the image covers the entire wrapper
            };
            reader.readAsDataURL(file);
        }
    });
});

/*
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
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.click();

    // Handle file selection
    fileInput.addEventListener('change', function () {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageToCrop = document.getElementById('image-to-crop');
                imageToCrop.src = e.target.result; // Set the image source

                // Show the crop modal
                const cropModal = document.getElementById('crop-modal');
                cropModal.style.display = 'flex';

                // Initialize Cropper.js
                const cropper = new Cropper(imageToCrop, {
                    aspectRatio: 1, // Adjust as needed (1:1 for square crop)
                    viewMode: 1,
                });

                // Save the cropped image
                document.getElementById('crop-save').addEventListener('click', function () {
                    // Get cropped canvas
                    const croppedCanvas = cropper.getCroppedCanvas({
                        width: 200,
                        height: 200,
                    });

                    // Convert the canvas to a Blob
                    croppedCanvas.toBlob(function (blob) {
                        if (!blob) {
                            console.error("Blob creation failed");
                            return;
                        }
                        console.log("Blob created:", blob);

                        const formData = new FormData();
                        formData.append('croppedImage', blob, 'profile.jpg'); // Adding the file name is important

                        // Debugging: Check if formData has the file
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
    }
            
                        // Send the cropped image to the server via AJAX
                        fetch('/AutoMobile Project/User/functions/update_profile.php', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Profile picture updated successfully!');
                                document.querySelector('.profile-picture img').src = data.profilePicUrl;
                            } else {
                                alert('Failed to upload the profile picture.');
                            }
                        })
                        .catch(error => console.error('Error uploading image:', error));

                            // Close the crop modal
                            document.getElementById('crop-modal').style.display = 'none';
                            cropper.destroy(); // Destroy the cropper instance

                    });                    
                });

                // Cancel cropping
                document.getElementById('crop-cancel').addEventListener('click', function () {
                    cropModal.style.display = 'none'; // Close modal
                    cropper.destroy(); // Destroy the cropper instance
                });
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        }
    });
});
*/