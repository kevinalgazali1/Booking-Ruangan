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

- 📦BookingRuangan
-  ┣ 📂app
-  ┃ ┣ 📂Http
-  ┃ ┃ ┣ 📂Controllers
-  ┃ ┃ ┃ ┣ 📂Auth
-  ┃ ┃ ┃ ┃ ┣ 📜AuthenticatedSessionController.php
-  ┃ ┃ ┃ ┃ ┣ 📜ConfirmablePasswordController.php
-  ┃ ┃ ┃ ┃ ┣ 📜EmailVerificationNotificationController.php
-  ┃ ┃ ┃ ┃ ┣ 📜EmailVerificationPromptController.php
-  ┃ ┃ ┃ ┃ ┣ 📜NewPasswordController.php
-  ┃ ┃ ┃ ┃ ┣ 📜PasswordController.php
-  ┃ ┃ ┃ ┃ ┣ 📜PasswordResetLinkController.php
-  ┃ ┃ ┃ ┃ ┣ 📜RegisteredUserController.php
-  ┃ ┃ ┃ ┃ ┗ 📜VerifyEmailController.php
-  ┃ ┃ ┃ ┣ 📜AdminController.php
-  ┃ ┃ ┃ ┣ 📜Controller.php
-  ┃ ┃ ┃ ┣ 📜ProfileController.php
-  ┃ ┃ ┃ ┣ 📜RoomController.php
-  ┃ ┃ ┃ ┗ 📜UserController.php
-  ┃ ┃ ┣ 📂Middleware
-  ┃ ┃ ┃ ┗ 📜Role.php
-  ┃ ┃ ┗ 📂Requests
-  ┃ ┃ ┃ ┣ 📂Auth
-  ┃ ┃ ┃ ┃ ┗ 📜LoginRequest.php
-  ┃ ┃ ┃ ┗ 📜ProfileUpdateRequest.php
-  ┃ ┣ 📂Models
-  ┃ ┃ ┣ 📜Booking.php
-  ┃ ┃ ┣ 📜Room.php
-  ┃ ┃ ┗ 📜User.php
-  ┃ ┣ 📂Providers
-  ┃ ┃ ┗ 📜AppServiceProvider.php
-  ┃ ┗ 📂View
-  ┃ ┃ ┗ 📂Components
-  ┃ ┃ ┃ ┣ 📜AppLayout.php
-  ┃ ┃ ┃ ┗ 📜GuestLayout.php
-  ┣ 📂bootstrap
-  ┃ ┣ 📂cache
-  ┃ ┃ ┗ 📜.gitignore
-  ┃ ┣ 📜app.php
-  ┃ ┗ 📜providers.php
-  ┣ 📂config
-  ┃ ┣ 📜app.php
-  ┃ ┣ 📜auth.php
-  ┃ ┣ 📜cache.php
-  ┃ ┣ 📜database.php
-  ┃ ┣ 📜filesystems.php
-  ┃ ┣ 📜logging.php
-  ┃ ┣ 📜mail.php
-  ┃ ┣ 📜queue.php
-  ┃ ┣ 📜services.php
-  ┃ ┗ 📜session.php
-  ┣ 📂database
-  ┃ ┣ 📂factories
-  ┃ ┃ ┗ 📜UserFactory.php
-  ┃ ┣ 📂migrations
-  ┃ ┃ ┣ 📜0001_01_01_000000_create_users_table.php
-  ┃ ┃ ┣ 📜0001_01_01_000001_create_cache_table.php
-  ┃ ┃ ┣ 📜0001_01_01_000002_create_jobs_table.php
-  ┃ ┃ ┣ 📜2025_12_01_061112_create_rooms_table.php
-  ┃ ┃ ┗ 📜2025_12_01_061127_create_bookings_table.php
-  ┃ ┣ 📂seeders
-  ┃ ┃ ┗ 📜DatabaseSeeder.php
-  ┃ ┗ 📜.gitignore
-  ┣ 📂public
-  ┃ ┣ 📜.htaccess
-  ┃ ┣ 📜favicon.ico
-  ┃ ┣ 📜index.php
-  ┃ ┗ 📜robots.txt
-  ┣ 📂resources
-  ┃ ┣ 📂css
-  ┃ ┃ ┗ 📜app.css
-  ┃ ┣ 📂js
-  ┃ ┃ ┣ 📜app.js
-  ┃ ┃ ┗ 📜bootstrap.js
-  ┃ ┗ 📂views
-  ┃ ┃ ┣ 📂admin
-  ┃ ┃ ┃ ┣ 📜booking.blade.php
-  ┃ ┃ ┃ ┗ 📜dashboard.blade.php
-  ┃ ┃ ┣ 📂auth
-  ┃ ┃ ┃ ┣ 📜confirm-password.blade.php
-  ┃ ┃ ┃ ┣ 📜forgot-password.blade.php
-  ┃ ┃ ┃ ┣ 📜login.blade.php
-  ┃ ┃ ┃ ┣ 📜register.blade.php
-  ┃ ┃ ┃ ┣ 📜reset-password.blade.php
-  ┃ ┃ ┃ ┗ 📜verify-email.blade.php
-  ┃ ┃ ┣ 📂components
-  ┃ ┃ ┃ ┣ 📜application-logo.blade.php
-  ┃ ┃ ┃ ┣ 📜auth-session-status.blade.php
-  ┃ ┃ ┃ ┣ 📜danger-button.blade.php
-  ┃ ┃ ┃ ┣ 📜dropdown-link.blade.php
-  ┃ ┃ ┃ ┣ 📜dropdown.blade.php
-  ┃ ┃ ┃ ┣ 📜input-error.blade.php
-  ┃ ┃ ┃ ┣ 📜input-label.blade.php
-  ┃ ┃ ┃ ┣ 📜modal.blade.php
-  ┃ ┃ ┃ ┣ 📜nav-link.blade.php
-  ┃ ┃ ┃ ┣ 📜primary-button.blade.php
-  ┃ ┃ ┃ ┣ 📜responsive-nav-link.blade.php
-  ┃ ┃ ┃ ┣ 📜secondary-button.blade.php
-  ┃ ┃ ┃ ┗ 📜text-input.blade.php
-  ┃ ┃ ┣ 📂layouts
-  ┃ ┃ ┃ ┣ 📜app.blade.php
-  ┃ ┃ ┃ ┣ 📜guest.blade.php
-  ┃ ┃ ┃ ┗ 📜navigation.blade.php
-  ┃ ┃ ┣ 📂profile
-  ┃ ┃ ┃ ┣ 📂partials
-  ┃ ┃ ┃ ┃ ┣ 📜delete-user-form.blade.php
-  ┃ ┃ ┃ ┃ ┣ 📜update-password-form.blade.php
-  ┃ ┃ ┃ ┃ ┗ 📜update-profile-information-form.blade.php
-  ┃ ┃ ┃ ┗ 📜edit.blade.php
-  ┃ ┃ ┣ 📂user
-  ┃ ┃ ┃ ┣ 📜booking.blade.php
-  ┃ ┃ ┃ ┗ 📜dashboard.blade.php
-  ┃ ┃ ┗ 📜welcome.blade.php
-  ┣ 📂routes
-  ┃ ┣ 📜auth.php
-  ┃ ┣ 📜console.php
-  ┃ ┗ 📜web.php
-  ┣ 📂storage
-  ┃ ┣ 📂app
-  ┃ ┃ ┣ 📂private
-  ┃ ┃ ┃ ┗ 📜.gitignore
-  ┃ ┃ ┣ 📂public
-  ┃ ┃ ┃ ┗ 📜.gitignore
-  ┃ ┃ ┗ 📜.gitignore
-  ┃ ┣ 📂framework
-  ┃ ┃ ┣ 📂cache
-  ┃ ┃ ┃ ┣ 📂data
-  ┃ ┃ ┃ ┃ ┗ 📜.gitignore
-  ┃ ┃ ┃ ┗ 📜.gitignore
-  ┃ ┃ ┣ 📂sessions
-  ┃ ┃ ┃ ┗ 📜.gitignore
-  ┃ ┃ ┣ 📂testing
-  ┃ ┃ ┃ ┗ 📜.gitignore
-  ┃ ┃ ┣ 📂views
-  ┃ ┃ ┃ ┗ 📜.gitignore
-  ┃ ┃ ┗ 📜.gitignore
-  ┃ ┗ 📂logs
-  ┃ ┃ ┗ 📜.gitignore
-  ┣ 📂tests
-  ┃ ┣ 📂Feature
-  ┃ ┃ ┣ 📂Auth
-  ┃ ┃ ┃ ┣ 📜AuthenticationTest.php
-  ┃ ┃ ┃ ┣ 📜EmailVerificationTest.php
-  ┃ ┃ ┃ ┣ 📜PasswordConfirmationTest.php
-  ┃ ┃ ┃ ┣ 📜PasswordResetTest.php
-  ┃ ┃ ┃ ┣ 📜PasswordUpdateTest.php
-  ┃ ┃ ┃ ┗ 📜RegistrationTest.php
-  ┃ ┃ ┣ 📜ExampleTest.php
-  ┃ ┃ ┗ 📜ProfileTest.php
-  ┃ ┣ 📂Unit
-  ┃ ┃ ┗ 📜ExampleTest.php
-  ┃ ┗ 📜TestCase.php
-  ┣ 📜.editorconfig
-  ┣ 📜.env.example
-  ┣ 📜.gitattributes
-  ┣ 📜.gitignore
-  ┣ 📜artisan
-  ┣ 📜composer.json
-  ┣ 📜composer.lock
-  ┣ 📜package-lock.json
-  ┣ 📜package.json
-  ┣ 📜phpunit.xml
-  ┣ 📜postcss.config.js
-  ┣ 📜README.md
-  ┣ 📜tailwind.config.js
-  ┗ 📜vite.config.js

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

- git clone https://github.com/username/BookingRuangan.git
- cd BookingRuangan

### 2️⃣ Install Dependensi
- composer install
- npm install

### 3️⃣ Copy Environment
- cp .env.example .env


- Sesuaikan database:

- DB_DATABASE=booking_ruangan
- DB_USERNAME=root
- DB_PASSWORD=

### 4️⃣ Generate Key
- php artisan key:generate

### 5️⃣ Migrasi Database
- php artisan migrate


### Menjalankan seeder admin (opsional):

- php artisan db:seed

### 6️⃣ Jalankan Server
- php artisan serve
- npm run dev

