<?php
$host = 'localhost'; // Sesuaikan dengan host database Anda.
$username = 'root'; // Ganti dengan nama pengguna database Anda.
$password = ''; // Ganti dengan kata sandi database Anda.
$database = 'orderfood'; // Ganti dengan nama database Anda.

// Membuat koneksi ke database
$db = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($db->connect_error) {
    die('Koneksi database gagal: ' . $db->connect_error);
}

// Set karakter encoding ke UTF-8
$db->set_charset('utf8');
?>