document.addEventListener("DOMContentLoaded", function() {
    const accordionHeaders = document.querySelectorAll(".accordion-header");

    accordionHeaders.forEach(header => {
        header.addEventListener("click", () => {
            const content = header.nextElementSibling;

            // Toggle visibility
            if (content) {
                content.style.display = content.style.display === "block" ? "none" : "block";
            }
        });
    });
});