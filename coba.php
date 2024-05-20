<?php
// Informasi koneksi ke database
$servername = "sql306.infinityfree.com";
$username = "if0_36540912";
$password = "3SsoHM4yoc0zMWc";
$dbname = "if0_36540912_watersprayeriot_db";

try {
    // Buat koneksi menggunakan PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set atribut koneksi untuk menampilkan pesan error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk mengambil data dari tabel
    $sql = "SELECT * FROM rfid_data";
    $stmt = $conn->query($sql);

    // Mengonversi hasil query menjadi array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Menampilkan data sebagai array
    print_r($result);
} catch(PDOException $e) {
    // Menampilkan pesan jika koneksi atau query gagal
    echo "Error: " . $e->getMessage();
}
?>
