# PSI – Cultural Evening

A web application for managing cultural events, developed as part of the **Software Engineering Principles (PSI)** course at the **School of Electrical Engineering, University of Belgrade (ETF)**.

## Overview

The application provides functionality related to organizing and managing cultural evenings and their participants.

The project combines:

* A Laravel web application
* PHP
* Blade templates
* JavaScript and CSS
* A Microsoft SQL Server database
* SQL scripts containing the database structure, procedures and test data

The application was created as a university project and demonstrates database-driven web development, user management and the implementation of business logic through Laravel and SQL Server.

## Technologies

* PHP
* Laravel
* Blade
* JavaScript
* CSS
* Microsoft SQL Server
* SQL Server Management Studio
* Composer
* Node.js and npm
* Vite

## Main Features

The application includes functionality for:

* User registration
* Username validation
* User login
* User account management
* Displaying cultural events
* Managing data related to cultural evenings
* Role-based application functionality
* Communication with a Microsoft SQL Server database
* Execution of SQL queries and stored procedures
* Server-side form validation
* Dynamic frontend behavior using JavaScript

## Project Structure

```text
PSI---kulturno-vece/
└── KulturnoVece/
    ├── KulturnoVeceLaravel/
    │   ├── app/
    │   ├── bootstrap/
    │   ├── config/
    │   ├── database/
    │   ├── public/
    │   ├── resources/
    │   ├── routes/
    │   ├── storage/
    │   ├── tests/
    │   ├── .env.example
    │   ├── artisan
    │   ├── composer.json
    │   ├── package.json
    │   └── vite.config.js
    │
    ├── KulturnoVece.sql
    ├── proba.php
    └── proveraKorisnickogImena.php
```

## Main Components

### Laravel Application

The main web application is located in:

```text
KulturnoVece/KulturnoVeceLaravel/
```

It contains the Laravel source code, application routes, Blade views, configuration files and frontend resources.

### Database Script

The file:

```text
KulturnoVece/KulturnoVece.sql
```

contains the Microsoft SQL Server database definition and the data required for testing the application.

It can be executed using SQL Server Management Studio to create and populate the project database.

### Standalone PHP Files

The repository also contains standalone PHP scripts:

```text
proba.php
proveraKorisnickogImena.php
```

These files were used for testing database connectivity and implementing or testing username validation.

## Requirements

Before running the application, install:

* PHP
* Composer
* Node.js
* npm
* Microsoft SQL Server
* SQL Server Management Studio
* Microsoft ODBC Driver for SQL Server
* PHP SQL Server extensions
* A web server or a local development environment such as XAMPP

The following PHP extensions may be required:

```text
php_sqlsrv
php_pdo_sqlsrv
```

The versions of these extensions must be compatible with the installed PHP version.

## Cloning the Repository

```bash
git clone https://github.com/LauraGrego/PSI---kulturno-vece.git
cd PSI---kulturno-vece
cd KulturnoVece
cd KulturnoVeceLaravel
```

## Database Setup

Open SQL Server Management Studio and connect to your local SQL Server instance.

Execute:

```text
KulturnoVece.sql
```

This script creates the database structure and imports the data needed by the application.

Before executing the script, review the database name and server-specific configuration and modify them when necessary.

## Laravel Setup

Navigate to the Laravel application:

```bash
cd KulturnoVece/KulturnoVeceLaravel
```

Install the PHP dependencies:

```bash
composer install
```

Install the frontend dependencies:

```bash
npm install
```

Create the local environment file:

```bash
copy .env.example .env
```

On Linux or macOS, use:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

## Database Configuration

Configure the SQL Server connection in `.env`.

Example:

```env
DB_CONNECTION=sqlsrv
DB_HOST=localhost
DB_PORT=1433
DB_DATABASE=KulturnoVece
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

When using a named SQL Server Express instance, the host may look similar to:

```env
DB_HOST=localhost\SQLEXPRESS
```

The exact configuration depends on the local SQL Server installation and authentication method.

> Never commit a real `.env` file containing database credentials.

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

In another terminal, start the frontend development server:

```bash
npm run dev
```

Open the application in a browser:

```text
http://127.0.0.1:8000
```

## Building Frontend Assets

To create optimized frontend assets, run:

```bash
npm run build
```

## Application Architecture

```text
User
  │
  ▼
Blade Views and JavaScript
  │
  ▼
Laravel Routes and Application Logic
  │
  ▼
PHP SQL Server Driver
  │
  ▼
Microsoft SQL Server
```

## Database Connectivity

The application communicates with Microsoft SQL Server using the SQL Server PHP extensions.

A simplified PHP connection can be configured using PDO:

```php
$connection = new PDO(
    "sqlsrv:Server=localhost;Database=KulturnoVece",
    "username",
    "password"
);
```

For Laravel, database access should normally be configured through `.env` and Laravel’s database configuration.

## Security Notice

The SQL file contains test users and test data used during development.

Before deploying the application or using the database outside a local development environment:

* Replace any realistic test names and email addresses
* Use obviously fictional test data
* Store passwords as secure hashes
* Remove unused database accounts
* Enable SQL Server password policies
* Keep database credentials in environment variables
* Do not commit `.env` files
* Validate and sanitize all user input

## Known Limitations

This is an educational project and the current implementation has several areas that could be improved:

* The code does not consistently follow the Model-View-Controller pattern
* Some functionality exists in standalone PHP scripts
* Application logic and database logic could be separated more clearly
* Database access could be centralized through Laravel models and services
* Test coverage could be expanded
* Authentication and password storage could be modernized
* The project structure could be simplified
* Configuration values should be moved to environment variables

## Possible Improvements

Future improvements could include:

* Refactoring the application into a consistent MVC architecture
* Replacing standalone PHP files with Laravel controllers and routes
* Introducing Laravel models and relationships
* Using Laravel migrations and seeders
* Hashing passwords using Laravel’s `Hash` facade
* Adding automated feature and unit tests
* Improving frontend responsiveness
* Adding centralized validation and error handling
* Introducing role-based middleware
* Removing generated IDE files from version control
* Adding Docker-based development setup

## Educational Purpose

This project was created for educational purposes to demonstrate:

* Full-stack web application development
* Laravel and PHP programming
* Blade template development
* Relational database design
* SQL Server integration
* Stored procedures
* User authentication and validation
* Client-server communication
* Software architecture and refactoring considerations

