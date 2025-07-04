# Laravel Admin With Vue.js

A robust, modular admin dashboard and e-commerce backend built with Laravel and Vue.js. This project features a RESTful API, multi-language support, role-based access, and a scalable architecture for managing brands, products, categories, users, orders, and more.

---

## 🏗️ Architecture Overview

- **Backend:** Laravel (PHP), modular structure (`/app`), RESTful API, Passport authentication, role/permission management, event-driven logic
- **Frontend:** Vue.js (see `/resources/js`), SPA admin dashboard, localization, responsive UI
- **Database:** MySQL or SQLite (see `/database`), Eloquent ORM, migrations, seeders, factories
- **Localization:** Multi-language support (Arabic, English, etc.)
- **DevOps:** Artisan CLI, Laravel Scheduler, broadcasting, Docker-ready

---

## ✨ Features

- **User Management:** Registration, login, roles (Admin, Staff, User), permissions, profile, password reset, email verification
- **Product Catalog:** Brands, categories, products, images, multi-language fields, advanced filtering, CRUD
- **Order Management:** Cart, checkout, order history, coupon system, analytics, revenue tracking
- **Content & Settings:** Dynamic content types, settings, notifications, static translations
- **API:** RESTful endpoints for all resources, Passport OAuth2 authentication, API versioning
- **Localization:** Language switching, translation management, RTL/LTR support
- **Admin Dashboard:** Analytics, charts, CRUD for all entities, batch actions, notifications
- **File Uploads:** Image/file upload with organized storage and URL generation
- **Testing:** Factories, seeders, feature and unit tests

---

## 📁 Project Structure

- **/app**: Main Laravel application (Controllers, Models, Services, Middleware, Traits, Providers)
- **/app/Http/Controllers/Api**: RESTful API controllers for all resources (products, users, orders, etc.)
- **/app/Http/Repository**: Data access and filtering logic for each resource
- **/app/Http/Services**: Business logic and file upload handling
- **/app/Http/Requests**: Form validation and request rules
- **/app/Http/Resources**: API resource transformers for consistent JSON responses
- **/app/Models**: Eloquent models for all entities (User, Product, Order, etc.)
- **/app/Traits**: Shared logic (e.g., Translatable for multi-language fields)
- **/database**: Migrations, seeders, factories, SQLite sample DB
- **/resources/js**: Vue.js SPA admin dashboard (not shown here)
- **/routes**: API and web route definitions

---

## 🚀 Getting Started

### Prerequisites
- PHP 7.4+
- Composer
- Node.js & npm (for frontend)
- MySQL or SQLite

### Installation
1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and set your DB credentials
4. Run `php artisan key:generate`
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. (Optional) Install Passport for API authentication:
   ```bash
   php artisan passport:install
   ```
7. Install frontend dependencies and build assets:
   ```bash
   cd resources/js
   npm install
   npm run dev
   ```
8. Start the Laravel server:
   ```bash
   php artisan serve
   ```

---

## 🛡️ Security & Auth
- OAuth2 via Laravel Passport
- Role-based access control (Spatie/Entrust)
- CSRF/XSS protection, HTTPS middleware

---

## 🌍 Localization
- Switch languages via API or UI
- All major entities (products, brands, categories) support multi-language fields
- RTL/LTR support for Arabic/English

---

## 🧩 Extensibility
- Modular code: add new resources easily (e.g., new content types, settings)
- Event-driven: supports broadcasting, notifications, and scheduled tasks

---

## 🤝 Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

---

## 📄 License
[MIT](LICENSE)
