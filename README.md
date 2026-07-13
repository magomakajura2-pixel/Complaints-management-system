# Complaint Management System (CMS)

A PHP/MySQL web application for managing user complaints with separate **Admin** and **User** panels. Users can lodge complaints, track their status, and admins can manage categories, subcategories, states, users, and process complaints through a complete lifecycle.

---

## Features

### User Panel
- User registration with email availability check
- Login / Password recovery
- Lodge complaints (with file upload)
- Track complaint history with status updates
- View complaint details and admin remarks
- Profile management (edit details, upload photo)
- Change password

### Admin Panel
- Dashboard with analytics (total users, complaints, categories, etc.)
- Category / Subcategory / State management (CRUD)
- User management (view, search, delete)
- Complaint management (view all, filter by status)
- Update complaint status with remarks (In Process / Closed)
- Search complaints by number, name, or contact
- Date-range reports for users and complaints
- Profile management & password change

### Complaint Lifecycle
1. User lodges a complaint (Status: **Not Processed**)
2. Admin reviews and marks as **In Process**
3. Admin closes after resolution — Status: **Closed**
4. User sees all remarks at each stage

---

## Requirements

- PHP 5.6+
- MySQL / MariaDB
- Web Server (Apache / Nginx / IIS)
- XAMPP / WAMP / LAMP recommended

---

## Installation

1. **Clone or download** the repository
2. Copy the `cms/` folder into your web root:
   - XAMPP: `xampp/htdocs/`
   - WAMP: `wamp/www/`
   - LAMP: `/var/www/html/`
3. Open **phpMyAdmin** (http://localhost/phpmyadmin)
4. Create a database named **`cms`**
5. Import `SQL File/cms.sql` into the `cms` database
6. Run the application:
   - **Frontend:** http://localhost/cms
   - **Admin Panel:** http://localhost/cms/admin

---

## Default Credentials

### Admin Login
| Field    | Value              |
|----------|--------------------|
| Username | `admin`            |
| Password | `Test@123`         |

### User Login
| Field    | Value              |
|----------|--------------------|
| Email    | `grmat@test.com`   |
| Password | `Test@123`         |

---

## Project Structure

```
Complaint-Management-System-PHP/
├── LICENSE                     # GNU GPL v3 License
├── README.md                   # This file
├── readme.txt                  # Original setup guide
├── SQL File/
│   └── cms.sql                 # Complete database dump (7 tables)
│
└── cms/                        # Application root
    ├── index.php               # Public landing page
    ├── gulpfile.js             # Build config
    ├── cms.sql                 # Alternate database dump
    │
    ├── css/                    # Stylesheets (Bootstrap, custom, etc.)
    ├── js/                     # JavaScript (jQuery, Bootstrap, plugins)
    ├── images/                 # Public images & icons
    │
    ├── admin/                  # Admin Panel
    │   ├── index.php           # Admin login
    │   ├── dashboard.php       # Admin dashboard
    │   ├── logout.php          # Logout
    │   ├── category.php        # Manage categories
    │   ├── edit-category.php   # Edit category
    │   ├── subcategory.php     # Manage subcategories
    │   ├── edit-subcategory.php# Edit subcategory
    │   ├── state.php           # Manage states
    │   ├── edit-state.php      # Edit state
    │   ├── manage-users.php    # Manage users
    │   ├── userprofile.php     # View user profile (popup)
    │   ├── user-search.php     # Search users
    │   ├── user-complaints.php # User-specific complaints
    │   ├── all-complaint.php   # All complaints
    │   ├── notprocess-complaint.php  # Pending complaints
    │   ├── inprocess-complaint.php   # In-process complaints
    │   ├── closed-complaint.php      # Closed complaints
    │   ├── complaint-details.php     # Complaint details
    │   ├── updatecomplaint.php       # Update status (popup)
    │   ├── complaint-search.php      # Search complaints
    │   ├── admin-profile.php   # Admin profile
    │   ├── setting.php         # Change password
    │   ├── reset-password.php  # Password recovery
    │   ├── between-date-userreport.php      # User date-range report
    │   ├── between-date-complaintreport.php  # Complaint date-range report
    │   │
    │   ├── include/
    │   │   ├── config.php      # Database connection
    │   │   ├── sidebar.php     # Navigation sidebar
    │   │   ├── header.php      # Top header
    │   │   └── footer.php      # Bottom footer
    │   │
    │   └── assets/             # Admin UI assets
    │       ├── css/
    │       ├── js/
    │       ├── fonts/
    │       ├── images/
    │       └── json/
    │
    └── user/                   # User Panel
        ├── index.php           # User login
        ├── dashboard.php       # User dashboard
        ├── registration.php    # User registration
        ├── register-complaint.php  # Lodge a complaint
        ├── complaint-history.php   # Complaint history
        ├── complaint-details.php   # Complaint details
        ├── profile.php         # User profile
        ├── update-image.php    # Upload profile photo
        ├── setting.php         # Change password
        ├── reset-password.php  # Password recovery
        ├── logout.php          # Logout
        ├── check_availability.php  # AJAX email check
        ├── getsubcat.php       # AJAX subcategory loader
        │
        ├── include/
        │   ├── config.php      # Database connection
        │   ├── sidebar.php     # Navigation sidebar
        │   ├── header.php      # Top header
        │   └── footer.php      # Bottom footer
        │
        ├── userimages/         # Profile photos directory
        └── complaintdocs/      # Uploaded complaint files
```

---

## Database Schema

The database `cms` contains **7 tables**:

| Table              | Description                              |
|--------------------|------------------------------------------|
| `admin`            | Admin login credentials & profile        |
| `category`         | Complaint categories                     |
| `subcategory`      | Subcategories linked to categories       |
| `state`            | States for complaint location            |
| `users`            | Registered users                         |
| `tblcomplaints`    | All lodged complaints                    |
| `complaintremark`  | Status update history with remarks       |
| `userlog`          | User login activity tracking             |

### Relationships
- `users` (1) → `tblcomplaints` (many)
- `category` (1) → `subcategory` (many)
- `category` (1) → `tblcomplaints` (many)
- `tblcomplaints` (1) → `complaintremark` (many)

---

## Technology Stack

- **Backend:** PHP 5.6+ (Procedural)
- **Database:** MySQL (via `mysqli`)
- **Frontend:** HTML5, CSS3, Bootstrap 4, jQuery
- **Libraries:** Owl Carousel, Slick Slider, Fancybox, Animate.css
- **Admin Template:** Mega Able (Bootstrap 4)

---

## License

This project is licensed under the **GNU General Public License v3.0** - see the [LICENSE](LICENSE) file for details.

```
Complaint Management System (CMS)
Copyright (C) 2026  KAJURA MAGOMA

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
```

---

## Developer

**KAJURA MAGOMA**

---

*Complaint Management System — Built with PHP & MySQL*
