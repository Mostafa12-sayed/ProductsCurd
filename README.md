# 🧾 Products and categories curd (Laravel 12)

This is a simple Laravel 12 project handles products and categories curd oprations.

---

## 🚀 Installation Steps

### 1️⃣ Clone the project
```bash
- git clone https://github.com/mostafa-sayed12/ProductsCurd.git

- cd ProductsCurd
```
### 2️⃣ Install dependencies
```bash
- composer install

- php artisan key:generate
```

### 3️⃣ Configure the environment file
```bash
cp .env.example .env
```
### 5️⃣ Set up the database
Open the .env file and configure your DB credentials:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=product_curd
DB_USERNAME=root
DB_PASSWORD=
```
### 6️⃣ Run migrations
```bash
php artisan migrate
```
### ▶️ Run the server
```bash
php artisan serve
```
