# AutoMobile Project

## Overview

The AutoMobile Project is a comprehensive web application designed to manage various aspects of an automobile service center. It includes features for managing appointments, vehicle details, billing, inventory, and more. The project is built using PHP, JavaScript, HTML, and CSS, and it leverages a MySQL database for data storage.

## Features

- **User Management**: Users can register, log in, and manage their profiles.
- **Appointment Management**: Users can book, view, and manage their service appointments.
- **Vehicle Management**: Users can add, edit, and view their vehicle details.
- **Billing System**: Manage billing and invoicing for services provided.
- **Inventory Management**: Track and manage inventory items and requests.
- **Service History**: View the history of services provided to vehicles.
- **Admin Dashboard**: Admins can manage users, vehicles, inventory, and view reports.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Libraries**: jQuery, Cropper.js

## Installation

1. **Clone the repository**:

    ```bash
    git clone https://github.com/Nipuna-Lakruwan/AutoMobile-Project.git
    ```

2. **Navigate to the project directory**:

    ```bash
    cd AutoMobile-Project
    ```

3. **Set up the database**:
    - Import the `cras_auto.sql` file into your MySQL database.
    - Update the database configuration in

dbconnection.php

 with your database credentials.

4. **Start the server**:
    - If you are using XAMPP, place the project folder in the `htdocs` directory.
    - Start the Apache and MySQL services from the XAMPP control panel.

5. **Access the application**:
    - Open your web browser and navigate to `http://localhost/AutoMobile-Project`.

## Project Structure

```bash
AutoMobile-Project/
├── admin/
│   ├── assets/
│   ├── includes/
│   ├── ...
├── Employee/
│   ├── assets/
│   ├── includes/
│   ├── ...
├── Mechanic/
│   ├── assets/
│   ├── includes/
│   ├── ...
├── User/
│   ├── assets/
│   ├── includes/
│   ├── ...
├── config/
│   └── dbconnection.php
├── functions/
│   └── ...
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
├── index.php
├── README.md
└── ...
```

## Usage

### User Registration and Login

- Users can register and log in to access their dashboard.

### Booking Appointments

- Users can book service appointments for their vehicles.

### Managing Vehicles

- Users can add and edit their vehicle details.

### Billing

- View and manage billing details for services provided.

### Inventory Management

- Admins can manage inventory items and track requests.

### Service History

- Users can view the history of services provided to their vehicles.

## API Endpoints

### User Endpoints

- **Register**: `/User/functions/register.php`
- **Login**:

login.php

- **Profile**:

profile.php

### Appointment Endpoints

- **Book Appointment**:

makeAppointment.php

- **View Appointments**:

appointments.php

### Vehicle Endpoints

- **Add Vehicle**:

addvehicle.php

- **Edit Vehicle**: `/User/functions/editvehicle.php`
- **View Vehicles**:

vehicle.php

### Billing Endpoints

- **View Bills**:

bill.php

- **Checkout**:

billing.php

### Inventory Endpoints

- **View Inventory**:

inventory.php

- **Add Item**:

addItem.php

- **Edit Item**:

editItem.php

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Contact

For any inquiries or support, please contact us at [senarath.lakruwan@gmail.com](mailto:senarath.lakruwan@gmail.com).
