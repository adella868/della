<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'helpdesk_all';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>