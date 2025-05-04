📚 System Overview
A bilingual (Arabic/English) library management system built with Laravel that supports:

RTL (Arabic) and LTR (English) interfaces

User roles (Librarian/Member)

Book management with categories

Book borrowing functionality

User authentication

🌍 Bilingual Features
Complete RTL support for Arabic interface

LTR layout for English interface

Language switching functionality

Translated all interface elements

👥 User Management
Librarian can:

Create new user accounts

Manage all books

View borrowing records

Member can:

Register account

Browse available books

Borrow available books

📖 Book Management
Book CRUD operations

Category system (Programming, Physics, etc.)

Availability status tracking

Search and filtering

🛠️ Technical Implementation
Framework: Laravel 10+

Database: MySQL

Frontend: Blade templates with Bootstrap

Localization: Laravel localization features

Testing: Database seeding with factories

🚀 Installation
Prerequisites
PHP 8.0+

Composer

MySQL

Node.js (for frontend dependencies)

Setup Steps
Clone repository:

bash
git clone [repository-url]
cd library-system
Install dependencies:

bash
composer install
npm install
Configure environment:

bash
cp .env.example .env
Edit .env with your database credentials

Generate key and migrate:

bash
php artisan key:generate
php artisan migrate --seed
Compile assets:

bash
npm run dev
Start server:

bash
php artisan serve
📂 Project Structure
app/
  Models/
    User.php
    Book.php
    Category.php
    BorrowRecord.php
database/
  factories/
    UserFactory.php
    BookFactory.php
  migrations/
  seeders/
resources/
  lang/
    ar/
    en/
  views/
    layouts/
      rtl.blade.php
      ltr.blade.php
    books/
    auth/
routes/
  web.php
  api.php
🌟 Seeded Data
The system comes pre-loaded with:

2 user roles (Librarian/Member)

5 book categories

50 sample books

10 test users
