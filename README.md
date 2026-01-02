# 🍽️ Food Ordering System (food/)

An elegant, responsive, and easy-to-use Food Ordering System — perfect for restaurants, cafés, and food delivery startups. Customers can browse menus, add items to a cart, place orders, and admins can manage menu items and orders via a clean dashboard.

Built with ❤️ — License: MIT  
Live demo: (add your demo link here)

## Table of Contents
- [About](#about)
- [Features](#features)
- [Screenshots](#screenshots)
- [Tech Stack](#tech-stack)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Run Locally](#run-locally)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Environment Variables](#environment-variables)
- [Contributing](#contributing)
- [Roadmap](#roadmap)
- [License](#license)
- [Contact](#contact)

## About
This folder contains the user-facing PHP + MySQL implementation of the Food Ordering System. It implements core e-commerce ordering flows: browse menu, manage cart, checkout, order history, and basic admin operations (in the `admin/` folder).

## Features
- Intuitive menu browsing with categories and search
- Add/remove items to cart with quantity adjustments
- Checkout with order summary and status
- Basic admin dashboard for managing menu items and orders
- Mobile-first responsive design (Bootstrap-based layouts)
- Order history for customers
- Rating and quick-view for products
- Contact and about pages

## Screenshots
Replace these placeholders with actual screenshots from the app:
- Homepage Preview
- Menu Detail
- Cart & Checkout
- Admin Dashboard

## Tech Stack
- Backend: PHP (plain PHP files)
- Database: MySQL / MariaDB (SQL file included)
- Frontend: HTML, CSS, JavaScript, Bootstrap (or plain CSS)
- Web server: Apache or built-in PHP server for local testing

## Getting Started

### Prerequisites
- PHP 7.4+ (PHP 8.x recommended)
- MySQL or MariaDB
- Web server (Apache / Nginx) or XAMPP / MAMP / LAMP stack
- Optional: phpMyAdmin for importing the SQL file

### Installation
1. Clone the repository or copy the `food/` folder into your web root:
   - git clone https://github.com/sultanakona/Food_Ordering_System-s-.git
   - Place the `food/` folder under your web server root (e.g., `/var/www/html/food`).

2. Create a MySQL database, e.g. `food_db`.

3. Import the SQL schema and seed data:
   - From terminal:
     - mysql -u root -p food_db < food/food_db.sql
   - Or import `food/food_db.sql` using phpMyAdmin.

4. Configure DB credentials:
   - Search the project for the DB connection (look for `mysqli_connect`, `new mysqli`, or a `config.php`).
   - Update host, username, password and database name accordingly.
   - Example variables to set in your config file:
     - DB_HOST = 'localhost'
     - DB_NAME = 'food_db'
     - DB_USER = 'root'
     - DB_PASS = 'your_password'

5. Ensure upload directory is writable:
   - chmod -R 755 food/uploaded_img
   - The web server user (www-data, apache, etc.) must have write access for uploads.

### Run Locally
- Using built-in PHP server (for quick tests):
  - php -S localhost:8000 -t food
  - Open http://localhost:8000/home.php
- Using XAMPP/MAMP:
  - Place `food/` inside the server's htdocs/www directory and open http://localhost/food/home.php

## Project Structure
- about.php — About page
- actions.php — Action handlers (add to cart, etc.)
- admin/ — Admin panel and management pages
- cart.php — Shopping cart page
- category.php — Category listing / filtering
- checkout.php — Checkout flow
- components/ — Reusable components (header, footer, includes)
- contact.php — Contact form/page
- css/ — Stylesheets
- food_db.sql — Database schema and seed data
- home.php — Homepage
- images/ — Static images used by the site
- js/ — JavaScript files
- login.php — User login
- menu.php — Menu listing
- orders.php — User orders and order history
- product.php — Product detail page
- profile.php — User profile
- quick_view.php — Quick product view/modal
- rating.php — Product rating handling
- register.php — User registration
- search.php — Search page
- update_address.php — Update user address
- update_profile.php — Update user profile
- uploaded_img/ — User / product uploaded images
- project images/ — Example project screenshots

Adjust this list to reflect any additional files or custom structure you add.

## Usage
- Browse menu and categories on the homepage or `menu.php`.
- Click a product to view details, use Quick View for a modal preview.
- Add items to cart and proceed to `checkout.php` to place an order.
- Registered users can view order history in `orders.php`.
- Admin pages (in `admin/`) allow menu and order management — secure them before public use.

Tip: Add demo admin credentials or seed data in the SQL (or a README section) so others can test admin flows easily.

## Environment Variables
This project uses a simple PHP config approach. You can create a `config.sample.php` with placeholders, for example:
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
define('DB_NAME', 'food_db');
?>
```
Copy to `config.php` (not tracked in VCS) and update with real values.

## Contributing
Contributions are welcome! Suggested workflow:
1. Fork the repository
2. Create a branch: git checkout -b feature/your-feature
3. Commit changes: git commit -m "Add feature"
4. Push branch: git push origin feature/your-feature
5. Open a Pull Request describing your changes

Please follow code style, validate inputs, and prefer prepared statements when adding DB code.

## Roadmap
Planned improvements:
- Payment gateway integration (Stripe / PayPal)
- Real-time order status updates (WebSockets)
- Save addresses and favorites in user profiles
- Harden security: CSRF protection, input validation, prepared statements
- Docker Compose for easier local development
- Improved admin UI and role management

If you'd like anything added, open an issue or send a PR.

## License
This project is licensed under the MIT License. See the [LICENSE](../LICENSE) file for details or add an MIT file in the repository root.

## Contact
Maintained by: sultanakona  
GitHub: [sultanakona](https://github.com/sultanakona)  
Email: add-your-email@example.com

Enjoy building — bon appétit! 🍕🍜🥗
