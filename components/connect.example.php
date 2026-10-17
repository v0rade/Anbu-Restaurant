<?php
/**
 * Database Connection Template (connect.example.php)
 * 
 * Copy this file to 'connect.local.php' to store your private database credentials locally.
 * 'connect.local.php' is ignored by .gitignore and will NEVER be pushed to GitHub.
 */

$db_host = 'localhost';          // e.g. 'localhost' or your hosting MySQL hostname
$db_name = 'anbu';               // your database name
$user_name = 'root';             // your database username
$user_password = '';             // your database password

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $user_name, $user_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal. Silakan periksa konfigurasi database Anda.");
}
?>
