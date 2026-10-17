# ANBU — Website Restoran & Sistem Pemesanan Makanan Online (IF330)

> Proyek Website Restoran & Food Ordering System berbasis PHP Native dan MySQL yang dikembangkan untuk tugas mata kuliah Pemrograman Web (IF330).

Aplikasi web ini memungkinkan pelanggan untuk menjelajahi katalog menu makanan dan minuman, melakukan pemesanan secara online, mengelola keranjang belanja, serta melacak status pesanan. Dilengkapi pula dengan panel administrasi terpisah untuk mengelola stok menu, memproses pesanan masuk, memantau pendapatan, dan merespons pesan pelanggan.

---

## 📑 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Kredensial Default](#-kredensial-default)
- [Skema Database SQL (`anbu.sql`)](#-skema-database-sql-anbusql)
- [Panduan Menjalankan di Localhost](#-panduan-menjalankan-di-localhost)
- [Struktur Direktori Proyek](#-struktur-direktori-proyek)

---

## 🚀 Fitur Utama

### 1. Halaman Pelanggan (Customer / User Area)
* **Beranda Interaktif (`home.php`):** Slider promo hidangan spesial, pilihan kategori makanan instan, produk terbaru, dan panduan tahapan pemesanan.
* **Katalog Menu (`menu.php`):** Daftar lengkap hidangan berdasarkan kategori (*Dishes, Fast Food, Drinks, Desserts*) beserta harga dan foto menu.
* **Keranjang Belanja (`cart.php`):** Menambahkan hidangan ke keranjang, mengatur jumlah porsi (*quantity*), menghitung subtotal & total pembayaran secara otomatis.
* **Proses Checkout & Order (`orders.php`):** Formulir pemesanan dengan pemilihan metode pembayaran (Cash on Delivery/Tunai, Kartu Kredit, dll.) dan konfirmasi alamat pengiriman.
* **Riwayat & Status Pesanan:** Melacak status pembayaran dan proses pesanan pelanggan (`pending` atau `completed`).
* **Autentikasi Akun (`login.php` & `register.php`):** Pendaftaran akun dan login pelanggan yang dilengkapi dengan proteksi verifikasi CAPTCHA gambar (`captcha.php`).
* **Profil Pengguna (`profile.php`):** Memperbarui informasi nama, nomor telepon, email, serta alamat pengantaran makanan.
* **Hubungi Kami (`contact.php`):** Formulir pengiriman kritik, saran, dan pertanyaan langsung ke panel admin.

### 2. Panel Admin Restoran (`/admin`)
* **Dashboard Statistik (`admin/dashboard.php`):**
  - Ringkasan total pendapatan pesanan lunas (*Total Completes*).
  - Ringkasan total nilai pesanan yang masih tertunda (*Total Pendings*).
  - Statistik total pesanan masuk, total produk terdaftar, akun user terdaftar, akun admin, dan pesan kritik/saran baru.
* **Manajemen Produk / Menu (`admin/products.php` & `admin/update_product.php`):**
  - Menambah menu baru (nama hidangan, harga, kategori, dan upload foto makanan).
  - Memperbarui data harga, nama, dan foto menu yang sudah ada.
  - Menghapus menu makanan dari sistem beserta file gambarnya.
* **Manajemen Pesanan Masuk (`admin/placed_orders.php`):**
  - Melihat rincian pelanggan (nama, kontak, alamat, daftar menu yang dipesan, dan total harga).
  - Mengubah status pembayaran dari `pending` menjadi `completed` saat pesanan selesai.
  - Membatalkan atau menghapus riwayat pesanan.
* **Manajemen Akun (`admin/users_accounts.php` & `admin/register_admin.php`):**
  - Memantau akun pelanggan yang terdaftar dan opsi menghapus akun bermasalah.
  - Mendaftarkan akun administrator baru untuk staf kasir/pengelola restoran.
* **Pesan Pelanggan (`admin/messages.php`):** Membaca dan menghapus pesan/kritik yang dikirimkan pelanggan melalui form kontak.

---

## 🛠️ Teknologi yang Digunakan

* **Bahasa Pemrograman:** PHP Native 7.4 / 8.x (Koneksi Database menggunakan **PHP Data Objects / PDO**)
* **Database:** MySQL / MariaDB
* **Frontend:** HTML5, CSS3 (`css/style.css`, `css/admin_style.css`), Vanilla JavaScript
* **Library Eksternal:** Font Awesome 6.1 (Icon Web)
* **Web Server Rekomendasi:** Apache (XAMPP / Laragon / WampServer)

---

## 🔐 Kredensial Default

### Akun Administrator:
* **Halaman Login Admin:** `http://localhost/Website--Restoran-IF330---ANBU/admin/admin_login.php`
* **Username:** `admin`
* **Password:** `111`

---

## 🗄️ Skema Database SQL (`anbu.sql`)

File database juga telah disediakan di file [`anbu.sql`](anbu.sql). Anda dapat langsung mengimpornya via phpMyAdmin atau menjalankan query berikut:

```sql
CREATE DATABASE IF NOT EXISTS `anbu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `anbu`;

-- 1. Tabel Admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Akun Default Admin: username 'admin' & password '111' (SHA-1)
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

## 💻 Panduan Menjalankan di Localhost

Ikuti langkah-langkah berikut untuk menjalankan website di komputer Anda menggunakan **XAMPP**:

### Langkah 1: Siapkan File Proyek
1. Pastikan Anda sudah menginstal [XAMPP](https://www.apachefriends.org/).
2. Buka direktori web server XAMPP Anda (biasanya di `C:\xampp\htdocs\`).
3. Clone repositori ini ke dalam folder `htdocs`:
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/v0rade/Website--Restoran-IF330---ANBU.git
   ```

### Langkah 2: Nyalakan Web Server & Database
1. Buka aplikasi **XAMPP Control Panel**.
2. Klik tombol **Start** pada modul **Apache** dan **MySQL**.

### Langkah 3: Import Database
1. Buka browser dan akses [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Buat database baru dengan nama **`anbu`**.
3. Klik database `anbu` $\rightarrow$ klik tab **Import** $\rightarrow$ pilih file **`anbu.sql`** dari folder proyek $\rightarrow$ klik **Go / Kirim** *(atau copy-paste query di atas via tab SQL)*.

### Langkah 4: Cek Konfigurasi Database
File koneksi terletak di `components/connect.php`:
```php
$db_name = 'mysql:host=localhost;dbname=anbu';
$user_name = 'root';
$user_password = ''; // Sesuaikan jika MySQL lokal Anda memakai password
```
*(Secara default XAMPP menggunakan user `root` tanpa password, jadi Anda tidak perlu mengubah apapun jika memakai konfigurasi standar).*

### Langkah 5: Buka Aplikasi di Browser
* **Halaman Pelanggan (Website Restoran):**
  👉 [http://localhost/Website--Restoran-IF330---ANBU/home.php](http://localhost/Website--Restoran-IF330---ANBU/home.php)
* **Halaman Login Admin Restoran:**
  👉 [http://localhost/Website--Restoran-IF330---ANBU/admin/admin_login.php](http://localhost/Website--Restoran-IF330---ANBU/admin/admin_login.php)
  *(Login menggunakan username: `admin` & password: `111`)*

---

## 📁 Struktur Direktori Proyek

```text
Website--Restoran-IF330---ANBU/
├── admin/                     # Modul panel administrasi restoran
│   ├── admin_login.php        # Form login khusus administrator
│   ├── dashboard.php          # Halaman utama statistik admin
│   ├── messages.php           # Manajemen kritik & saran
│   ├── placed_orders.php      # Manajemen pesanan masuk
│   ├── products.php           # Tambah dan hapus produk
│   ├── register_admin.php     # Pendaftaran admin baru
│   ├── update_product.php     # Edit data & foto produk
│   ├── update_profile.php     # Ubah profil/password admin
│   └── users_accounts.php     # Manajemen akun pelanggan
├── components/                # Komponen modular reusable
│   ├── connect.php            # Konfigurasi koneksi PDO ke MySQL
│   ├── user_header.php        # Header & navigasi pelanggan
│   ├── admin_header.php       # Header & navigasi admin panel
│   └── footer.php             # Footer website
├── css/                       # Lembar gaya tampilan
│   ├── style.css              # Style untuk halaman pelanggan
│   └── admin_style.css        # Style untuk dashboard admin
├── images/                    # Aset ikon dan ilustrasi UI
├── js/                        # Skrip JavaScript interaktif
├── uploaded_img/              # Direktori penyimpanan foto menu yang diunggah
├── anbu.sql                   # File skema database MySQL
├── home.php                   # Halaman beranda restoran
├── menu.php                   # Halaman katalog menu makanan
├── orders.php                 # Halaman status pesanan pelanggan
├── contact.php                # Halaman kontak & pesan
├── login.php                  # Halaman login pelanggan
├── profile.php                # Halaman profil & alamat pelanggan
└── README.md                  # Dokumentasi proyek
```

---

## 👥 Pengembang

Proyek ini dikembangkan oleh tim mahasiswa untuk memenuhi tugas mata kuliah **Pemrograman Web (IF330)**.
