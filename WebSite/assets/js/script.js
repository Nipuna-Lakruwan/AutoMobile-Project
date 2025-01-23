// Variables
var slides = document.querySelectorAll('.slide');
var rbtn = document.querySelectorAll('.rad-btn');
var leftArrow = document.querySelector('.left');
var rightArrow = document.querySelector('.right');
var slideInt; // Interval ID
var intTime = 6000; // Interval duration

// Function to change to the next slide
function nextSlide() {
    var curr = document.querySelector('.curr');
    var active = document.querySelector('.active');

    if (!curr || !active) return; // Ensure elements exist

    // Unset current slide and active button
    curr.classList.remove('curr');
    active.classList.remove('active');

    // Set the next slide and button
    if (curr.nextElementSibling && curr.nextElementSibling.classList.contains('slide')) {
        curr.nextElementSibling.classList.add('curr');
        active.nextElementSibling.classList.add('active');
    } else {
        slides[0].classList.add('curr');
        rbtn[0].classList.add('active');
    }
}

// Function to change to the previous slide
function prevSlide() {
    var curr = document.querySelector('.curr');
    var active = document.querySelector('.active');

    if (!curr || !active) return; // Ensure elements exist

    // Unset current slide and active button
    curr.classList.remove('curr');
    active.classList.remove('active');

    // Set the previous slide and button
    if (curr.previousElementSibling && curr.previousElementSibling.classList.contains('slide')) {
        curr.previousElementSibling.classList.add('curr');
        active.previousElementSibling.classList.add('active');
    } else {
        slides[slides.length - 1].classList.add('curr');
        rbtn[rbtn.length - 1].classList.add('active');
    }
}

// Add event listeners for arrows
if (leftArrow) {
    leftArrow.addEventListener('click', function () {
        clearInterval(slideInt); // Stop automatic sliding
        prevSlide(); // Show previous slide
        slideInt = setInterval(nextSlide, intTime); // Restart automatic sliding
    });
}

if (rightArrow) {
    rightArrow.addEventListener('click', function () {
        clearInterval(slideInt); // Stop automatic sliding
        nextSlide(); // Show next slide
        slideInt = setInterval(nextSlide, intTime); // Restart automatic sliding
    });
}

// Add event listeners for radio buttons
if (rbtn.length > 0) {
    rbtn.forEach((button, index) => {
        button.addEventListener('click', function () {
            clearInterval(slideInt); // Stop automatic sliding

            // Unset current slide and active button
            let curr = document.querySelector('.curr');
            let active = document.querySelector('.active');

            if (curr) curr.classList.remove('curr');
            if (active) active.classList.remove('active');

            // Set the clicked slide and button as active
            slides[index].classList.add('curr');
            button.classList.add('active');

            slideInt = setInterval(nextSlide, intTime); // Restart automatic sliding
        });
    });
}

// Automatic Slide Change
if (slides.length > 0) {
    slideInt = setInterval(nextSlide, intTime);
}

// Auto Increment Numbers
let valueDisplay = document.querySelectorAll('.num');
let Interval = 2000;

if (valueDisplay.length > 0) {
    valueDisplay.forEach((valueDisplay) => {
        let startValue = 0;
        let endValue = parseInt(valueDisplay.getAttribute('data-val')) || 0; // Handle invalid data-val
        let duration = Math.floor(Interval / endValue);

        let interval = setInterval(function () {
            startValue += 1;
            valueDisplay.textContent = startValue + "+"; // Add "+" if necessary
            if (startValue == endValue) {
                clearInterval(interval); // Use 'interval' instead of 'counter'
            }
        }, duration);
    });
}




