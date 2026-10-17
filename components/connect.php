<?php
/**
 * Database Connection Handler
 *
 * For local development or production hosting, create 'connect.local.php'
 * in this directory with your private database credentials.
 * 'connect.local.php' is strictly ignored by git and will never be exposed.
 */

if (file_exists(__DIR__ . '/connect.local.php')) {
    include __DIR__ . '/connect.local.php';
} else {
    $db_host = getenv('DB_HOST') ?: 'localhost';
    $db_name = getenv('DB_NAME') ?: 'anbu';
    $user_name = getenv('DB_USER') ?: 'root';
    $user_password = getenv('DB_PASS') ?: '';

    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $user_name, $user_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Koneksi database gagal. Silakan periksa konfigurasi database Anda.");
    }
}
?>