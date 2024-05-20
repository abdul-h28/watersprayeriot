<?php
// Menghubungkan ke database
include 'koneksi.php';

try {
    // Query untuk mengambil data dari tabel
    $sql = "SELECT * FROM rfid_data ORDER BY waktu ASC";  // Ganti dengan query Anda
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Memeriksa jika ada data yang ditemukan
    if ($stmt->rowCount() > 0) {
        // Mengambil data dalam format associative array
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Mengatur header untuk JSON dan CORS
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        // Mengonversi data ke format JSON
        echo json_encode($data);
    } else {
        echo json_encode(array("message" => "No data found"));
    }
} catch (PDOException $e) {
    echo json_encode(array("message" => "Error: " . $e->getMessage()));
}
?>
