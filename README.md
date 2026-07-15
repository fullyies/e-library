# 📚 E-Library — Sistem Informasi Perpustakaan Digital

Aplikasi manajemen perpustakaan berbasis web untuk mengelola data buku, kategori, anggota, serta transaksi peminjaman dan pengembalian buku secara digital.

Tugas Mata Kuliah **Pemrograman Web Lanjut**
**Kelompok 6**

---

## 👥 Anggota Kelompok

| Peran | Nama | NPM |
|---|---|---|
| Frontend | Ahmad Rafi | |
| Frontend | M. Fadhil Aufa Abdilah | |
| Backend | Reihan Saputra | |
| Fullstack | Nur Ihsan Habibi | 1062521 |

---

## 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi |
|---|---|
| Bahasa Pemrograman | PHP 8.3 |
| Framework Backend | Laravel 13 |
| Templating | Blade |
| Styling | Bootstrap 5, Font Awesome |
| Build Tool Frontend | Vite, Tailwind CSS |
| Database | SQLite (default) — bisa diganti MySQL |
| Autentikasi | Laravel Auth (session-based, login dengan username) |
| Package Manager | Composer (PHP), NPM (JS/CSS) |

---

## ✨ Fitur Utama

**Untuk Admin:**
- Login khusus admin
- Kelola data buku (tambah, edit, hapus, lihat) — kode buku otomatis
- Kelola kategori buku
- Kelola data anggota (user)
- Kelola transaksi peminjaman (buat peminjaman baru, tambah/hapus buku dalam peminjaman, proses pengembalian)
- Melihat seluruh riwayat peminjaman semua anggota

**Untuk Anggota (User):**
- Login sebagai anggota
- Melihat daftar buku yang tersedia
- Melihat riwayat peminjaman miliknya sendiri

**Hak akses** diatur menggunakan Middleware (`AdminMiddleware` & `AnggotaMiddleware`), sehingga anggota tidak bisa mengakses halaman khusus admin (kategori, kelola buku, kelola peminjaman, kelola user), dan sebaliknya.

---

## 📂 Struktur Modul

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php          # Login & logout
│   │   ├── DashboardController.php     # Dashboard (statistik & buku terbaru)
│   │   ├── BukuController.php          # CRUD data buku
│   │   ├── KategoriController.php      # CRUD kategori
│   │   ├── UserController.php          # CRUD anggota (admin)
│   │   ├── PeminjamanController.php    # Transaksi peminjaman & pengembalian
│   │   └── DetailPeminjamanController.php # Detail buku dalam 1 peminjaman
│   └── Middleware/
│       ├── AdminMiddleware.php
│       └── AnggotaMiddleware.php
├── Models/
│   ├── User.php
│   ├── Buku.php
│   ├── Kategori.php
│   ├── Peminjaman.php
│   └── DetailPeminjaman.php
resources/views/                        # Blade templates (buku, kategori, peminjaman, user, dashboard, auth, layout)
database/
├── migrations/                         # Struktur tabel: users, kategori, buku, peminjaman, detail_peminjaman
└── seeders/                            # Data awal (kategori, buku, & akun demo)
```

---

## 🚀 Cara Menjalankan Project

### 1. Persyaratan (Requirements)

Pastikan sudah terinstall di komputer:
- **PHP** ≥ 8.3
- **Composer**
- **Node.js** & **NPM**
- Git (opsional, untuk clone repository)

### 2. Clone / Extract Project

```bash
git clone <url-repository-ini>
cd e-library
```

### 3. Install Dependency PHP

```bash
composer install
```

### 4. Install Dependency JavaScript

```bash
npm install
```

### 5. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Lalu generate application key:

```bash
php artisan key:generate
```

> Secara default, project ini menggunakan **SQLite** (`DB_CONNECTION=sqlite`) supaya tidak perlu setup database server tambahan. Jika ingin memakai MySQL, ubah bagian `DB_*` di file `.env` sesuai konfigurasi database masing-masing, lalu sesuaikan juga `config/database.php` bila perlu.

Jika memakai SQLite, buat dulu file databasenya (jika belum ada):

```bash
touch database/database.sqlite
```

### 6. Migrasi & Isi Data Awal (Seeder)

```bash
php artisan migrate --seed
```

Perintah ini akan membuat seluruh tabel (`users`, `kategori`, `buku`, `peminjaman`, `detail_peminjaman`) sekaligus mengisi data awal:
- Data kategori & buku contoh
- Akun login demo (lihat tabel di bawah)

### 7. Build Asset Frontend

Untuk mode pengembangan (development):

```bash
npm run dev
```

Untuk build production:

```bash
npm run build
```

### 8. Jalankan Server Laravel

```bash
php artisan serve
```

Buka browser dan akses:

```
http://127.0.0.1:8000
```

> 💡 Tips: Jalankan `php artisan serve` dan `npm run dev` di dua terminal terpisah secara bersamaan saat development, agar perubahan CSS/JS langsung ter-reload.

---

## 🔑 Akun Login Demo (Hasil Seeder)

Login menggunakan **username**, bukan email.

| Role | Username | Password |
|---|---|---|
| Admin | `admin` | `admin123` |
| Anggota | `farhan` | `farhan123` |
| Anggota | `budi` | `budi123` |

---

## 🗃️ Struktur Database (Ringkas)

- **users** — data akun (admin/anggota), dengan kolom `username` dan `role`
- **kategori** — kategori/genre buku
- **buku** — data buku (kode, judul, penulis, penerbit, tahun terbit, stok), relasi ke kategori
- **peminjaman** — transaksi peminjaman (kode pinjam, anggota, tanggal pinjam/kembali, status)
- **detail_peminjaman** — daftar buku beserta jumlah dalam satu transaksi peminjaman

---

## 📌 Catatan

- Pastikan folder `storage` dan `bootstrap/cache` memiliki izin tulis (write permission) jika di-deploy ke server Linux.
- Jika ada error terkait cache konfigurasi setelah mengubah `.env`, jalankan:
  ```bash
  php artisan config:clear
  php artisan cache:clear
  ```
