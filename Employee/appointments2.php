<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

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
        <h2>Appointments</h2>
        <hr>
    </div>
</div>

<div class="contcontainer">
    <div class="calendar">
        <p style="margin-top: 20px">Calendar</p>
        <div id="calendar"></div>
    </div>

    <script>
        // Get current date from PHP
        const currentYear = <?php echo date('Y'); ?>;
        const currentMonth = <?php echo date('n'); ?> - 1; // JS months are 0-indexed
        const currentDay = <?php echo date('j'); ?>;

        // Function to generate a calendar
        function generateCalendar(year, month) {
            const calendarContainer = document.getElementById('calendar');
            calendarContainer.innerHTML = ""; // Clear previous content

            // Get the first day and number of days in the month
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // Create calendar grid
            const grid = document.createElement('div');
            grid.className = 'calendar-grid';

            // Add day names
            const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            dayNames.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day-name';
                dayElement.textContent = day;
                grid.appendChild(dayElement);
            });

            // Add blank spaces for days before the first day
            for (let i = 0; i < firstDay; i++) {
                const blank = document.createElement('div');
                blank.className = 'calendar-blank';
                grid.appendChild(blank);
            }

            // Add days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                dayElement.textContent = day;

                // Highlight the current day
                if (day === currentDay) {
                    dayElement.classList.add('highlight');
                }

                grid.appendChild(dayElement);
            }

            calendarContainer.appendChild(grid);
        }

        // Generate the calendar for the current month
        generateCalendar(currentYear, currentMonth);
    </script>

    <style>
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            margin-top: 10px;
        }

        .calendar-day-name,
        .calendar-day,
        .calendar-blank {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .calendar-day-name {
            font-weight: bold;
            background-color: #f5f5f5;
        }

        .calendar-day {
            background-color: #fff;
            cursor: pointer;
        }

        .calendar-day:hover {
            background-color: #f0f0f0;
        }

        .calendar-day.highlight {
            background-color: #952B1A;
            color: #fff;
            font-weight: bold;
        }
    </style>

    <div class="Mitem1">
        <div class="button clickable" onclick="redirectTo('makeAppointment.php')">
            <p> Make Appointments</p>
        </div>
    </div>

    <div class="Mitem2">
        <div class="button clickable" onclick="redirectTo('editAppointment.php')">
            <p> Edit Appointments</p>
        </div>
    </div>
</div>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
</body>

</html>