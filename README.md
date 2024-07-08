# UniStay

## Description:
UniStay is a web application designed to connect students with homeowners who offer accommodation. Students can search for and book accommodation while homeowners can list properties and manage reservations. This project aims to simplify the process of finding and reserving student housing, providing a seamless and user-friendly experience for both students and property owners.

## Project Setup/Installation Instructions
## Dependencies:
PHP 8.2.12
Laravel 11.13.0
MySQL
Composer
Node.js and npm (for frontend dependencies)
Apache or Nginx server
## Installation Steps:
### Clone the Repository:

#### bash:
Run code:
git clone https://github.com/ShadrachAroni/UniStay.git
cd unistay
### Install Backend Dependencies:

#### bash:
run code:
composer install
### Install Frontend Dependencies:

#### bash:
run code: 
npm install
npm run dev
### Set Up Environment Variables:
Copy the .env.example file to .env and configure your database and other necessary settings:

#### bash:
run code
cp .env.example .env
php artisan key:generate
Run Migrations:

#### bash:
run code
php artisan migrate
Seed the Database (optional):

#### bash:
Copy code
php artisan db:seed
Start the Development Server:

#### bash:
Copy code
php artisan serve
### Usage Instructions

How to Run:
To start the application, navigate to the project directory and run the development server:

#### bash:
run code:
php artisan serve
Open your browser and go to http://127.0.0.1:8000 to access the application.

## Steps:
Students: Sign up, search for accommodations, view property details, and book a stay.
Homeowners: Sign up, add property listings, manage bookings, and update property details.

## Input/Output:
Input: Users provide details such as email, gender, student ID card, national ID card, phone number, and address.
Output: The application displays a list of available accommodations, booking confirmations, and property management options.
Project Structure

## Overview:
The project is organized into the following main folders:

app: Contains the core application logic code (models, controllers, etc.).
database: Contains database migrations and seeders.
public: Contains publicly accessible files (e.g., images, CSS, JS).
resources: Contains view templates and raw assets (CSS, JS, etc.).
routes: Contains all route definitions.
tests: Contains automated tests.

## Key Files:
app/Models/User.php: Defines the user model and its relationships.
app/Http/Controllers/AuthController.php: Handles user authentication.
database/migrations/: Contains the database schema.
routes/web.php: Defines the web routes for the application.
resources/views/: Contains the Blade templates for the frontend.
Additional Sections (Optional)

## Project Status:
The project is currently in progress.

## Acknowledgements:
Laravel Documentation
Composer
Node.js
Icons made by Freepik from Flaticon

## Contact Information:
For questions or feedback, please open an issue on GitHub or contact us at [shadrach.aroni@strathmore.edu] or [tracey.munyagia@strathmore.edu]

```
UniStay
├─ .editorconfig
├─ .git
│  ├─ COMMIT_EDITMSG
│  ├─ config
│  ├─ description
│  ├─ FETCH_HEAD
│  ├─ HEAD
│  ├─ hooks
│  │  ├─ applypatch-msg.sample
│  │  ├─ commit-msg.sample
│  │  ├─ fsmonitor-watchman.sample
│  │  ├─ post-update.sample
│  │  ├─ pre-applypatch.sample
│  │  ├─ pre-commit.sample
│  │  ├─ pre-merge-commit.sample
│  │  ├─ pre-push.sample
│  │  ├─ pre-rebase.sample
│  │  ├─ pre-receive.sample
│  │  ├─ prepare-commit-msg.sample
│  │  ├─ push-to-checkout.sample
│  │  ├─ sendemail-validate.sample
│  │  └─ update.sample
│  ├─ index
│  ├─ info
│  │  └─ exclude
│  ├─ logs
│  │  ├─ HEAD
│  │  └─ refs
│  │     ├─ heads
│  │     │  └─ main
│  │     └─ remotes
│  │        └─ origin
│  │           ├─ HEAD
│  │           └─ main
