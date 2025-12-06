# 📘 BookingRuangan – Room Booking System (Laravel + Breeze)

Aplikasi manajemen pemesanan ruangan dengan autentikasi berbasis Laravel Breeze, mendukung dua role utama: **Admin** dan **User**. Admin dapat mengelola ruangan serta menyetujui/menolak booking, sedangkan User dapat melakukan booking dan melihat statusnya.

---

## 🚀 Fitur Utama

### 🔐 Autentikasi (Laravel Breeze)
- Login & Register User  
- Login Admin  
- Reset password  
- Middleware Role  

### 👨‍💼 Admin
- CRUD Ruangan  
- Melihat daftar booking  
- Menyetujui (Approved)  
- Menolak (Rejected)  
- Dashboard manajemen ruangan & booking  

### 👤 User
- Melihat semua ruangan  
- Booking ruangan  
- Status booking: Pending / Approved / Rejected  
- Riwayat booking  

---

## 📂 Struktur Proyek

📦BookingRuangan
┣ 📂app
┃ ┣ 📂Http
┃ ┃ ┣ 📂Controllers
┃ ┃ ┣ 📂Middleware
┃ ┃ ┗ 📂Requests
┃ ┣ 📂Models
┃ ┗ 📂View/Components
┣ 📂database
┃ ┣ 📂migrations
┃ ┗ 📂seeders
┣ 📂resources/views
┃ ┣ 📂admin
┃ ┣ 📂user
┃ ┣ 📂auth
┃ ┣ 📂layouts
┃ ┗ 📜welcome.blade.php
┣ 📂routes
┃ ┣ 📜web.php
┃ ┗ 📜auth.php
┗ ...


---

## 🛠️ Teknologi yang Digunakan
- Laravel 10+
- Laravel Breeze  
- MySQL / MariaDB  
- TailwindCSS  
- Vite  

---

## ⚙️ Instalasi & Setup

### 1️⃣ Clone Project

git clone https://github.com/username/BookingRuangan.git
cd BookingRuangan

### 2️⃣ Install Dependensi
composer install
npm install

### 3️⃣ Copy Environment
cp .env.example .env


Sesuaikan database:

DB_DATABASE=booking_ruangan
DB_USERNAME=root
DB_PASSWORD=

### 4️⃣ Generate Key
php artisan key:generate

### 5️⃣ Migrasi Database
php artisan migrate


### Menjalankan seeder admin (opsional):

php artisan db:seed

### 6️⃣ Jalankan Server
php artisan serve
npm run dev

