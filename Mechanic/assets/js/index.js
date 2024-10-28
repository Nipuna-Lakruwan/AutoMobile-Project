function togglenav() {
    console.log("toggleNav function called");
    let dropdown = document.getElementById("dropdown");
    if (dropdown) {
        dropdown.classList.toggle('active');
    } else {
        console.error("Element with ID 'dropdown' not found.");
    }
};

document.addEventListener("DOMContentLoaded", function() {
    let subMenu = document.getElementById("subMenu");
    let subMenuButton = document.getElementById("subMenuBtn");

    // Toggle the submenu when the button is clicked
    subMenuButton.onclick = function(event) {
        subMenu.classList.toggle('active');

        // Set display based on the active class
        if (subMenu.classList.contains('active')) {
            subMenu.style.display = 'block'; // Show submenu
        } else {
            subMenu.style.display = 'none'; // Hide submenu
        }
        
        event.stopPropagation();  // Prevent the event from triggering the window click listener
    }

    // Close the submenu if clicking outside of it
    window.onclick = function(event) {
        if (!subMenu.contains(event.target) && event.target !== subMenuButton) {
            closeMenu(subMenu);
        }
    }

    // Function to close the submenu
    function closeMenu(menu) {
        menu.classList.remove('active');
        menu.style.display = 'none'; // Hide submenu when closing
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector("#toggle-btn");
    const sidebar = document.querySelector("#sidebar");

    toggleButton.addEventListener("click", () => {
        const isCollapsed = sidebar.classList.toggle("collapsed");
        
        // Update aria-expanded for accessibility
        toggleButton.setAttribute("aria-expanded", !isCollapsed);
        
        console.log("Sidebar toggled, collapsed state:", isCollapsed);
    });
});