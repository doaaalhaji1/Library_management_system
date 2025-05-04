# Library Management System

## Project Description
A bilingual (Arabic/English) library management system built with Laravel featuring:

- Complete RTL (Arabic) and LTR (English) interfaces
- Multi-role authentication (Librarian/Member)
- Book management with categories
- Borrowing functionality
- Localized content for both languages

## Features
- **User Management**:
  - Librarian: Create users, manage books, view reports
  - Member: Register, browse books, borrow available items

- **Book Management**:
  - Add/edit/delete books
  - Categorization system
  - Availability status
  - Advanced search

- **Multi-language Support**:
  - Full RTL/LTR layouts
  - Language switching
  - Translated interface

## Installation
### Requirements
- PHP 8.2+
- MySQL 8.0+
- Composer
- Node.js

### Steps
1. Clone repo:
```bash
git clone https://github.com/yourrepo/library-system.git
cd library-system```

Install dependencies:

```
composer install
npm install```
Configure:


cp .env.example .env
# Edit .env with your DB credentials
Migrate & seed:

bash
php artisan migrate --seed
Build assets:

bash
npm run build
Run server:

```bash
php artisan serve
File Structure
app/
  Models/
    User.php
    Book.php
    Category.php
database/
  factories/
    UserFactory.php
    BookFactory.php
  migrations/
resources/
  views/
    layouts/
      app.blade.php
    books/
    auth/
```
Default Accounts
Librarian:

Email: admin@library.com

Password: password

Member:

Email: user@library.com

Password: password

License
MIT License
