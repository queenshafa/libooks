# Libooks

![License](https://img.shields.io/badge/License-MIT-green)

Uhm, Libooks..? Oh! is a modern, web-based electronic library (e-library) management platform built with Laravel and TailwindCSS. It streamlines book cataloging, category organization, and member loan tracking through a unified dashboard designed for seamless library administration.

And, and, Libooks was built to simplify the process of managing a library while providing visitors with a simple way to discover and request books!

Submitted to [Macondo!](https://macondo.hackclub.com/)

## Features

-   Centralized Dashboard
-   Books Collection Management
-   Category Management
-   Book Loan Management
-   Responsive UI

## Screenshots

### Homepage

![Libooks Homepage](/public/assets/landing-page.png)

### Dashboard

![Libooks Dashboard](/public/assets/dashboard-page.png)

### Book Details

![Libooks Book Details](/public/assets/book-details.png)

## Cool, but how do I use Libooks?

I designed Libooks to be as simple and intuitive to use as possible.

If you're a visitor...

-   Open the website and you could see through the **featured books and categories**.
-   **Found the book you want to borrow?** Borrow it by filling your data thru the detail page.
-   You'll get a **unique borrowing code** (no one else has it!).
-   Go to library and **show the librarian the borrowing code** you got.
-   Take the book home and enjoy reading!
-   **Don't forget to return it** according to your borrowing duration!

If you're an admin...

-   **Login into the dashboard** (find the form via the navigation bar).
-   **Check library's stats** in the main dashboard (They have bar chart too!).
-   **Adding a book?** Add them via the 'Manage Books' menu, click 'Add Book' and fill in the book's data, and it'll be automatically added!
-   **Adding a Category?** Add them via the 'Manage Categories' menu, click 'Add Category' and fill in the category name, and it'll be automatically added! (Including the slug).
-   **Managin book loans?** Manage them via the 'Manage Loans' menu, You can check the stats, and manage the borrowing status.
-   **Logging Out?** Find the button thru the sidebar!

## Tech Stack

#### Backend

![Laravel](https://img.shields.io/badge/Laravel-13-red)
![PHP](https://img.shields.io/badge/PHP-8.4-blue)

#### Frontend

![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.0-38BDF8)
![JavaScript](https://img.shields.io/badge/Javascript-F0DB4F)

#### Database

![MySQL](https://img.shields.io/badge/MySQL-4479A1?)

#### Authentification

-   Laravel Breeze

#### Build Tool

![Vite](https://img.shields.io/badge/Vite-646CFF)

## Run Locally

Make sure you have installed:

-   PHP 8.4+
-   Composer
-   Node.js & npm
-   MySQL

### 1. Clone Repository

```bash
git clone https://github.com/queenshafa/libooks
cd libooks
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

Edit your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=libooks
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Build Assets

Development:

```bash
npm run dev
```

Production:

```bash
npm run build
```

### 7. Run Application

```bash
php artisan serve
```

Visit:

```text
http://127.0.0.1:8000
```

## Authentication

This project uses **Laravel Breeze** for:

-   User Registration
-   User Login & Logout
-   Session Authentication
-   Route Protection (Middleware)

## Demo Account

For demonstration purposes:

-   **Email:** `admin@example.com`
-   **Password:** `admin@123`

## Authors

-   Made with ❤️ by [@queenshafa](https://www.github.com/queenshafa)

## License

This project is licensed under the [MIT License](LICENSE).
