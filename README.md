# 📘 RoomHub – Room Booking System (Laravel + Breeze)

Aplikasi manajemen pemesanan ruangan dengan autentikasi berbasis Laravel Breeze, mendukung dua role utama: **Admin** dan **User**. Admin dapat mengelola ruangan serta menyetujui/menolak booking, sedangkan User dapat melakukan booking dan melihat statusnya.

---

## 🚀 Fitur Utama

### 🔐 Autentikasi (Laravel Breeze)
- Login & Register User  
- Login Admin  

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

# 📘 Panduan Pengguna – Aplikasi BookingRuangan

Dokumentasi ini memberikan langkah-demi-langkah cara menggunakan aplikasi **BookingRuangan**, baik untuk **User** maupun **Admin**. Aplikasi ini dibangun menggunakan Laravel Breeze sebagai sistem autentikasi.

---

## 🔐 1. Autentikasi

### 1.1 Login sebagai User
1. Buka halaman utama aplikasi.
2. Klik tombol **Login**.
3. Masukkan **email** dan **password** yang telah terdaftar.
4. Klik **Login**.
5. Jika berhasil, Anda akan diarahkan ke dashboard User.

### 1.2 Registrasi User Baru
1. Pada halaman login, klik **Register**.
2. Isi data diri seperti nama, email, dan password.
3. Tekan tombol **Register**.
4. Setelah berhasil mendaftar, Anda dapat login sebagai User.

### 1.3 Login sebagai Admin
1. Akses halaman login Admin (biasanya memiliki URL khusus).
2. Masukkan kredensial Admin.
3. Klik **Login**.
4. Admin akan diarahkan ke dashboard manajemen.

---

## 👤 2. Panduan Untuk User

### 2.1 Melihat Daftar Ruangan
1. Setelah login, buka menu **Ruangan**.
2. Semua ruangan akan ditampilkan lengkap dengan nama, kapasitas, dan ketersediaan.

### 2.2 Membuat Booking Ruangan
1. Pilih ruangan yang ingin digunakan.
2. Klik **Booking** atau **Pesan Ruangan**.
3. Isi form booking (tanggal, waktu, keperluan, dan informasi lainnya).
4. Tekan tombol **Submit**.
5. Status booking awalnya akan menjadi **Pending**.

### 2.3 Melihat Status Booking
1. Buka menu **Status Booking / My Booking**.
2. Setiap booking akan memiliki status:
   - **Pending** → Menunggu persetujuan Admin  
   - **Approved** → Booking disetujui dan ruangan dapat digunakan  
   - **Rejected** → Booking ditolak  

### 2.4 Melihat Riwayat Booking
1. Klik menu **Riwayat**.
2. Anda dapat melihat seluruh booking sebelumnya, lengkap dengan status akhirnya.

---

## 👨‍💼 3. Panduan Untuk Admin

### 3.1 Mengelola Data Ruangan (CRUD)
1. Buka dashboard Admin.
2. Pilih menu **Kelola Ruangan**.
3. Admin dapat:
   - **Menambah Ruangan** → Isi form ruangan dan simpan  
   - **Mengedit Ruangan** → Klik edit pada ruangan yang diinginkan  
   - **Menghapus Ruangan** → Klik tombol hapus  
   - **Melihat seluruh data ruangan**

### 3.2 Melihat Daftar Booking
1. Pilih menu **Daftar Booking**.
2. Admin dapat melihat semua booking dari seluruh user, lengkap dengan status dan detail pemesanan.

### 3.3 Menyetujui Booking (Approved)
1. Buka daftar booking.
2. Klik booking yang ingin disetujui.
3. Tekan tombol **Approve / Setujui**.
4. Status booking user akan berubah menjadi **Approved**.

### 3.4 Menolak Booking (Rejected)
1. Pilih booking tertentu.
2. Klik **Reject / Tolak**.
3. Booking akan dipindahkan ke status **Rejected**.

### 3.5 Dashboard Manajemen
1. Pada halaman dashboard, Admin dapat melihat:
   - Statistik jumlah ruangan
   - Statistik booking (Pending/Approved/Rejected)
   - Aktivitas terbaru
2. Dashboard membantu Admin memantau seluruh aktivitas sistem secara ringkas.

---

## 🎯 4. Tips Penggunaan
- Pastikan data booking diisi dengan benar agar peluang disetujui lebih tinggi.
- Untuk Admin, periksa jadwal dan ketersediaan sebelum menyetujui booking.
- Gunakan fitur riwayat untuk memantau penggunaan ruangan dari waktu ke waktu.

---
