# Hospital Management System

A multi-role Clinical and Hospital Information Management System built with **Laravel 12**, **Bootstrap 5**, and **Laravel Breeze**.

Repository: [https://github.com/ProVerted/Hospital-management.git](https://github.com/ProVerted/Hospital-management.git)

---

## Screenshots

- **Admin Dashboard:**
  ![Admin Dashboard](https://github.com/user-attachments/assets/8914b60a-d23f-4b77-9b48-06d0a3d17665)
- **Doctor Dashboard:**
  ![Doctor Dashboard](https://github.com/user-attachments/assets/1304c73c-f96d-4c29-a167-e97f654babd6)
- **Patient Management:**
  ![Add Patient](https://github.com/user-attachments/assets/b591a08e-411e-41c6-976f-ee816df04e86)
  ![Patient Records](https://github.com/user-attachments/assets/371b33ce-0a44-4261-b39a-6df83fdcd355)
- **Appointment Scheduling:**
  ![Schedule Appointment](https://github.com/user-attachments/assets/221f044b-9a7a-426f-ab61-139f393bc3bf)
  ![Appointment List](https://github.com/user-attachments/assets/5fccb141-0f56-4807-b390-1a62844c4d37)

---

## Development Milestones & Feature Branches

The application features and bug fixes have been partitioned into distinct milestone branches:

| Milestone | Feature Branch | Summary |
| :--- | :--- | :--- |
| **Milestone 1** | `feature/milestone-1-core-middleware` | Registered `'role'` middleware alias in `bootstrap/app.php` for Laravel 12 RBAC support. |
| **Milestone 2** | `feature/milestone-2-patient-management` | Fixed conditional `doctor_id` validation in `PatientController`, added `patients/show.blade.php` and `patients/edit.blade.php`. |
| **Milestone 3** | `feature/milestone-3-appointment-scheduling` | Fixed `doctor_id` validation in `AppointmentController`, added `appointments/show.blade.php` and `appointments/edit.blade.php`. |
| **Milestone 4** | `feature/milestone-4-doctor-administration` | Added full administrative doctor management views: `create.blade.php`, `edit.blade.php`, and `show.blade.php`. |
| **Milestone 5** | `feature/milestone-5-documentation` | Comprehensive documentation, milestone labeling, and environment setup guidelines. |

---

## Tech Stack

- **Backend:** Laravel 12.x (PHP ^8.2)
- **Authentication:** Laravel Breeze 2.3
- **Frontend / UI:** Bootstrap 5.1.3 & FontAwesome 6 (CDN) + Tailwind CSS
- **Database:** MySQL / PostgreSQL / SQLite via Eloquent ORM
- **Testing:** Pest 3.8 / PHPUnit

---

## Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/ProVerted/Hospital-management.git
cd Hospital-management
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run build
```

### 3. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

Configure your database connection in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hospital_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Run Migrations & Seeders
```bash
php artisan migrate --seed
```

### 5. Start Development Server
```bash
php artisan serve
```
Visit `http://localhost:8000` in your web browser.

---

## Default Seeder Credentials

| Role | Email | Password | Access |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin@hospital.com` | `password` | Full system access, doctor management, global statistics |
| **Doctor** | `doctor@hospital.com` | `password` | Assigned patients, personal schedule, consultation notes |

---

## Pushing Feature Branches to Remote

To push the milestone branches to GitHub:
```bash
git push -u origin feature/milestone-1-core-middleware
git push -u origin feature/milestone-2-patient-management
git push -u origin feature/milestone-3-appointment-scheduling
git push -u origin feature/milestone-4-doctor-administration
git push -u origin feature/milestone-5-documentation
```
