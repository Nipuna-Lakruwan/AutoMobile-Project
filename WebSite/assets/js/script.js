class Slider {
    constructor(slidesSelector, rbtnSelector, leftArrowSelector, rightArrowSelector, intervalTime) {
        this.slides = document.querySelectorAll(slidesSelector);
        this.rbtn = document.querySelectorAll(rbtnSelector);
        this.leftArrow = document.querySelector(leftArrowSelector);
        this.rightArrow = document.querySelector(rightArrowSelector);
        this.intervalTime = intervalTime;
        this.slideInt = null;
        this.init();
    }

    init() {
        if (this.slides.length > 0) {
            this.slideInt = setInterval(() => this.nextSlide(), this.intervalTime);
            this.addEventListeners();
        }
    }

    nextSlide() {
        const curr = document.querySelector('.curr');
        const active = document.querySelector('.active');

        if (!curr || !active) return;

        curr.classList.remove('curr');
        active.classList.remove('active');

        if (curr.nextElementSibling && curr.nextElementSibling.classList.contains('slide')) {
            curr.nextElementSibling.classList.add('curr');
            active.nextElementSibling.classList.add('active');
        } else {
            this.slides[0].classList.add('curr');
            this.rbtn[0].classList.add('active');
        }
    }

    prevSlide() {
        const curr = document.querySelector('.curr');
        const active = document.querySelector('.active');

        if (!curr || !active) return;

        curr.classList.remove('curr');
        active.classList.remove('active');

        if (curr.previousElementSibling && curr.previousElementSibling.classList.contains('slide')) {
            curr.previousElementSibling.classList.add('curr');
            active.previousElementSibling.classList.add('active');
        } else {
            this.slides[this.slides.length - 1].classList.add('curr');
            this.rbtn[this.rbtn.length - 1].classList.add('active');
        }
    }

    addEventListeners() {
        if (this.leftArrow) {
            this.leftArrow.addEventListener('click', () => {
                clearInterval(this.slideInt);
                this.prevSlide();
                this.slideInt = setInterval(() => this.nextSlide(), this.intervalTime);
            });
        }

        if (this.rightArrow) {
            this.rightArrow.addEventListener('click', () => {
                clearInterval(this.slideInt);
                this.nextSlide();
                this.slideInt = setInterval(() => this.nextSlide(), this.intervalTime);
            });
        }

        if (this.rbtn.length > 0) {
            this.rbtn.forEach((button, index) => {
                button.addEventListener('click', () => {
                    clearInterval(this.slideInt);

                    const curr = document.querySelector('.curr');
                    const active = document.querySelector('.active');

                    if (curr) curr.classList.remove('curr');
                    if (active) active.classList.remove('active');

                    this.slides[index].classList.add('curr');
                    button.classList.add('active');

                    this.slideInt = setInterval(() => this.nextSlide(), this.intervalTime);
                });
            });
        }
    }
}

class AutoIncrementNumbers {
    constructor(selector, interval) {
        this.valueDisplays = document.querySelectorAll(selector);
        this.interval = interval;
        this.init();
    }

    init() {
        if (this.valueDisplays.length > 0) {
            this.valueDisplays.forEach((valueDisplay) => {
                this.incrementValue(valueDisplay);
            });
        }
    }

    incrementValue(valueDisplay) {
        let startValue = 0;
        let endValue = parseInt(valueDisplay.getAttribute('data-val')) || 0;
        let duration = Math.floor(this.interval / endValue);

        let interval = setInterval(() => {
            startValue += 1;
            valueDisplay.textContent = startValue + "+"; // Add "+" if necessary
            if (startValue === endValue) {
                clearInterval(interval);
            }
        }, duration);
    }
}

// Initialize the Slider class
document.addEventListener('DOMContentLoaded', () => {
    new Slider('.slide', '.rad-btn', '.left', '.right', 6000);
    new AutoIncrementNumbers('.num', 2000);
});