# 🛒 E-Commerce Platform

A full-stack e-commerce web application built with **CodeIgniter 4**, featuring customer-facing shopping, an interactive checkout flow with live map-based delivery selection, and a full admin dashboard for managing the store.


---

## Overview

This project simulates a real online store, built to practice full-stack PHP development with CodeIgniter 4 — from database-driven product catalogs to session-based authentication, role-based access control, and third-party API integration (interactive maps + reverse geocoding).

## ✨ Features

### Customer-Facing
- **Product catalog** with image galleries, thumbnails, and related-products carousel
- **Product detail pages** with dynamic stock badges (Low Stock / Best Seller / New Arrival / Trending)
- **Shopping cart** with live quantity adjustment and item removal
- **Checkout flow** with:
  - Interactive delivery map (Leaflet + OpenStreetMap) — drag or click to drop a pin
  - Automatic address reverse-geocoding from the selected map point
  - Multiple payment methods: Cash on Delivery, GCash, Maya, Credit/Debit Card, Bank Transfer
  - Order notes field for delivery instructions
- **User authentication** (login, registration, session handling)
### Admin Dashboard
- Product management (create, update, delete)
- Category management
- Order management and status updates
- Payment tracking
- User account management
- Role-based route protection (`session` + `group:admin` filters)

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2+, CodeIgniter 4 |
| Auth | CodeIgniter Shield |
| Database | MySQL |
| Frontend | Bootstrap 5, Font Awesome, custom CSS |
| Maps | Leaflet.js + OpenStreetMap tiles |
| Geocoding | Nominatim (OpenStreetMap) |

## 🚀 Getting Started

### Requirements
- PHP 8.2 or higher, with the `intl` and `mbstring` extensions enabled
- MySQL (with the `mysqlnd` extension enabled)
- Composer

### Installation

```bash
# Clone the repository
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name

# Install dependencies
composer install

# Set up environment config
cp env .env
```

Edit `.env` and configure:
- `app.baseURL` — your local/dev URL
- `database.default.*` — your MySQL connection details

```bash
# Run database migrations
php spark migrate

# (Optional) seed sample data
php spark db:seed DatabaseSeeder

# Start the development server
php spark serve
```

Visit `http://localhost:8080` in your browser.

> **Note:** CodeIgniter 4 serves from the `public/` folder, not the project root. If deploying to a live server, point your web server's document root to `public/`.

## 📁 Project Structure

```
app/
├── Controllers/
│   ├── Customer/       # Storefront: catalog, cart, checkout
│   └── Admin.php       # Admin dashboard
├── Models/              # ProductModel, CartModel, ProductImageModel, etc.
├── Views/
│   ├── customer/        # Product listing, product detail, cart/checkout
│   └── admin/            # Dashboard views
└── Config/
    └── Routes.php       # Route definitions & auth filters
```

## 🔒 Key Implementation Notes

- Routes are grouped by role (`user`, `admin`) and protected with `session` and `group:*` filters via CodeIgniter Shield.
- Cart quantity updates and item deletion use isolated per-item `<form>` submissions (kept separate from the checkout form) to avoid invalid nested-HTML forms and keep each action independently submittable.
- Delivery coordinates are captured via Leaflet's draggable marker and reverse-geocoded client-side through Nominatim's free API for a human-readable address.

## 📄 License

This project is open-sourced under the [MIT license](LICENSE).

## 👤 Author

**KARL ANGELO C. CURIANO**