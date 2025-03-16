# Data Management System

This is a web-based Data Management System developed using Laravel 8.0 and MySQL.

## Features
- User Management (Superadmin, User Admin, Sales Team)
- Category Management
- Product Management
- Soft delete functionality
- CRUD operations for users, categories, and products

## Prerequisites
Before installing, ensure you have the following installed on your system:
- PHP 7.4 or later
- Composer
- MySQL
- Laravel 8.0

## Installation Steps

### 1. Clone the Repository
```sh
git clone https://github.com/your-repository/data-management-system.git
cd data-management-system

Step 2: Install Dependencies
Run the following command to install PHP and JavaScript dependencies:

composer install
npm install

Step 3: Configure Environment File (.env) .open this file and update database and email credentials.

step 4. Run Database migration and seeders

step 5. Storage Link (for File Uploads if necessary)

step 6. Run the application : php artisan serve

step 7. Additional Commands :

        Clear Cache: php artisan cache:clear

        Run Tests: php artisan test

        Database Refresh (Reset + Seed): php artisan migrate:refresh --seed

Step 8. Login Credentials (If Needed)
If your system has pre-defined user roles, use the seeded login credentials:

        Super Admin Login:

            Email: superadmin@example.com

            Password: password123

        Sales Team Login:

            Email: sales@yopmail.com

            Password: password123

        Users Team Login :

            Email : uses@yopmail.com

            Password : password123