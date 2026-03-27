# Enterprise Dynamic Form Management System

## Tech Stack

* PHP 8+
* Laravel
* MySQL
* WordPress (Plugin Integration)

---

## Features

### 1. Authentication & Roles

* User Registration, Login, Logout
* Role-based access (Admin/User)
* Admin Seeder:

  * Email: [admin@test.com]
  * Password: password123

---

### 2. Admin Panel

* Dashboard with statistics
* Manage Forms
* Manage Users
* View Submissions
* CSV Import & Export

---

### 3. Dynamic Form Builder

* Create forms dynamically
* Default fields: Name, Email, Phone
* Custom fields:

  * Text, Email, Number, Date
  * Dropdown, Checkbox
* Add/remove fields dynamically
* Field options support

---

### 4. Dynamic Validation

* Validation rules stored in DB
* Supports:

  * required
  * email
  * numeric

---

### 5. Submission Management

* Store form submissions
* View submissions in admin panel
* Multiple submissions supported

---

### 6. CSV Import

* Upload CSV file
* Preview valid & invalid rows
* Only valid rows processed

---

### 7. CSV Export

* Export submissions to CSV

---

### 8. REST API

* Endpoint: /api/users
* Pagination supported
* JSON response format

---

### 9. WordPress Integration

* Custom plugin created
* Fetch users via API
* Display users using shortcode

---

## Setup Instructions

1. Clone repository
2. Run:

   * composer install
   * php artisan migrate
   * php artisan db:seed
3. Start server:

   * php artisan serve

---

## Admin Login

* Email: [admin@test.com]
* Password: password123

## Wordpress Admin Login

* Username : Admin
* Password : Admin
---
## Notes
* Admin routes are protected by middleware
* Dynamic forms stored in database
* Clean and scalable architecture
