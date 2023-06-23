<?php
session_start();
require_once '../helper/connection.php';

// Ambil nilai dari form input
$ID_Destinasi = $_POST['ID_Destinasi'];
$Deskripsi = $_POST['Deskripsi'];
$Fasilitas = $_POST['Fasilitas'];

// Persiapkan pernyataan SQL dengan parameter terikat
$stmt = $connection->prepare("INSERT INTO detail_destinasi (ID_Destinasi, Deskripsi, Fasilitas) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $ID_Destinasi, $Deskripsi, $Fasilitas);

// Eksekusi pernyataan SQL
if ($stmt->execute()) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  $stmt->close();
  $connection->close();
  header('Location: ./index.php');
  exit();
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => 'Terjadi kesalahan saat menyimpan data: ' . $stmt->error
  ];
  $stmt->close();
  $connection->close();
  header('Location: ./index.php');
  exit();
}
?>
