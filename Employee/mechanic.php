<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/mechanic.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

<style>
/* Calendar Styles */
.calendar {
    background: #fff;
    padding: 20px;
    border: 2px solid #000;
    border-radius: 8px;
    width: 90%;
}

.calendar .month {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background: #fff;
    border-radius: 5px;
}

.calendar .weekdays, .calendar .days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    padding: 10px;
}

.calendar .weekdays div, .calendar .days div {
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    position: relative; /* Ensure relative positioning for the dot */
}

.calendar .days .today {
    background: #8c0e0e;
    color: #fff;
}

.calendar .days .active {
    border: 2px solid #8c0e0e;
}

.goto-today {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.goto-today .goto {
    display: flex;
    align-items: center;
}

.goto-today .goto input {
    padding: 5px;
    border: 1px solid #8c0e0e;
    border-radius: 5px;
    margin-right: 5px;
}

.goto-today .goto button, .goto-today .today-btn {
    padding: 5px 10px;
    background: #8c0e0e;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.appointment-dot {
    position: absolute;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    width: 6px;
    height: 6px;
    background-color: #8c0e0e;
    border-radius: 50%;
}
</style>

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('appointments.php')">
            <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
            Back
        </h2>
    </div>
    <div class="item home">
        <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
    </div>
    <div class="item name">
        <h1>Mechanics</h1>
        <hr>
    </div>
</div>

<div class="maincontainer">
    <div class="griditem-1">
        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">October 2024</div>
                <i class="fas fa-angle-right next"></i>
            </div>
            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="days"></div>
            <div class="goto-today">
                <div class="goto">
                    <input type="text" placeholder="mm/yyyy" class="date-input" />
                    <button class="goto-btn">Go</button>
                </div>
                <button class="today-btn">Today</button>
            </div>
        </div>
        <!-- Add elements to display the active day and date -->
        <div class="event-day" style="font-size: 1.5em; font-weight: bold; margin-top: 20px;"></div>
        <div class="event-date" style="font-size: 1.2em; color: #8c0e0e; margin-bottom: 20px;"></div>
    </div>

    <div class="griditem-2">
        <div class="search-bar">
            <div class="search-wrapper">
                <input type="text" id="mechanicSearch" placeholder="Search...">
                <button type="submit" onclick="searchMechanic()"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
            </div>
        </div>
    </div>

    <div class="item0 griditem-3">
        <div class="accordion" id="accordionMechanics">
            <!-- Mechanic appointments will be populated here -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    $(document).ready(function() {
        initCalendar();

        // Event listener for clicking on a day to fetch appointments
        $(document).on("click", ".day", function() {
            const selectedDate = $(this).data("date");
            fetchAppointments(selectedDate);
        });

        // Event listener for search input to fetch appointments based on search query
        $("#mechanicSearch").on("input", function() {
            searchMechanic();
        });
    });

    // Function to search for mechanics based on input
    function searchMechanic() {
        const searchQuery = $("#mechanicSearch").val();
        fetchAppointments(null, searchQuery);
    }

    // Function to fetch appointments from the server
    function fetchAppointments(date, searchQuery = '') {
        $.post("/AutoMobile Project/Employee/fetch_appointments.php", {
            date,
            searchQuery
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                let accordionContent = "";
                data.data.forEach((appointment) => {
                    accordionContent += `
                        <div class="accordion-item">
                            <button class="accordion-header">${appointment.fname} ${appointment.lname} <span><i class="fa-solid fa-angle-down"></i></span></button>
                            <div class="accordion-content">
                                <table>
                                    <tr>
                                        <td>${appointment.app_id}</td>
                                        <td>${appointment.license_no}</td>
                                        <td>${appointment.model}</td>
                                        <td>${appointment.app_time}</td>
                                        <td>${appointment.activity_type}</td>
                                        <td>${appointment.status}</td>
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    `;
                });
                $("#accordionMechanics").html(accordionContent);
                $(".accordion-header").on("click", function() {
                    $(this).next(".accordion-content").toggle();
                });

                // Mark days with appointments
                const appointmentDates = data.data.map(app => app.app_date);
                markAppointmentDays(appointmentDates);
            } else {
                $("#accordionMechanics").html("<p>No appointments found</p>");
            }
        });
    }

    const calendar = document.querySelector(".calendar"),
        date = document.querySelector(".date"),
        daysContainer = document.querySelector(".days"),
        prev = document.querySelector(".prev"),
        next = document.querySelector(".next"),
        todayBtn = document.querySelector(".today-btn"),
        gotoBtn = document.querySelector(".goto-btn"),
        dateInput = document.querySelector(".date-input"),
        eventDay = document.querySelector(".event-day"),
        eventDate = document.querySelector(".event-date");

    let today = new Date();
    let activeDay;
    let month = today.getMonth();
    let year = today.getFullYear();

    const months = [
        "January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"
    ];

    // Function to initialize the calendar
    function initCalendar() {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const prevLastDay = new Date(year, month, 0);
        const prevDays = prevLastDay.getDate();
        const lastDate = lastDay.getDate();
        const day = firstDay.getDay();
        const nextDays = 7 - lastDay.getDay() - 1;

        date.innerHTML = months[month] + " " + year;

        let days = "";

        // Add previous month's days
        for (let x = day; x > 0; x--) {
            days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
        }

        // Add current month's days
        for (let i = 1; i <= lastDate; i++) {
            if (i === new Date().getDate() && year === new Date().getFullYear() && month === new Date().getMonth()) {
                activeDay = i;
                getActiveDay(i);
                updateEvents(i);
                days += `<div class="day today active" data-date="${year}-${month + 1}-${i}">${i}</div>`;
            } else {
                days += `<div class="day" data-date="${year}-${month + 1}-${i}">${i}</div>`;
            }
        }

        // Add next month's days
        for (let j = 1; j <= nextDays; j++) {
            days += `<div class="day next-date" data-date="${year}-${month + 1}-${j}">${j}</div>`;
        }

        daysContainer.innerHTML = days;
        addListner();
        fetchAppointmentsForMonth();
    }

    // Function to go to the previous month
    function prevMonth() {
        month--;
        if (month < 0) {
            month = 11;
            year--;
        }
        initCalendar();
    }

    // Function to go to the next month
    function nextMonth() {
        month++;
        if (month > 11) {
            month = 0;
            year++;
        }
        initCalendar();
    }

    prev.addEventListener("click", prevMonth);
    next.addEventListener("click", nextMonth);

    todayBtn.addEventListener("click", () => {
        today = new Date();
        month = today.getMonth();
        year = today.getFullYear();
        initCalendar();
    });

    dateInput.addEventListener("input", e => {
        dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
        if (dateInput.value.length === 2) {
            dateInput.value += "/";
        }
        if (dateInput.value.length > 7) {
            dateInput.value = dateInput.value.slice(0, 7);
        }
        if (e.inputType === "deleteContentBackward") {
            if (dateInput.value.length === 3) {
                dateInput.value = dateInput.value.slice(0, 2);
            }
        }
    });

    gotoBtn.addEventListener("click", gotoDate);

    // Function to go to a specific date
    function gotoDate() {
        const dateArr = dateInput.value.split("/");
        if (dateArr.length === 2) {
            if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
                month = dateArr[0] - 1;
                year = dateArr[1];
                initCalendar();
                return;
            }
        }
        alert("Invalid Date");
    }

    // Function to add event listeners to the days
    function addListner() {
        const days = document.querySelectorAll(".day");
        days.forEach(day => {
            day.addEventListener("click", e => {
                getActiveDay(e.target.innerHTML);
                updateEvents(Number(e.target.innerHTML));
                activeDay = Number(e.target.innerHTML);
                days.forEach(day => day.classList.remove("active"));
                if (e.target.classList.contains("prev-date")) {
                    prevMonth();
                    setTimeout(() => {
                        const days = document.querySelectorAll(".day");
                        days.forEach(day => {
                            if (!day.classList.contains("prev-date") && day.innerHTML === e.target.innerHTML) {
                                day.classList.add("active");
                            }
                        });
                    }, 100);
                } else if (e.target.classList.contains("next-date")) {
                    nextMonth();
                    setTimeout(() => {
                        const days = document.querySelectorAll(".day");
                        days.forEach(day => {
                            if (!day.classList.contains("next-date") && day.innerHTML === e.target.innerHTML) {
                                day.classList.add("active");
                            }
                        });
                    }, 100);
                } else {
                    e.target.classList.add("active");
                }
            });
        });
    }

    // Function to get the active day and display it
    function getActiveDay(date) {
        const day = new Date(year, month, date);
        const dayName = day.toString().split(" ")[0];
        document.querySelector(".event-day").innerHTML = dayName;
        document.querySelector(".event-date").innerHTML = date + " " + months[month] + " " + year;
    }

    // Function to update events for the selected date
    function updateEvents(date) {
        fetchAppointments(`${year}-${month + 1}-${date}`);
    }

    // Function to fetch appointments for the current month
    function fetchAppointmentsForMonth() {
        const startDate = `${year}-${String(month + 1).padStart(2, '0')}-01`;
        const endDate = `${year}-${String(month + 1).padStart(2, '0')}-${new Date(year, month + 1, 0).getDate()}`;

        $.post("/AutoMobile Project/Employee/fetch_appointments.php", {
            startDate,
            endDate
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === "success") {
                const appointmentDates = data.appointments;
                markAppointmentDays(appointmentDates);
            }
        });
    }

    // Function to mark days with appointments
    function markAppointmentDays(appointmentDates) {
        const days = document.querySelectorAll(".day");
        days.forEach(day => {
            const date = day.getAttribute("data-date");
            if (appointmentDates.includes(date)) {
                if (!day.querySelector('.appointment-dot')) {
                    const dot = document.createElement('div');
                    dot.className = 'appointment-dot';
                    day.appendChild(dot);
                }
            }
        });
    }
</script>
</body>
</html>