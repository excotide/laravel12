# Laravel 12 - Pembelajaran Semester 4

## 📚 Deskripsi
Repository ini berisi materi dan proyek pembelajaran Laravel versi 12 untuk mata kuliah di Semester 4. Laravel adalah framework PHP yang powerful dan elegant untuk membangun aplikasi web modern dengan arsitektur MVC (Model-View-Controller).

## 🎯 Tujuan Pembelajaran
- Memahami konsep dasar framework Laravel
- Menguasai routing, controller, dan views
- Belajar Eloquent ORM untuk database management
- Implementasi authentication dan authorization
- Membangun CRUD (Create, Read, Update, Delete) operations
- Menerapkan best practices dalam pengembangan web dengan Laravel

## 🛠️ Teknologi yang Digunakan
- **Laravel 12** - PHP Framework
- **PHP 8.3+** - Programming Language
- **MySQL/PostgreSQL** - Database
- **Composer** - Dependency Manager
- **Blade** - Templating Engine

## 📋 Prasyarat
Sebelum memulai, pastikan Anda telah menginstall:
- PHP >= 8.3
- Composer
- MySQL atau PostgreSQL
- Node.js & NPM (untuk asset compilation)

## 🚀 Instalasi

1. Clone repository ini
```bash
git clone https://github.com/excotide/laravel12.git
cd laravel12
```

2. Install dependencies
```bash
composer install
npm install
```

3. Copy file environment
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Konfigurasi database di file `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

6. Jalankan migrasi database
```bash
php artisan migrate
```

7. Jalankan aplikasi
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 📖 Materi yang Dipelajari
- [ ] Introduction to Laravel
- [ ] Routing & Controllers
- [ ] Blade Templating
- [ ] Database & Migrations
- [ ] Eloquent ORM
- [ ] Form Handling & Validation
- [ ] Authentication
- [ ] Authorization & Policies
- [ ] File Upload
- [ ] RESTful API

## 👨‍💻 Penulis
**excotide**

## 📝 Lisensi
Project ini dibuat untuk keperluan pembelajaran di Semester 4.

---
⭐ Jangan lupa untuk star repository ini jika bermanfaat!
