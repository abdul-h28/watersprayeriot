<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_watersprayer_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Koneksi sukses";
} catch(PDOException $e) {
    // echo "Koneksi gagal: " . $e->getMessage();
}
?>
