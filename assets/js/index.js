document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.querySelector('.wrapper');
    const registerLink = document.querySelector('.register-link');
    const loginLink = document.querySelector('.login-link');
  
    if (registerLink && loginLink) {
      registerLink.addEventListener('click', function(e) {
        e.preventDefault();  // Prevent default link behavior
        wrapper.classList.add('active');
        console.log("Register link clicked");
      });
  
      loginLink.addEventListener('click', function(e) {
        e.preventDefault();  // Prevent default link behavior
        wrapper.classList.remove('active');
        console.log("Login link clicked");
      });
    } else {
      console.error('Register or Login link not found');
    }
  });

$(document).ready(function(){
    $('.navbar-toggler').click(function(){
        $(this).toggleClass('collapsed');
    });
});

document.getElementById('loginBtn').addEventListener('click', function() {
  // Redirect to another page
  window.location.href = '/AutoMobile Project/login.php';
});