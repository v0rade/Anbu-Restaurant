# ANBU — Website Restoran & Sistem Pemesanan Makanan Online (IF330)

<p align="center">
  <img src="uploaded_img/anbu-1.png" alt="ANBU Restaurant Logo" width="160" height="auto" />
</p>

<p align="center">
  <strong>Website Restoran & Online Food Ordering System</strong><br />
  Aplikasi pemesanan makanan berbasis web yang interaktif, responsif, dan dinamis, dikembangkan menggunakan PHP Native dan basis data MySQL.
</p>

<p align="center">
  <a href="https://anburestaurant.infinityfree.me/home.php">
    <img src="https://img.shields.io/badge/Live%20Demo-Online-brightgreen?style=for-the-badge&logo=google-chrome" alt="Live Demo" />
  </a>
  <img src="https://img.shields.io/badge/PHP-7.4%20%7C%208.x-777BB4?style=for-the-badge&logo=php" alt="PHP Native" />
  <img src="https://img.shields.io/badge/Database-MySQL%20%2F%20MariaDB-4479A1?style=for-the-badge&logo=mysql" alt="MySQL" />
  <img src="https://img.shields.io/badge/Frontend-HTML5%20%7C%20CSS3%20%7C%20JS-E34F26?style=for-the-badge&logo=html5" alt="Frontend" />
  <img src="https://img.shields.io/badge/Web%20Server-Apache%20%2F%20XAMPP-F3702A?style=for-the-badge&logo=apache" alt="Apache" />
</p>

---

## 🌐 Live Demo Aplikasi

Aplikasi telah berhasil di-deploy dan dapat diakses secara langsung melalui tautan berikut:

