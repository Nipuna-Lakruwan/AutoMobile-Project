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

const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

searchBtn.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault;
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchBtnIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchBtnIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

// Theme toggle
const toggler = document.getElementById('theme-toggle');

// Function to apply the theme based on localStorage
function applyTheme() {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        document.body.classList.add('dark');
        toggler.checked = true; // Set the toggle to checked
    } else {
        document.body.classList.remove('dark');
        toggler.checked = false; // Set the toggle to unchecked
    }
}

// Apply the theme on page load
applyTheme();

// Update the theme and save preference to localStorage on toggle change
toggler.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        localStorage.setItem('theme', 'dark'); // Save preference
    } else {
        document.body.classList.remove('dark');
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

// Function to download data as CSV
function downloadCSV() {
    const data = gatherDashboardData();
    const csvContent = convertToCSV(data);
    
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    if (link.download !== undefined) { // Ensure the download functionality is supported
      const url = URL.createObjectURL(blob);
      link.setAttribute('href', url);
      link.setAttribute('download', 'dashboard_data.csv');
      link.style.visibility = 'hidden';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  }
  
  // Function to gather all the data from the dashboard pages
  function gatherDashboardData() {
    const data = [];
    
    // Example: Gather table rows
    const table = document.querySelector('#dashboardTable');
    const rows = table.querySelectorAll('tr');
    
    rows.forEach((row) => {
      const rowData = [];
      const cols = row.querySelectorAll('td, th');
      cols.forEach((col) => {
        rowData.push(col.innerText.trim());
      });
      data.push(rowData);
    });
  
    return data;
  }
  
  // Function to convert data array to CSV format
  function convertToCSV(data) {
    return data.map(row => row.join(',')).join('\n');
  }
  
  // Function to download data as PDF
  function downloadPDF() {
    const doc = new jsPDF();
    const data = gatherDashboardData();
    
    let y = 10; // Starting y position for text
    data.forEach(row => {
      doc.text(row.join(' | '), 10, y);
      y += 10;
    });
  
    doc.save('dashboard_data.pdf');
  }
  
  // Event Listeners for CSV and PDF download buttons
  document.getElementById('downloadCSV').addEventListener('click', function (e) {
    e.preventDefault();
    downloadCSV();
  });
  
  document.getElementById('downloadPDF').addEventListener('click', function (e) {
    e.preventDefault();
    downloadPDF();
  });