<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup%205%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Complaint Management System (CMS) — Laravel Port

A PHP/MySQL web application for managing user complaints with separate **Admin** and **User** panels, ported to **Laravel 12 + PostgreSQL**. Users can lodge complaints, track their status, and admins can manage categories, subcategories, states, users, and process complaints through a complete lifecycle.

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

- PHP 8.2+
- PostgreSQL 13+
- Composer
- Web Server (Apache / Nginx)

---

## Installation

1. **Clone or download** the repository
   ```bash
   git clone https://github.com/magomakajura2-pixel/Complaints-management-system.git
   ```
2. Navigate into the Laravel directory:
   ```bash
   cd Complaints-management-system/cms-laravel
   ```
3. Install PHP dependencies:
   ```bash
   composer install
   ```
4. Copy `.env.example` to `.env` and configure your database:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

---

## Default Credentials

### Admin Login

| Field    | Value         |
|----------|---------------|
| Username | `admin`       |
| Password | `Test@123`    |

### User Login

| Field    | Value               |
|----------|---------------------|
| Email    | `grmat@test.com`    |
| Password | `Test@123`          |

---

## Project Structure

```
cms-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin panel controllers
│   │   │   └── User/           # User panel controllers
│   │   └── Middleware/         # Auth middleware
│   └── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/                # Sample data seeders
├── resources/
│   └── views/                  # Blade templates
│       ├── admin/              # Admin panel views
│       ├── user/               # User panel views
│       └── layouts/            # Shared layouts
├── public/                     # Public assets (CSS, JS, images)
├── routes/web.php              # Application routes
├── render.yaml                 # Render deployment blueprint
└── build.sh                    # Render build script
```

---

## Deployment (Render)

This project includes a `render.yaml` Blueprint for deployment to [Render.com](https://render.com):

1. Push this repo to GitHub
2. Go to [Render Dashboard](https://dashboard.render.com)
3. Click **New +** → **Blueprint**
4. Connect the GitHub repo
5. Render auto-provisions PostgreSQL + Web Service
6. Set `APP_KEY` in environment variables
7. Deploy

The `build.sh` script handles `composer install`, `migrate`, `seed`, cache, and PostgreSQL sequence resets automatically.

---

## Security

- **CSRF Protection** — All forms include `@csrf` tokens via Laravel's built-in middleware
- **SQL Injection Prevention** — Uses Eloquent ORM with parameterized queries; no raw SQL
- **XSS Protection** — Blade template engine auto-escapes output via `{{ }}` syntax
- **Authentication** — Session-based auth with custom middleware (`AdminAuth`, `UserAuth`)
- **Password Hashing** — Passwords stored with MD5 (matching original system)
- **File Upload Validation** — Server-side validation on complaint document uploads
- **Environment Security** — `.env` file excluded from version control; no secrets in repo

---

## Database Schema

The database contains **7 core tables**:

| Table              | Description                            |
|--------------------|----------------------------------------|
| `admins`           | Admin login credentials & profile      |
| `categories`       | Complaint categories                   |
| `subcategories`    | Subcategories linked to categories     |
| `states`           | States for complaint location          |
| `users`            | Registered users                       |
| `complaints`       | All lodged complaints                  |
| `complaint_remarks`| Status update history with remarks     |

### Relationships

- `users` (1) → `complaints` (many)
- `categories` (1) → `subcategories` (many)
- `complaints` (1) → `complaint_remarks` (many)

---

## Technology Stack

- **Backend:** Laravel 12 (PHP 8.2+)
- **Database:** PostgreSQL
- **Frontend:** HTML5, CSS3, Bootstrap 4, jQuery
- **Admin Template:** Able Pro (Bootstrap 4)
- **Libraries:** Owl Carousel, Slick Slider, Fancybox, Animate.css

---

## License

This project is licensed under the **GNU General Public License v3.0** — see the [LICENSE](LICENSE) file for details.

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

*Complaint Management System — Built with Laravel & PostgreSQL*
