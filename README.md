🎓 PPDB Online

«Sistem Penerimaan Peserta Didik Baru (PPDB) berbasis web yang dibangun menggunakan Laravel 13, PostgreSQL, dan Tailwind CSS. Aplikasi ini membantu proses penerimaan siswa baru secara digital mulai dari pendaftaran, verifikasi dokumen, seleksi berdasarkan jalur, hingga pengumuman hasil seleksi.»

---

✨ Fitur

Admin

- Dashboard statistik PPDB
- Manajemen akun panitia
- Manajemen jalur pendaftaran dan kuota
- Monitoring data pendaftar
- Menjalankan proses seleksi berdasarkan kuota
- Melihat hasil seleksi per jalur
- CRUD Pengumuman
- Publish Pengumuman
- Export laporan Excel

Panitia

- Dashboard panitia
- Verifikasi dokumen pendaftar
- Menyetujui atau verifikasi dokumen
- Monitoring proses verifikasi

Siswa

- Login
- Registrasi akun
- Melengkapi biodata
- Upload dokumen persyaratan
- Melihat status verifikasi
- Melihat hasil seleksi
- Melihat pengumuman

---

🛠️ Teknologi

Kategori| Teknologi
Backend| Laravel 13
Bahasa| PHP 8.3+
Frontend| Blade, Tailwind CSS, JavaScript
Database| PostgreSQL
Authentication| Laravel Auth & GitHub OAuth
Library| SweetAlert2, Chart.js, Cloudinary, Maatwebsite/excel
Deployment| Railway + Aiven PostgreSQL

---

🔄 Alur Sistem

Siswa Registrasi
        │
        ▼
Lengkapi Biodata
        │
        ▼
Upload Dokumen
        │
        ▼
Verifikasi Panitia
        │
        ▼
Seleksi Berdasarkan Jalur & Kuota
        │
        ▼
Siswa Mendapatkan Hasil Seleksi

---

📁 Struktur Folder

app
├── Http
│   ├── Controllers
│   │   ├── AdminController.php
│   │   ├── AnnouncementController.php
│   │   ├── AuthController.php
│   │   ├── DocumentController.php
│   │   ├── DocumentController.php
│   │   ├── HomeController.php
│   │   ├── LaporanController.php
│   │   ├── ManajemenController.php
│   │   ├── PanitiaController.php
│   │   ├── SeleksiController.php
│   │   ├── StudentController.php
│   ├── Middleware
│   │   └── RoleMiddleware.php
└── Models
    ├── Announcement.php
    ├── Document.php
    ├── JalurPendaftaran.php
    ├── Registration.php
    ├── Student.php
    └── User.php

database
├── migrations
├── seeders
│   ├── DatabaseSeeder.php
│   ├── JalurPendaftaranSeeder.php
└── factories

resources
├── views
│   ├── admin
│   ├── committee
│   ├── student
│   ├── layouts
│   └── components
├── css
├── js
└── views
    ├── auth
    ├── components
    ├── layout
    ├── partials
    └── public
        ├── admin
        ├── panitia
        └── siswa

routes
├── console.php
└── web.php

---

🗄️ Database

Tabel utama yang digunakan:

- users
- students
- registrations
- documents
- jalur_pendaftarans
- announcements

## Entity Relationship Diagram

![ERD](image/ppdb_db.png)

GitHub akan langsung menampilkan gambar ERD pada halaman repository.

---

🚀 Instalasi

Clone repository

git clone https://github.com/username/ppdb-online.git

Masuk ke folder project

cd ppdb-online

Install dependency

composer install
npm install

Salin file environment

cp .env.example .env

Generate application key

php artisan key:generate

Konfigurasikan database PostgreSQL pada file ".env".

Jalankan migrasi dan seeder

php artisan migrate --seed

Compile asset

npm run dev

Jalankan aplikasi

php artisan serve

---

🌱 Seeder

Seeder yang tersedia:

- DatabaseSeeder
- JalurPendaftaranSeeder

Seeder akan membuat data awal berupa:

- Akun Admin
- Akun Panitia
- Akun Siswa
- Data Jalur Pendaftaran beserta kuota

---

📊 Dashboard

Dashboard menyediakan informasi:

- Statistik jumlah pendaftar
- Statistik verifikasi dokumen
- Statistik hasil seleksi
- Statistik jalur pendaftaran
- Grafik pendaftaran
- Grafik verifikasi
- Grafik hasil seleksi
- Pengumuman terbaru

---

👨‍💻 Developer

Andre Bs

---

📄 Lisensi

Project ini dibuat sebagai media pembelajaran sekaligus implementasi Sistem Penerimaan Peserta Didik Baru (PPDB) berbasis web menggunakan Laravel dengan menerapkan konsep Role-Based Access Control (RBAC), verifikasi dokumen, seleksi berdasarkan kuota, serta pengelolaan pengumuman secara digital.