<?php
// Sesuaikan informasi koneksi database Anda di bawah ini
$servername = "localhost";
$username = "root";
$password = "Temulawak2133*";
$dbname = "fitness_db";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn) {
    echo "";
} else {
    echo "Server not connected";
}