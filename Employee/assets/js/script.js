const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

/*const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});*/

// const searchBtn = document.querySelector('.content nav form .form-input button');
// const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
// const searchForm = document.querySelector('.content nav form');

// searchBtn.addEventListener('click', function (e) {
//     if (window.innerWidth < 576) {
//         e.preventDefault;
//         searchForm.classList.toggle('show');
//         if (searchForm.classList.contains('show')) {
//             searchBtnIcon.classList.replace('bx-search', 'bx-x');
//         } else {
//             searchBtnIcon.classList.replace('bx-x', 'bx-search');
//         }
//     }
// });

// Theme toggle
const toggler = document.getElementById('theme-toggle');
const logo = document.querySelector('.sidebar .logo img');

// Function to apply the theme based on localStorage
function applyTheme() {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        document.body.classList.add('dark');
        toggler.checked = true; // Set the toggle to checked
        // Change the image source
        //logo.src = '/AutoMobile Project/admin/assets/img/logo.png';
    } else {
        document.body.classList.remove('dark');
        // Change the image source
        //logo.src = '/AutoMobile Project/admin/assets/img/logo-dark.png';
        toggler.checked = false; // Set the toggle to unchecked
    }
}

// Apply the theme on page load
applyTheme();

// Update the theme and save preference to localStorage on toggle change
toggler.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        // Change the image source
        //logo.src = '/AutoMobile Project/admin/assets/img/logo.png';
        localStorage.setItem('theme', 'dark'); // Save preference
    } else {
        document.body.classList.remove('dark');
        // Change the image source
        //logo.src = '/AutoMobile Project/admin/assets/img/logo-dark.png';
        localStorage.setItem('theme', 'light'); // Save preference
    }
});


// Always apply the dark theme
//document.body.classList.add('dark');

let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");

let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("active");

window.addEventListener("click", function (e) {
  if (!btn.contains(e.target)) classList.remove("active");
});


function redirectTo(url) {
    window.location.href = url;
}