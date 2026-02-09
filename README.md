# 🏥 Hospital Management System (Laravel)

A Laravel-based Hospital Management System developed as part of a technical evaluation task.  
The application demonstrates **Laravel fundamentals**, including authentication, role-based access control, CRUD operations, routing, middleware, and dashboard-based UI.

---

## 📌 Features

### 🔐 Authentication & Roles
- Laravel Breeze authentication
- Role-based access using middleware
- Three roles:
  - **Admin**
  - **Doctor**
  - **Patient**
- Automatic redirection to role-specific dashboards after login

### 🧑‍⚕️ Admin Capabilities
- Manage doctors (Create, Read, Update, Delete)
- Manage patients (Create, Read, Update, Delete)
- View and manage all appointments
- Access to full system data

### 👨‍⚕️ Doctor Capabilities
- View assigned appointments
- View patient details related to their appointments
- Access doctor-specific dashboard

### 🧑 Patient Capabilities
- View own appointments
- View assigned doctor information
- Access patient-specific dashboard

### 📅 Appointments
- Appointment scheduling between doctors and patients
- Appointment status tracking (e.g. pending, confirmed, cancelled)

### 🎨 UI / UX
- Clean and responsive UI
- Tailwind CSS (via Laravel Breeze)
- Structured Blade layouts with reusable components

---

## 🛠 Tech Stack

- **Laravel 10.x**
- **Laravel Breeze** (Authentication)
- **PHP 8.x**
- **MySQL / PostgreSQL**
- **Tailwind CSS**
- **Blade Templates**

---
