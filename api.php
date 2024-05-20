<?php
// Mengambil data POST dari ESP32
$flowRate = $_POST['flowRate'];
$totalMilliLitres = $_POST['totalMilliLitres'];
$uid = $_POST['uid'];

try {
  // Memanggil file koneksi database
  require_once 'koneksi.php';

  // Menyiapkan dan mengeksekusi pernyataan SQL untuk menyimpan data ke database
  $sql = "INSERT INTO data_sensor (flow_rate, total_ml, uid) VALUES (:flowRate, :totalMilliLitres, :uid)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':flowRate', $flowRate);
  $stmt->bindParam(':totalMilliLitres', $totalMilliLitres);
  $stmt->bindParam(':uid', $uid);
  $stmt->execute();

  echo "Data berhasil disimpan ke database";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>
