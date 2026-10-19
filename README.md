# 🛒 Yove - E-Commerce Platform

Yove is a full-featured E-Commerce web application built with **Laravel 13**, **Laravel Breeze**, **MySQL**, and **Bootstrap/Tailwind CSS**. It provides a smooth shopping experience for customers alongside a powerful admin dashboard to manage products, categories, and customer orders.

---

## ✨ Features

### 🛍️ Customer Features
- **User Authentication:** Registration, Login, Profile management, and Secure Password Reset using Laravel Breeze.
- **Product Catalog:** Browse products, view category listings, and check product details.
- **Cart Management:** Add items to cart, update quantities dynamically, and remove items with real-time total calculations.
- **Stock Validation:** Automatic validation preventing users from adding more items than available in stock.
- **Checkout System:** Simple checkout process with address and phone number confirmation.
- **Automatic Inventory Deduction:** Stock levels are automatically updated and deducted upon order confirmation.
- **Order Tracking (My Orders):** Customers can review their order history and track order statuses (`Pending`, `Processing`, `Completed`, `Cancelled`).

### ⚙️ Admin Panel Features
- **Category Management:** Full CRUD operations for organizing product categories.
- **Product Management:** Add, edit, and delete products, manage image uploads, set prices, and control stock levels.
- **Order Management:** View all customer orders, review items, and update order statuses.

---

## 🛠️ Tech Stack & Prerequisites

- **Backend Framework:** PHP 8.3+ / Laravel 13
- **Authentication:** Laravel Breeze
- **Database:** MySQL
- **Frontend UI:** Bootstrap / Tailwind CSS / Blade Templating
- **Web Server:** Apache / Nginx (XAMPP / Laragon)

---

## 🚀 Installation & Setup Guide

1. **Clone the Repository:**
   ```bash
   git clone [https://github.com/YOUR_USERNAME/yove-ecommerce.git](https://github.com/YOUR_USERNAME/yove-ecommerce.git)
   cd yove-ecommerce