* 🍽️ **Halaman Utama Pelanggan:** [https://anburestaurant.infinityfree.me/home.php](https://anburestaurant.infinityfree.me/home.php)
* 🔐 **Halaman Login Admin:** [https://anburestaurant.infinityfree.me/admin/admin_login.php](https://anburestaurant.infinityfree.me/admin/admin_login.php)

---

## 🔑 Kredensial Default Akun Admin

Untuk menguji fitur manajemen restoran di panel admin:

| Parameter | Kredensial |
| :--- | :--- |
| **URL Login** | `https://anburestaurant.infinityfree.me/admin/admin_login.php` |
| **Username** | `admin` |
| **Password** | `111` |

---

## 📑 Daftar Isi

- [Fitur Utama](#-fitur-utama)
  - [1. Area Pelanggan (Customer Area)](#1-area-pelanggan-customer-area)
  - [2. Panel Admin Restoran (Admin Dashboard)](#2-panel-admin-restoran-admin-dashboard)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Skema Database SQL (`anbu.sql`)](#-skema-database-sql-anbusql)
- [Panduan Menjalankan di Komputer Lokal (XAMPP / Laragon)](#-panduan-menjalankan-di-komputer-lokal-xampp--laragon)
- [Panduan Konfigurasi di Hosting (InfinityFree / cPanel)](#-panduan-konfigurasi-di-hosting-infinityfree--cpanel)
- [Struktur Direktori Proyek](#-struktur-direktori-proyek)

---

## 🚀 Fitur Utama

### 1. Area Pelanggan (Customer Area)
* **Beranda Interaktif (`home.php`):**
  - Banner promosi dengan slider hidangan unggulan.
  - Pilihan kategori menu cepat (*Dishes, Fast Food, Drinks, Desserts*).
  - Tampilan 6 produk terpopuler dengan harga dan tombol pesan instan.
  - Infografis 3 tahapan pemesanan mudah (*Choose Food $\rightarrow$ Fast Delivery $\rightarrow$ Enjoy*).
* **Katalog & Filter Menu (`menu.php`):**
  - Menampilkan seluruh varian hidangan dan minuman dengan foto berkualitas.
  - Filter otomatis berdasarkan kategori makanan.
  - Penambahan produk ke keranjang belanja (*Add to Cart*) beserta pemilihan jumlah porsi (*quantity*).
* **Keranjang Belanja (*Shopping Cart*) (`cart.php`):**
  - Menampilkan daftar hidangan yang dipilih, harga per porsi, dan subtotal harga.
  - Memperbarui kuantitas atau menghapus item satuan maupun seluruh isi keranjang (*Delete All*).
  - Kalkulasi total tagihan otomatis secara *real-time*.
* **Proses Checkout & Pesanan (`orders.php`):**
  - Pemilihan metode pembayaran (Cash on Delivery / Bayar di Tempat, Kartu Kredit, Transfer Bank).
  - Konfirmasi nomor telepon dan alamat lengkap pengantaran.
  - Riwayat lengkap pesanan pelanggan beserta status pemrosesan (`pending` atau `completed`).
* **Sistem Autentikasi Pelanggan (`login.php` & `register.php`):**
  - Registrasi akun pelanggan baru dengan enkripsi kata sandi.
  - Form login yang dilengkapi proteksi kode **CAPTCHA gambar acak** (`captcha.php`) untuk mencegah serangan bot.
* **Manajemen Profil Pengguna (`profile.php`):**
  - Mengubah data profil, nomor telepon, serta memperbarui alamat pengiriman makanan.
* **Formulir Kontak & Saran (`contact.php`):**
  - Formulir kritik dan saran yang terhubung langsung ke kotak masuk admin.

---

### 2. Panel Admin Restoran (Admin Dashboard)
Akses melalui direktori `/admin`:
* **Dashboard Telemetri & Statistik (`admin/dashboard.php`):**
  - Ringkasan total pendapatan dari pesanan yang sudah lunas (*Total Completes*).
  - Total nilai tagihan dari pesanan yang sedang diproses (*Total Pendings*).
  - Counter kartu: Total pesanan masuk, total produk terdaftar, jumlah akun pelanggan, jumlah akun admin, dan pesan kritik/saran baru.
* **Manajemen Menu Makanan (CRUD) (`admin/products.php` & `admin/update_product.php`):**
  - **Tambah Menu:** Form penambahan hidangan baru lengkap dengan nama, kategori, harga, dan upload file foto.
  - **Edit Menu:** Mengubah nama, harga, kategori, atau mengganti foto hidangan.
  - **Hapus Menu:** Menghapus hidangan dari katalog sekaligus membersihkan file foto dari folder `uploaded_img/`.
* **Manajemen Pesanan Masuk (`admin/placed_orders.php`):**
  - Memeriksa identitas pemesan: nama lengkap, nomor telepon, alamat tujuan, rincian menu yang dipesan, dan total harga.
  - Mengubah status pembayaran dari `pending` menjadi `completed` saat pesanan selesai diantar.
  - Membatalkan atau menghapus riwayat pesanan pelanggan.
* **Manajemen Akun (`admin/users_accounts.php` & `admin/register_admin.php`):**
  - Memantau seluruh akun pelanggan terdaftar dan opsi menghapus akun bermasalah.
  - Mendaftarkan staf admin baru dengan verifikasi kata sandi ganda.
* **Kotak Masuk Pesan Pelanggan (`admin/messages.php`):**
  - Membaca feedback, kritik, dan pertanyaan pelanggan dengan opsi penghapusan pesan yang telah diselesaikan.

---

## 🛠️ Teknologi yang Digunakan

* **Backend:** PHP Native (PDO / PHP Data Objects) — mendukung PHP 7.4 hingga PHP 8.x
* **Basis Data:** MySQL / MariaDB (Database Engine: `InnoDB`)
* **Frontend:** HTML5, CSS3 kustom (`css/style.css`, `css/admin_style.css`), Vanilla JavaScript
* **Library & Aset:**
  - [Font Awesome 6.1](https://fontawesome.com/) — Ikon UI
  - [Swiper.js](https://swiperjs.com/) — Slider interaktif banner beranda
* **Web Server:** Apache (kompatibel dengan XAMPP, Laragon, WampServer, cPanel, dan InfinityFree)

---

## 🗄️ Skema Database SQL (`anbu.sql`)

File database tersedia di file [`anbu.sql`](anbu.sql) pada repositori ini. 

Jika ingin membuat tabel secara manual di **phpMyAdmin**, buat database bernama **`anbu`** *(atau pilih nama database hosting Anda)*, lalu jalankan skrip berikut di tab **SQL**:

```sql
-- 1. Tabel Admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Akun Default: username 'admin' & password '111' (SHA-1)
INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cceed635cc56c')
ON DUPLICATE KEY UPDATE `id`=`id`;

-- 2. Tabel Users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Tabel Products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Tabel Cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Tabel Orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6. Tabel Messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(15) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

---

## 💻 Panduan Menjalankan di Komputer Lokal (XAMPP / Laragon)

### 1. Unduh / Clone Proyek
Pindahkan folder proyek ke dalam direktori web server lokal Anda:
* **XAMPP:** `C:\xampp\htdocs\Website--Restoran-IF330---ANBU`
* **Laragon:** `C:\laragon\www\Website--Restoran-IF330---ANBU`

```bash
cd C:\xampp\htdocs
git clone https://github.com/v0rade/Website--Restoran-IF330---ANBU.git
```

### 2. Jalankan Apache & MySQL
Nyalakan modul **Apache** dan **MySQL** melalui XAMPP Control Panel.

### 3. Buat Database
1. Buka browser dan buka `http://localhost/phpmyadmin`.
2. Buat database baru bernama **`anbu`**.
3. Klik tab **Import**, pilih file **`anbu.sql`**, lalu klik tombol **Go / Kirim**.

### 4. Buka di Browser
* **Halaman Pelanggan:** `http://localhost/Website--Restoran-IF330---ANBU/home.php`
* **Halaman Panel Admin:** `http://localhost/Website--Restoran-IF330---ANBU/admin/admin_login.php`

---

## ☁️ Panduan Konfigurasi di Hosting (InfinityFree / cPanel)

1. **Upload File ke Direktori `htdocs`:**
   Pastikan seluruh file proyek (`home.php`, folder `admin`, `components`, dll.) diekstrak langsung di dalam folder **`htdocs/`** hosting Anda.
2. **Import Database:**
   Buat database melalui menu **MySQL Databases** di cPanel hosting, kemudian impor file [`anbu.sql`](anbu.sql) via phpMyAdmin hosting.
3. **Konfigurasi `components/connect.php`:**
   Sesuaikan kredensial koneksi database dengan kredensial dari cPanel hosting Anda:
   ```php
   <?php
   $db_host = 'sql123.infinityfree.com'; // MySQL Hostname dari hosting
   $db_name = 'if0_xxxxxx_anbu';        // Nama Database dari hosting
   $user_name = 'if0_xxxxxx';           // Username Database dari hosting
   $user_password = 'PasswordAkunAnda'; // Password akun hosting

   try {
       $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $user_name, $user_password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       die("Koneksi Database Gagal: " . $e->getMessage());
   }
   ?>
   ```

---

## 📁 Struktur Direktori Proyek

```text
Website--Restoran-IF330---ANBU/
├── admin/                     # Modul panel administrasi restoran
│   ├── admin_login.php        # Form login khusus administrator
│   ├── dashboard.php          # Halaman statistik utama pendapatan & pesanan
│   ├── messages.php           # Manajemen pesan & kritik dari pelanggan
│   ├── placed_orders.php      # Pemrosesan status pesanan pelanggan
│   ├── products.php           # Formulir penambahan & daftar menu makanan
│   ├── register_admin.php     # Pendaftaran akun administrator baru
│   ├── update_product.php     # Halaman penyuntingan data & foto produk
│   ├── update_profile.php     # Penggantian kata sandi & profil admin
│   └── users_accounts.php     # Daftar pelanggan terdaftar
├── components/                # Komponen modular reusable
│   ├── connect.php            # Konfigurasi koneksi database PDO MySQL
│   ├── user_header.php        # Navigasi & ikon keranjang untuk pelanggan
│   ├── admin_header.php       # Navigasi & menu profil panel admin
│   ├── add_cart.php           # Skrip pemrosesan tambah item ke keranjang
│   ├── user_logout.php        # Skrip logout sesi pelanggan
│   ├── admin_logout.php       # Skrip logout sesi admin
│   └── footer.php             # Footer informasi restoran
├── css/                       # Lembar gaya tampilan
│   ├── style.css              # Styling halaman pelanggan
│   └── admin_style.css        # Styling dashboard panel admin
├── images/                    # Aset ikon dan grafis ilustrasi
├── js/                        # Skrip interaktif navigasi dan slider
│   ├── script.js              # JavaScript interaktif halaman pengguna
│   └── admin_script.js        # JavaScript interaktif panel admin
├── uploaded_img/              # Direktori penyimpanan foto menu yang diunggah
├── anbu.sql                   # Skema dan data awal database MySQL
├── index.php                  # Pengarah otomatis ke home.php
├── home.php                   # Halaman beranda restoran
├── menu.php                   # Katalog menu makanan & minuman
├── orders.php                 # Halaman riwayat pemesanan pelanggan
├── contact.php                # Formulir kontak & kirim pesan
├── login.php                  # Halaman masuk pelanggan (dengan CAPTCHA)
├── profile.php                # Halaman profil & informasi alamat pengantaran
└── README.md                  # Dokumentasi resmi proyek
```

---

## 👥 Pengembang

Proyek ini dikembangkan oleh tim mahasiswa untuk memenuhi tugas mata kuliah **Pemrograman Web (IF330)**.
