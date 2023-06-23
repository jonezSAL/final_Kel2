<?php
session_start();
require_once '../helper/connection.php';

$ID_Admin = $_POST['ID_Admin'];
$ID_Destinasi = $_POST['ID_Destinasi'];
$Nama_Pemesan = $_POST['Nama_Pemesan'];
$Email = $_POST['Email'];
$Tanggal_Pemesanan = $_POST['Tanggal_Pemesanan'];
$Jumlah_Tiket = $_POST['Jumlah_Tiket'];

// Query untuk mendapatkan harga per tiket destinasi yang dipilih
$query_destinasi = mysqli_query($connection, "SELECT Harga_Per_Tiket FROM destinasi WHERE ID_Destinasi = '$ID_Destinasi'");
$destinasi = mysqli_fetch_array($query_destinasi);
$Harga_Per_Tiket = $destinasi['Harga_Per_Tiket'];

$Total_Harga = $Jumlah_Tiket * $Harga_Per_Tiket;

$query = mysqli_query($connection, "INSERT INTO pemesanan (ID_Admin, ID_Destinasi, Nama_Pemesan, Email, Tanggal_Pemesanan, Jumlah_Tiket, Total_Harga) 
VALUES ('$ID_Admin', '$ID_Destinasi', '$Nama_Pemesan', '$Email', '$Tanggal_Pemesanan', '$Jumlah_Tiket', '$Total_Harga')");

if ($query) {
  echo "Data berhasil disimpan ke database.";
  header('Location: ../../booking.php');
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
?>