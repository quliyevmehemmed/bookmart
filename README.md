# 📚 Bookmart - Online Bookstore Platform

Bookmart is a dynamic and fully functional online bookstore platform built with the **Laravel** framework. It provides a seamless user experience for browsing books and includes a robust backend for efficient data management.

## ✨ Key Features

* **Category Management:** Comprehensive CRUD (Create, Read, Update, Delete) functionality for organizing books into specific categories.
* **Wishlist System:** Allows users to save and track their favorite books in a personalized wishlist.
* **Optimized Database:** Well-structured relational database design (MySQL) for fast and reliable data retrieval.
* **Responsive Design:** Clean and modern user interface utilizing Tailwind CSS for optimal viewing across all devices.

## 🛠 Tech Stack

* **Backend:** Laravel (PHP)
* **Frontend:** Blade Templates, Tailwind CSS
* **Database:** MySQL

## 🚀 Getting Started

Follow these instructions to set up the project locally on your machine.

### Prerequisites
* PHP >= 8.1
* Composer
* MySQL

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/quliyevmehemmed/bookmart.git
   cd bookmart
Install PHP dependencies:

Bash
composer install
Install NPM dependencies:

Bash
npm install
npm run build
Environment Setup:
Copy the .env.example file and rename it to .env, then generate the application key.

Bash
cp .env.example .env
php artisan key:generate
Database Configuration:
Update your .env file with your database credentials, then run the migrations.

Bash
php artisan migrate
Run the local development server:

Bash
php artisan serve
The application will be available at http://localhost:8000.

👨‍💻 Author
Mehemmed Quliyev

GitHub: @quliyevmehemmed

If you have any feedback or suggestions, feel free to open an issue or reach out!
