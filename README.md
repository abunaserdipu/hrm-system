# Basic HRM System (Laravel MVC)

## 📌 Objective
This project is a simplified Human Resource Management (HRM) system built using Laravel to demonstrate:

- Laravel MVC architecture
- Eloquent relationships
- Resourceful routing
- Authentication
- Validation
- Blade templating
- jQuery & AJAX interactions

---

## ⚙️ Tech Stack
- Laravel 10+
- Blade Template Engine
- Laravel Breeze (Authentication)
- MySQL
- jQuery & AJAX

---

## 📦 Features
- User registration & login (Laravel Breeze)
- Employee CRUD operations
- Department create & list
- Skill create & list
- Employee ↔ Department (One-to-Many)
- Employee ↔ Skill (Many-to-Many)
- Dynamic department filtering (AJAX)
- Real-time email availability check (AJAX)

---

## 🧩 Database Structure
- employees
- departments
- skills
- employee_skill (pivot table)

---

## 🚀 Installation Steps

```bash
git clone <repository-url>
cd hrm-system
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
