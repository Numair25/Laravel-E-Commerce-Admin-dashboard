# 🛒 Laravel E-Commerce Admin Dashboard

Welcome to the **Laravel E-Commerce Admin Dashboard**, a powerful, open-source solution for managing e-commerce operations.

Built on the **Laravel framework**, this admin panel provides a seamless interface for handling products, orders, and analytics.

Paired with a responsive public-facing website for customers.

Optimized for performance and SEO — ideal for developers and businesses building scalable online stores.

---

## 📚 Table of Contents

- [Key Features](#key-features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage Instructions](#usage-instructions)
- [Customization and Best Practices](#customization-and-best-practices)
- [Contributing](#contributing)
- [License](#license)

---

## 🚀 Key Features

### 🔐 Admin Panel Features

- **Secure Authentication:** Powered by Laravel Breeze with session-based login, CSRF protection, and secure logout.  
  - Default admin credentials:  
    - **Email:** `admin@ecommerce.com`  
    - **Password:** `Admin@12345`

- **Dashboard Analytics:**  
  Displays real-time metrics (sales, recent products, order status) using Blade templates and Eloquent queries.  
  - Controller: `app/Http/Controllers/DashboardController.php`

- **Product Management:**  
  - Full CRUD operations for products  
  - Attributes: `name`, `price`, `description`, `stock`  
  - Image uploads via **Spatie Media Library**  
  - Model: `app/Models/Product.php`

- **Category Management:**  
  Organize products into hierarchical categories.  
  - Model: `app/Models/Category.php`

- **Order Processing:**  
  Manage orders, update status (e.g., *pending*, *shipped*), view customer details.  
  - Controller: `app/Http/Controllers/OrderController.php`

- **SEO Tools:**  
  - Dynamic meta tags  
  - Slugs via **Spatie Laravel Sluggable**  
  - Sitemap generation for SEO visibility  
  - Config: `config/seo.php`

- **Media Handling:**  
  Multiple image uploads, previews, and optimization using **Intervention Image** and **Spatie Media Library**.  
  - Controller: `app/Http/Controllers/MediaController.php`

- **Visibility Controls:**  
  Toggle product visibility (publish/unpublish).

---

### 🌐 Public Website Features

- **Responsive Design:**  
  Built with **Tailwind CSS** and **Blade templates** for mobile-friendly layouts.  
  - Views: `resources/views/public`

- **Product Listings:**  
  Filterable and searchable product pages with sorting by price or category.  
  - Livewire component: `app/Http/Livewire/ProductList.php` *(optional)*

- **Product Details:**  
  Image galleries and related products.  
  - View: `resources/views/public/product/show.blade.php`

- **Custom Pages:**  
  Contact form and About page for enhanced engagement.  
  - Routes: `routes/web.php`

---

## ⚙️ Technologies Used

### 🧠 Backend

- **Laravel 10.x:** MVC architecture, routing, and Eloquent ORM (`app/`, `routes/`)
- **PHP 8.2+**
- **Laravel Breeze:** Authentication scaffolding
- **Spatie Laravel Sluggable:** SEO-friendly URLs
- **Spatie Media Library:** Image management
- **Intervention Image:** Image processing and optimization

### 🎨 Frontend

- **Tailwind CSS:** Responsive, modern UI (`resources/css/`)
- **Blade Templates:** Dynamic views (`resources/views/`)
- **Vite:** Efficient JS/CSS bundling (`vite.config.js`)

### 🗄️ Database

- **MySQL / SQLite:** Data storage (`database/migrations/`)
- **Eloquent ORM:** Simplified database interaction (`app/Models/`)

### 🧰 Development Tools

- **Composer:** PHP dependency management
- **Node.js / NPM:** Frontend dependency and build management
- **Git:** Version control

### 🧩 Optional Enhancements

- **Laravel Livewire:** Real-time components  
- **Redis:** Caching and performance boost (`config/cache.php`)

---

## 🛠️ Installation

### 🧾 Prerequisites

- PHP `8.2+`
- Composer
- Node.js
- MySQL / SQLite
- Web server (Apache / Nginx)

---

## ⚡ Step-by-Step Installation

1. **Clone the Repository**

    ```bash
    git clone https://github.com/Numair25/Laravel-E-Commerce-Admin-dashboard.git
    cd Laravel-E-Commerce-Admin-dashboard
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Configure Environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Update your `.env` file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ecommerce
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4. **Run Migrations and Seeders**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

    Default Admin Account:  
    - **Email:** `admin@ecommerce.com`  
    - **Password:** `Admin@12345`

5. **Compile Assets**

    ```bash
    npm run dev
    ```

    For production:

    ```bash
    npm run build
    ```

6. **Start the Server**

    ```bash
    php artisan serve
    ```

    - Admin Panel: [http://localhost:8000/admin](http://localhost:8000/admin)  
    - Public Site: [http://localhost:8000](http://localhost:8000)

7. **Production Setup**

    ```bash
    php artisan config:cache
    chmod -R 775 storage bootstrap/cache
    ```
---

### 🧩 Post-Installation Setup

* ✅ **Verify Admin Access:**
  Visit `/admin/login` and log in with the default credentials.

* 🔍 **Test Public Site:**
  Visit `/` to check product listings and Tailwind styling.

* ⚙️ **Configure SEO Settings:**
  Update via `/admin/seo` or `config/seo.php`.

* 📧 **Set Up Email Notifications:**
  Configure in `.env`:

  ```
  MAIL_MAILER=smtp
  MAIL_HOST=smtp.example.com
  MAIL_PORT=587
  MAIL_USERNAME=you@example.com
  MAIL_PASSWORD=yourpassword
  MAIL_ENCRYPTION=tls
  ```

* 🧪 **Run Tests:**

  ```bash
  php artisan test
  ```

* ⚡ **Optimize for Production:**

  ```bash
  php artisan optimize
  ```

---

### 🧯 Troubleshooting

* **Database Errors:**
  Check `.env` credentials and permissions.

* **Asset Issues:**

  ```bash
  php artisan cache:clear
  npm run dev
  ```

* **Login Problems:**
  Verify admin credentials via:

  ```bash
  php artisan tinker
  ```

---

## 🧭 Usage Instructions

### 🛡️ Admin Panel

* **Login:** `/admin/login`
* **Dashboard:** Real-time analytics view — `resources/views/admin/dashboard.blade.php`
* **Manage Products:** `/admin/products`
* **Manage Orders:** `/admin/orders`
* **SEO Settings:** `/admin/seo`

### 🛍️ Public Website

* Browse Products: `/products`
* Search/Filter: Available via product list
* Contact Page: `/contact`

---

## 🔧 Customization and Best Practices

* **Security:**

  * Use `Laravel Sanctum` for API authentication
  * Use `spatie/laravel-permission` for role management

* **Performance:**

  * Enable Redis caching
  * Use `Laravel Scout` for search

* **SEO:**

  * Generate sitemap

    ```bash
    php artisan sitemap:generate
    ```

* **Scalability:**

  * Deploy on **Laravel Vapor**
  * Use microservices for high traffic

* **UI Enhancements:**

  * Add **Livewire**:

    ```bash
    composer require livewire/livewire
    ```
  * Integrate **Filament** for modern admin UI

* **Error Logs:**
  Check logs in:

  ```
  storage/logs/laravel.log
  ```

* **Stay Updated:**

  ```bash
  composer update
  git pull
  ```

---

## 🤝 Contributing

1. **Fork the Repository**
2. **Create a Feature Branch**

   ```bash
   git checkout -b feature-name
   ```
3. **Commit Changes**

   ```bash
   git commit -m "Add new feature"
   ```
4. **Push to Branch**

   ```bash
   git push origin feature-name
   ```
5. **Submit a Pull Request**

* Report issues or request features via **GitHub Issues**.

---

## 📜 License

This project is licensed under the **MIT License**.
See the [LICENSE](LICENSE) file for details.
