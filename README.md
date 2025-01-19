# Laravel E-Commerce Project

A feature-rich e-commerce web application built with **Laravel** to demonstrate dynamic user roles, product management, and shopping functionality. This project is designed with scalability and maintainability in mind, making it ideal for both developers and businesses.

## Features

### User Features
- **Role-Based Middleware:** Automatically redirect users to appropriate routes based on their roles (Admin/User).
- **Product Browsing:**
  - Sort products by category.
  - Order products by:
    - Price (ascending/descending).
    - Title (A-Z/Z-A).
- **Product Details:** View detailed information for each product.
- **Shopping Cart:**
  - Add products to the cart.
  - Adjust item quantities (increase/decrease).
- **Checkout:** Complete orders with a simple and user-friendly process.

### Admin Features
- **CRUD Operations:**
  - Manage products, categories, and users.
- **Order History:** View all completed orders and their details.

## Technology Stack
- **Backend Framework:** Laravel
- **Database:** MySQL
- **Frontend:** Blade templates/ Bootstrap
- **Other Tools:** Composer, Artisan CLI

## Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/your-username/laravel-ecom-project.git
   cd laravel-ecom-project
2. Install dependencies
   composer install
   npm install
3. Set up the Environment File
   copy .env.example to .env and adjust db setting to your database
   run => php artisan migrate --seed
4. Start the Development Server
   composer run dev
   and your application at localhost:8000
## **Demo Credentials**
**Admin Account**
- email: admin@gmail.com
- password: password

**User Account**
- email: user@gmail.com
- password: password

**Contribution**
Feel free to fork this repository, submit pull requests, or report issues for further improvements.

**License**
This project is open-source and available under the **MIT License**.
  
    
   
